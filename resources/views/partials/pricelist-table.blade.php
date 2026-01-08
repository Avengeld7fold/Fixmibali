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

        if (preg_match('/(\$|\busd\b|\bidr\b|\brp\b)/i', $raw)) {
            return true;
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

    $extractTags = function (?string $value): array {
        $text = (string) ($value ?? '');
        $tags = [];

        if ($text !== '') {
            if (preg_match_all('/\[([^\]]+)\]/u', $text, $matches)) {
                foreach ($matches[1] as $match) {
                    $tag = trim((string) $match);
                    if ($tag !== '') {
                        $tags[] = $tag;
                    }
                }
                $text = preg_replace('/\[[^\]]+\]/u', '', $text) ?? $text;
            }

            if (preg_match_all('/(^|\s)#([A-Za-z0-9_-]+)/u', $text, $matches)) {
                foreach ($matches[2] as $match) {
                    $tag = trim((string) $match);
                    if ($tag !== '') {
                        $tags[] = $tag;
                    }
                }
                $text = preg_replace('/(^|\s)#[A-Za-z0-9_-]+/u', ' ', $text) ?? $text;
            }
        }

        $tags = array_values(array_unique(array_map(function ($tag) {
            return strtolower((string) $tag);
        }, $tags)));
        sort($tags);

        $text = preg_replace('/[ \t]{2,}/', ' ', $text) ?? $text;
        $text = preg_replace('/\n{3,}/', "\n\n", $text) ?? $text;

        return [trim($text), $tags];
    };

    $allTags = [];
    $rowTags = [];
    foreach ($rows as $rowIndex => $row) {
        $tags = [];
        foreach ($row as $cell) {
            [, $cellTags] = $extractTags($cell);
            $tags = array_merge($tags, $cellTags);
        }
        $tags = array_values(array_unique($tags));
        sort($tags);
        $rowTags[$rowIndex] = $tags;
        foreach ($tags as $tag) {
            $allTags[$tag] = ($allTags[$tag] ?? 0) + 1;
        }
    }
    $tagOptions = array_keys($allTags);
    sort($tagOptions);
@endphp
<div class="service-price-table-shell" data-pricelist-instance="{{ $instanceId }}">
<div class="service-price-table-toolbar">
<div class="service-price-table-toolbar-left">
<input class="service-price-table-search" type="search" inputmode="search" autocomplete="off" spellcheck="false" placeholder="{{ __('site.pricelist.table_search_placeholder') }}" aria-label="{{ __('site.pricelist.table_search_placeholder') }}" data-pricelist-search="{{ $instanceId }}"/>
<select class="service-price-table-filter" aria-label="{{ __('site.pricelist.table_filter_label') }}" data-pricelist-filter="{{ $instanceId }}">
<option value="">{{ __('site.pricelist.table_filter_all') }}</option>
@foreach ($tagOptions as $tag)
<option value="{{ $tag }}">{{ strtoupper($tag) }} ({{ $allTags[$tag] ?? 0 }})</option>
@endforeach
</select>
<button class="service-price-table-clear" type="button" data-pricelist-clear="{{ $instanceId }}">{{ __('site.pricelist.table_clear') }}</button>
</div>
<div class="service-price-table-toolbar-right">
<button class="service-price-table-copy" type="button" data-pricelist-copy="{{ $instanceId }}" data-label-default="{{ __('site.pricelist.table_copy') }}" data-label-copied="{{ __('site.pricelist.table_copy_copied') }}" data-label-failed="{{ __('site.pricelist.table_copy_failed') }}">{{ __('site.pricelist.table_copy') }}</button>
<span class="service-price-table-count" data-pricelist-count="{{ $instanceId }}"></span>
</div>
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
@php
    $tags = $rowTags[$rowIndex] ?? [];
@endphp
<tr data-tags="{{ implode(',', $tags) }}">
@foreach ($row as $index => $cell)
@php
    [$cleanCell, $cellTags] = $extractTags($cell);
    $cellValue = $cleanCell;
    if (!empty($priceColumns[$index])) {
        $cellValue = \App\Support\CurrencyFormatter::formatCell($cellValue);
    }
@endphp
<td class="{{ $index === 0 ? 'is-sticky' : '' }}{{ !empty($priceColumns[$index]) ? ' is-price' : '' }}" data-col="{{ $index }}" data-is-price="{{ !empty($priceColumns[$index]) ? '1' : '0' }}">
@if (!empty($cellTags))
<span class="service-price-badges" aria-hidden="true">
@foreach ($cellTags as $tag)
<span class="service-price-badge">{{ strtoupper($tag) }}</span>
@endforeach
</span>
@endif
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
