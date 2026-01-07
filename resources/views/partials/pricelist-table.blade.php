@if (!empty($table))
@php
    $headers = $table['headers'] ?? [];
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
@endphp
<div class="service-price-table-wrap">
<table class="service-price-table">
<thead>
<tr>
@foreach (($table['headers'] ?? []) as $header)
<th>
<span class="service-price-th-title">{{ $header['title'] ?? '' }}</span>
@if (!empty($header['subtitle']))
<span class="service-price-th-sub">{{ $header['subtitle'] }}</span>
@endif
</th>
@endforeach
</tr>
</thead>
<tbody>
@foreach (($table['rows'] ?? []) as $row)
<tr>
@foreach ($row as $index => $cell)
<td>
@if (!empty($priceColumns[$index]))
{{ \App\Support\CurrencyFormatter::formatCell($cell) }}
@else
{{ $cell }}
@endif
</td>
@endforeach
</tr>
@endforeach
</tbody>
</table>
</div>
@else
<p class="service-price-empty">{{ __('site.pricelist.empty') }}</p>
@endif
