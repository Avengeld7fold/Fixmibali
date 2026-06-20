@if (!empty($table))
@php
    $headers = $table['headers'] ?? [];
    $rows = $table['rows'] ?? [];
    $priceColumns = [];
    foreach ($headers as $index => $header) {
        $title = strtolower((string) ($header['title'] ?? ''));
        $subtitle = strtolower((string) ($header['subtitle'] ?? ''));
        $haystack = $title.' '.$subtitle;
        if (
            str_contains($haystack, 'harga') ||
            str_contains($haystack, 'price') ||
            str_contains($haystack, 'rp') ||
            str_contains($haystack, 'idr') ||
            str_contains($haystack, 'usd') ||
            str_contains($haystack, '$')
        ) {
            $priceColumns[$index] = true;
        }
    }

    $parseCandidateNumber = function (?string $value): ?float {
        $raw = trim((string) ($value ?? ''));
        if ($raw === '' || $raw === '-') {
            return null;
        }

        $clean = preg_replace('/[^\d,.\-]/', '', $raw);
        if ($clean === '' || $clean === '-' || $clean === '.') {
            return null;
        }

        $hasComma = str_contains($clean, ',');
        $hasDot = str_contains($clean, '.');

        if ($hasComma && $hasDot) {
            $lastComma = strrpos($clean, ',');
            $lastDot = strrpos($clean, '.');
            if ($lastComma !== false && $lastDot !== false && $lastComma > $lastDot) {
                $clean = str_replace('.', '', $clean);
                $clean = str_replace(',', '.', $clean);
            } else {
                $clean = str_replace(',', '', $clean);
            }
        } elseif ($hasComma) {
            $parts = explode(',', $clean);
            $suffix = end($parts);
            if ($suffix !== false && strlen($suffix) === 2) {
                $clean = str_replace('.', '', $clean);
                $clean = str_replace(',', '.', $clean);
            } else {
                $clean = str_replace(',', '', $clean);
            }
        } else {
            $clean = str_replace('.', '', $clean);
        }

        if (! is_numeric($clean)) {
            return null;
        }

        $n = (float) $clean;
        return is_finite($n) ? $n : null;
    };

    $looksLikeMoney = function (?string $value) use ($parseCandidateNumber): bool {
        $raw = trim((string) ($value ?? ''));
        if ($raw === '' || $raw === '-') {
            return false;
        }

        $hasCurrency = preg_match('/(\$|\busd\b|\bidr\b|\brp\b)/i', $raw);
        if ($hasCurrency) {
            return true;
        }

        if (preg_match('/[a-z]/i', $raw)) {
            return false;
        }

        $hasSeparator = str_contains($raw, '.') || str_contains($raw, ',');
        if (! $hasSeparator) {
            $digits = preg_replace('/\D/', '', $raw);
            if ($digits === '' || strlen($digits) < 5) {
                return false;
            }
        }

        $n = $parseCandidateNumber($raw);
        return $n !== null && abs($n) >= 1000;
    };

    $columnNonEmpty = [];
    $columnMoney = [];
    foreach ($rows as $row) {
        foreach ($row as $index => $cell) {
            if ($index === 0) {
                continue;
            }
            $raw = trim((string) ($cell ?? ''));
            if ($raw === '' || $raw === '-') {
                continue;
            }
            $columnNonEmpty[$index] = ($columnNonEmpty[$index] ?? 0) + 1;
            if ($looksLikeMoney($raw)) {
                $columnMoney[$index] = ($columnMoney[$index] ?? 0) + 1;
            }
        }
    }

    foreach ($columnNonEmpty as $index => $nonEmptyCount) {
        if (! empty($priceColumns[$index])) {
            continue;
        }
        $moneyCount = (int) ($columnMoney[$index] ?? 0);
        if ($moneyCount < 2) {
            continue;
        }
        $ratio = $nonEmptyCount > 0 ? ($moneyCount / $nonEmptyCount) : 0;
        if ($ratio >= 0.6) {
            $priceColumns[$index] = true;
        }
    }

    $instanceId = 'pricelist_'.uniqid();

    $stripTagSyntax = function (?string $value): string {
        $text = (string) ($value ?? '');

        if ($text !== '') {
            if (preg_match_all('/\[([^\]]+)\]/u', $text, $matches)) {
                $text = preg_replace('/\[[^\]]+\]/u', '', $text) ?? $text;
            }

            if (preg_match_all('/(^|\s)#([A-Za-z0-9_-]+)/u', $text, $matches)) {
                $text = preg_replace('/(^|\s)#[A-Za-z0-9_-]+/u', ' ', $text) ?? $text;
            }
        }

        $text = preg_replace('/[ \t]{2,}/', ' ', $text) ?? $text;
        $text = preg_replace('/\n{3,}/', "\n\n", $text) ?? $text;

        return trim($text);
    };
@endphp
<div class="service-price-table-shell" data-pricelist-instance="{{ $instanceId }}">
<div class="service-price-table-toolbar">
<div class="service-price-table-toolbar-left">
<input class="service-price-table-search" type="search" inputmode="search" autocomplete="off" spellcheck="false" placeholder="{{ __('site.pricelist.table_search_placeholder') }}" aria-label="{{ __('site.pricelist.table_search_placeholder') }}" data-pricelist-search="{{ $instanceId }}"/>
</div>
</div>
<div class="service-price-swipe-hint">
    <span class="swipe-text">Geser tabel untuk detail</span>
    <span class="swipe-icon">➔</span>
</div>
<div class="service-price-table-wrap">
<table class="service-price-table" data-pricelist-table="{{ $instanceId }}">
<thead>
<tr>
@foreach (($table['headers'] ?? []) as $index => $header)
<th class="{{ $index === 0 ? 'is-sticky' : '' }}{{ !empty($priceColumns[$index]) ? ' is-price' : '' }}" data-col="{{ $index }}" data-is-price="{{ !empty($priceColumns[$index]) ? '1' : '0' }}">
<button type="button" class="service-price-sort-btn" data-pricelist-sort="{{ $instanceId }}" data-col="{{ $index }}">
<span class="service-price-th-title">{!! nl2br(e($header['title'] ?? '')) !!}</span>
@if (!empty($header['subtitle']))
<span class="service-price-th-sub">{!! nl2br(e($header['subtitle'])) !!}</span>
@endif
<span class="service-price-sort-indicator" aria-hidden="true"></span>
</button>
</th>
@endforeach
</tr>
</thead>
<tbody>
@foreach ($rows as $rowIndex => $row)
<tr>
@foreach ($row as $index => $cell)
@php
    $cellValue = $stripTagSyntax($cell);
    if (!empty($priceColumns[$index])) {
        $cellValue = \App\Support\CurrencyFormatter::formatCell($cellValue);
    }
@endphp
<td class="{{ $index === 0 ? 'is-sticky' : '' }}{{ !empty($priceColumns[$index]) ? ' is-price' : '' }}" data-col="{{ $index }}" data-is-price="{{ !empty($priceColumns[$index]) ? '1' : '0' }}">
<span class="service-price-cell-text">{!! nl2br(e($cellValue)) !!}</span>
</td>
@endforeach
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
@else
<p class="service-price-empty">{{ __('site.pricelist.empty') }}</p>
@endif
