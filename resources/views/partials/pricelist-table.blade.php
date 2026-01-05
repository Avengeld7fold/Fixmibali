@if (!empty($table))
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
@foreach ($row as $cell)
<td>{{ $cell }}</td>
@endforeach
</tr>
@endforeach
</tbody>
</table>
</div>
@else
<p class="service-price-empty">Data pricelist belum diunggah.</p>
@endif
