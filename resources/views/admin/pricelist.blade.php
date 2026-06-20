@php
    use App\Support\PricelistData;
    $focusSection = session('focus_section');
    $focusDevice = null;
    if ($focusSection && PricelistData::hasSection($focusSection)) {
        $focusDevice = PricelistData::section($focusSection)['device'] ?? null;
    }
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Pricelist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="admin-panel-card overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-slate-100">
                    @if (session('status'))
                        <div class="text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mt-4 text-sm text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mt-6">
                        @foreach ($priceSectionGroups as $group)
                            @php $deviceOpen = $focusDevice === ($group['key'] ?? ''); @endphp
                            <details class="admin-accordion {{ $loop->first ? '' : 'mt-4' }}" {{ $deviceOpen ? 'open' : '' }}>
                                <summary class="admin-accordion-summary">
                                    <span class="admin-accordion-title">{{ $group['title'] }}</span>
                                    <span class="admin-accordion-hint">Klik untuk buka</span>
                                </summary>
                                <div class="admin-accordion-content">
                                    <p class="admin-description">
                                        Upload file CSV, JSON, HTML, atau XLS/XLSX. Data yang diimport akan menggantikan pricelist lama.
                                    </p>

                                    @if (($group['key'] ?? '') === 'android')
                                        @if (!empty($group['brands']))
                                            @foreach ($group['brands'] as $brand)
                                                @php $brandOpen = $deviceOpen && $focusSection && str_starts_with($focusSection, 'android-'.$brand['key']); @endphp
                                                <details class="admin-accordion admin-accordion--nested {{ $loop->first ? '' : 'mt-3' }}" {{ $brandOpen ? 'open' : '' }}>
                                                    <summary class="admin-accordion-summary">
                                                        <span class="admin-accordion-title">{{ $brand['title'] }}</span>
                                                        <span class="admin-accordion-hint">Klik untuk buka</span>
                                                    </summary>
                                                    <div class="admin-accordion-content">
                                                        @if (!empty($brand['series']))
                                                            @foreach ($brand['series'] as $series)
                                                                @php $seriesOpen = $brandOpen && $focusSection && str_starts_with($focusSection, 'android-'.$series['key']); @endphp
                                                                <details class="admin-accordion admin-accordion--nested {{ $loop->first ? '' : 'mt-3' }}" {{ $seriesOpen ? 'open' : '' }}>
                                                                    <summary class="admin-accordion-summary">
                                                                        <span class="admin-accordion-title">{{ $series['title'] }}</span>
                                                                        <span class="admin-accordion-hint">Klik untuk buka</span>
                                                                    </summary>
                                                                    <div class="admin-accordion-content">
                                                                        @foreach ($series['sections'] as $section)
                                                                            @include('partials.admin-pricelist-section', ['section' => $section])
                                                                        @endforeach
                                                                    </div>
                                                                </details>
                                                            @endforeach
                                                        @else
                                                            @forelse ($brand['sections'] as $section)
                                                                @include('partials.admin-pricelist-section', ['section' => $section])
                                                            @empty
                                                                <p class="admin-meta">Belum ada data pricelist untuk bagian ini.</p>
                                                            @endforelse
                                                        @endif
                                                    </div>
                                                </details>
                                            @endforeach
                                        @else
                                            <p class="admin-meta">Belum ada data pricelist untuk bagian ini.</p>
                                        @endif
                                    @else
                                        @forelse ($group['sections'] as $section)
                                            @include('partials.admin-pricelist-section', ['section' => $section])
                                        @empty
                                            <p class="admin-meta">Belum ada data pricelist untuk bagian ini.</p>
                                        @endforelse
                                    @endif
                                </div>
                            </details>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
