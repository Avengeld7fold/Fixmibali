<div class="admin-section-block">
    <div class="flex flex-col gap-1">
        <p class="admin-section-title">{{ $section['label'] }}</p>
    </div>

    <form id="pricelist-import-{{ $section['key'] }}" class="admin-file" method="POST" action="{{ route('admin.pricelist.import', $section['key']) }}" enctype="multipart/form-data">
        @csrf
        <input
            type="file"
            name="pricelist_file"
            accept=".csv,.txt,.json,.html,.htm,.xls,.xlsx"
            required
        />
    </form>

    <div class="admin-actions">
        <button type="submit" form="pricelist-import-{{ $section['key'] }}" class="admin-button admin-button--primary">
            Upload Data Pricelist
        </button>
        @if (!empty($section['table']))
            <form method="POST" action="{{ route('admin.pricelist.undo', $section['key']) }}">
                @csrf
                <button type="submit" class="admin-button admin-button--ghost">
                    Undo Import
                </button>
            </form>
            <form method="POST" action="{{ route('admin.pricelist.delete', $section['key']) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="admin-button admin-button--danger" onclick="return confirm('Hapus semua data pricelist yang sudah diimport?')">
                    Hapus Data Pricelist
                </button>
            </form>
        @endif
    </div>

    @if (!empty($section['table']))
        <div class="admin-meta">
            <p>
                Data aktif:
                <strong>{{ count($section['table']['rows'] ?? []) }}</strong> baris,
                <strong>{{ count($section['table']['headers'] ?? []) }}</strong> kolom.
            </p>
            @if (!empty($section['updated_at']))
                <p>Terakhir diperbarui: {{ $section['updated_at']->format('d M Y H:i') }}.</p>
            @endif
        </div>
    @else
        <p class="admin-meta">Belum ada data pricelist yang diimport.</p>
    @endif
</div>
