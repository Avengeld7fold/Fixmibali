<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\PricelistData;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PricelistImportController extends Controller
{
    public function store(Request $request, string $section)
    {
        $section = $this->resolveSection($section);

        $request->validate([
            'pricelist_file' => ['required', 'file', 'mimes:csv,txt,json,html,htm,xls,xlsx', 'max:20480'],
        ]);

        PricelistData::backup($section);

        $file = $request->file('pricelist_file');
        $extension = strtolower($file->getClientOriginalExtension());

        $data = match ($extension) {
            'csv', 'txt' => $this->parseCsv($file->getRealPath()),
            'json' => $this->parseJson($file->getRealPath()),
            'html', 'htm' => $this->parseHtml($file->getRealPath()),
            'xls', 'xlsx' => $this->parseSpreadsheet($file->getRealPath()),
            default => throw ValidationException::withMessages([
                'pricelist_file' => 'Format file tidak didukung.',
            ]),
        };

        if (empty($data['headers']) || empty($data['rows'])) {
            throw ValidationException::withMessages([
                'pricelist_file' => 'Data pricelist kosong atau tidak valid.',
            ]);
        }

        $data['meta'] = [
            'filename' => $file->getClientOriginalName(),
            'extension' => $extension,
            'imported_at' => now('Asia/Makassar')->toIso8601String(),
            'timezone' => 'Asia/Makassar',
        ];

        PricelistData::put($section, $data);

        return redirect()
            ->route('admin.pricelist.index')
            ->with('status', 'Pricelist berhasil diimport.')
            ->with('focus_section', $section)
            ->withFragment('section-'.$section);
    }

    public function destroy(string $section)
    {
        $section = $this->resolveSection($section);
        PricelistData::delete($section);

        return redirect()
            ->route('admin.pricelist.index')
            ->with('status', 'Pricelist berhasil dihapus.')
            ->with('focus_section', $section)
            ->withFragment('section-'.$section);
    }

    public function undo(string $section)
    {
        $section = $this->resolveSection($section);

        if (! PricelistData::restoreBackup($section)) {
            return redirect()
                ->route('admin.pricelist.index')
                ->with('status', 'Tidak ada data sebelumnya untuk di-undo.')
                ->with('focus_section', $section)
                ->withFragment('section-'.$section);
        }

        return redirect()
            ->route('admin.pricelist.index')
            ->with('status', 'Pricelist berhasil dikembalikan ke data sebelumnya.')
            ->with('focus_section', $section)
            ->withFragment('section-'.$section);
    }

    private function resolveSection(?string $section): string
    {
        $section = $section ?: 'lcd';

        if (! PricelistData::hasSection($section)) {
            abort(404);
        }

        return $section;
    }

    private function parseCsv(string $path): array
    {
        $handle = fopen($path, 'rb');
        if ($handle === false) {
            throw ValidationException::withMessages([
                'pricelist_file' => 'File CSV tidak dapat dibaca.',
            ]);
        }

        $headerRow = fgetcsv($handle);
        if (! is_array($headerRow)) {
            fclose($handle);
            throw ValidationException::withMessages([
                'pricelist_file' => 'Header CSV tidak ditemukan.',
            ]);
        }

        $headers = $this->normalizeHeaders($headerRow);
        $rows = [];

        while (($row = fgetcsv($handle)) !== false) {
            $normalizedRow = $this->normalizeRow($row, count($headers));
            if ($this->isEmptyRow($normalizedRow)) {
                continue;
            }
            $rows[] = $normalizedRow;
        }

        fclose($handle);

        return [
            'headers' => $headers,
            'rows' => $rows,
        ];
    }

    private function parseJson(string $path): array
    {
        $content = file_get_contents($path);
        if ($content === false) {
            throw ValidationException::withMessages([
                'pricelist_file' => 'File JSON tidak dapat dibaca.',
            ]);
        }

        try {
            $payload = json_decode($content, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException) {
            throw ValidationException::withMessages([
                'pricelist_file' => 'Format JSON tidak valid.',
            ]);
        }
        if (! is_array($payload)) {
            throw ValidationException::withMessages([
                'pricelist_file' => 'Struktur JSON tidak dikenali.',
            ]);
        }

        if (isset($payload['headers'], $payload['rows'])) {
            $headers = $this->normalizeHeaders($payload['headers']);
            $rows = $this->normalizeRows($payload['rows'], count($headers));
        } elseif (isset($payload[0]) && is_array($payload[0])) {
            $headers = $this->normalizeHeaders($payload[0]);
            $rows = $this->normalizeRows(array_slice($payload, 1), count($headers));
        } else {
            throw ValidationException::withMessages([
                'pricelist_file' => 'Struktur JSON tidak dikenali.',
            ]);
        }

        return [
            'headers' => $headers,
            'rows' => $rows,
        ];
    }

    private function parseHtml(string $path): array
    {
        $content = file_get_contents($path);
        if ($content === false) {
            throw ValidationException::withMessages([
                'pricelist_file' => 'File HTML tidak dapat dibaca.',
            ]);
        }

        $previousLibXmlErrors = libxml_use_internal_errors(true);
        $dom = new DOMDocument;
        $dom->loadHTML($content);
        libxml_clear_errors();
        libxml_use_internal_errors($previousLibXmlErrors);

        $tables = $dom->getElementsByTagName('table');
        if ($tables->length === 0) {
            throw ValidationException::withMessages([
                'pricelist_file' => 'Table HTML tidak ditemukan.',
            ]);
        }

        $table = $tables->item(0);
        $rows = $table->getElementsByTagName('tr');
        if ($rows->length === 0) {
            throw ValidationException::withMessages([
                'pricelist_file' => 'Baris table HTML tidak ditemukan.',
            ]);
        }

        $headers = [];
        $bodyRows = [];

        foreach ($rows as $index => $row) {
            $cells = $row->getElementsByTagName('th');
            $isHeader = $cells->length > 0;
            if (! $isHeader) {
                $cells = $row->getElementsByTagName('td');
            }

            $values = [];
            foreach ($cells as $cell) {
                $values[] = $this->cleanCell($dom->saveHTML($cell));
            }

            if ($this->isEmptyRow($values)) {
                continue;
            }

            if ($headers === [] && $isHeader) {
                $headers = $this->normalizeHeaders($values);

                continue;
            }

            if ($headers === []) {
                $headers = $this->normalizeHeaders($values);

                continue;
            }

            $bodyRows[] = $this->normalizeRow($values, count($headers));
        }

        if ($headers === []) {
            throw ValidationException::withMessages([
                'pricelist_file' => 'Header table HTML tidak ditemukan.',
            ]);
        }

        return [
            'headers' => $headers,
            'rows' => $bodyRows,
        ];
    }

    private function parseSpreadsheet(string $path): array
    {
        if (! class_exists(IOFactory::class)) {
            throw ValidationException::withMessages([
                'pricelist_file' => 'Support XLS/XLSX belum aktif. Install phpoffice/phpspreadsheet terlebih dahulu.',
            ]);
        }

        $spreadsheet = IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();
        if ($rows === []) {
            throw ValidationException::withMessages([
                'pricelist_file' => 'File spreadsheet kosong.',
            ]);
        }

        $headers = $this->normalizeHeaders($rows[0]);
        $bodyRows = $this->normalizeRows(array_slice($rows, 1), count($headers));

        return [
            'headers' => $headers,
            'rows' => $bodyRows,
        ];
    }

    private function normalizeHeaders(array $headerRow): array
    {
        $headers = [];
        foreach ($headerRow as $value) {
            if (is_array($value) && isset($value['title'])) {
                $title = $this->sanitizeText((string) ($value['title'] ?? ''));
                $subtitle = $this->sanitizeText((string) ($value['subtitle'] ?? ''));
                $headers[] = [
                    'title' => $title,
                    'subtitle' => $subtitle,
                ];

                continue;
            }

            $headers[] = $this->splitHeader((string) $value);
        }

        return $headers;
    }

    private function normalizeRows(array $rows, int $columns): array
    {
        $normalized = [];
        foreach ($rows as $row) {
            if (! is_array($row)) {
                continue;
            }
            $normalizedRow = $this->normalizeRow($row, $columns);
            if ($this->isEmptyRow($normalizedRow)) {
                continue;
            }
            $normalized[] = $normalizedRow;
        }

        return $normalized;
    }

    private function normalizeRow(array $row, int $columns): array
    {
        $values = array_map(fn ($value) => $this->sanitizeValue((string) $value), $row);

        if (count($values) < $columns) {
            $values = array_pad($values, $columns, '-');
        }

        if (count($values) > $columns) {
            $values = array_slice($values, 0, $columns);
        }

        return $values;
    }

    private function cleanCell(string $value): string
    {
        $value = preg_replace('/<\s*br\s*\/?\s*>/i', "\n", $value);
        $value = preg_replace('/<\s*\/\s*p\s*>/i', "\n", $value);
        $value = preg_replace('/<\s*p[^>]*>/i', "\n", $value);
        $value = strip_tags($value);

        return $this->sanitizeText($value);
    }

    private function splitHeader(string $value): array
    {
        $value = $this->cleanCell($value);
        $lines = preg_split('/\r\n|\r|\n/', $value);
        $lines = array_values(array_filter(array_map('trim', $lines)));

        $title = $lines[0] ?? '';
        $subtitle = '';

        if (count($lines) > 1) {
            $subtitle = implode("\n", array_slice($lines, 1));
        }

        return [
            'title' => $title,
            'subtitle' => $subtitle,
        ];
    }

    private function sanitizeValue(string $value): string
    {
        $value = $this->sanitizeText($value);

        if ($value === '' || $value === '---' || $value === '--') {
            return '-';
        }

        return $value;
    }

    private function sanitizeText(string $value): string
    {
        $value = html_entity_decode($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $value = str_replace("\xc2\xa0", ' ', $value);
        $value = preg_replace("/\r\n|\r/", "\n", $value);
        $value = preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $value);
        $value = preg_replace('/[ \t]+/', ' ', $value);
        $value = preg_replace('/\n{2,}/', "\n", $value);

        return trim($value);
    }

    private function isEmptyRow(array $row): bool
    {
        foreach ($row as $value) {
            if (trim((string) $value) !== '') {
                return false;
            }
        }

        return true;
    }
}
