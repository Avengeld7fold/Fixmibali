<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-semibold text-gray-900">
                Kelola Promo
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                Upload poster promo terbaru, otomatis tampil di halaman Promo.
            </p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

            <div class="mt-6 admin-panel-card overflow-hidden rounded-2xl shadow-sm">
                <div class="px-6 pt-6">
                    <div class="border-b border-gray-200">
                        <div class="flex items-end justify-between gap-6">
                            <div>
                                <h3 class="text-base font-semibold text-gray-900">
                                    Poster Promo
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    Rasio yang disarankan: 9:16.
                                </p>
                            </div>
                            <a class="pb-3 text-sm font-semibold text-gray-500 hover:text-gray-900" href="{{ route('promo') }}" target="_blank" rel="noopener noreferrer">
                                Lihat halaman Promo
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                        <div class="rounded-2xl border-2 border-dashed border-gray-300 bg-white p-4 shadow-sm">
                            <div class="flex h-full flex-col items-center justify-center text-center">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-dashed border-gray-300 bg-gray-50">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="h-7 w-7 text-gray-400" aria-hidden="true">
                                        <path d="M4 7a2 2 0 0 1 2-2h2l1-1h6l1 1h2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7z" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12 10a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7z" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="mt-4 text-base font-semibold text-gray-900">
                                    Tambah Poster
                                </div>
                                <div class="mt-1 text-sm text-gray-500">
                                    Upload gambar promo (JPG, PNG, WEBP).
                                </div>
                                <button
                                    type="button"
                                    class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-800"
                                    onclick="window.dispatchEvent(new CustomEvent('open-modal', { detail: 'promo-upload' }))"
                                >
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4" aria-hidden="true">
                                        <path d="M10 4a1 1 0 0 1 1 1v4h4a1 1 0 1 1 0 2h-4v4a1 1 0 1 1-2 0v-4H5a1 1 0 1 1 0-2h4V5a1 1 0 0 1 1-1z" />
                                    </svg>
                                    Upload
                                </button>
                            </div>
                        </div>

                        @foreach ($images as $image)
                            @php
                                $dateLabel = \Carbon\Carbon::createFromTimestamp($image['last_modified'])->setTimezone('Asia/Makassar')->format('M j, Y');
                            @endphp

                            <div class="group relative rounded-2xl bg-white p-3 shadow-sm ring-1 ring-black/5">
                                <button
                                    type="button"
                                    class="block w-full overflow-hidden rounded-2xl bg-gray-100"
                                    data-promo-preview
                                    data-url="{{ $image['url'] }}"
                                    data-alt="Promo {{ $image['filename'] }}"
                                >
                                    <img
                                        src="{{ $image['url'] }}"
                                        alt="Promo {{ $image['filename'] }}"
                                        class="w-full object-cover aspect-[9/16]"
                                        loading="lazy"
                                    >
                                </button>

                                <form
                                    method="POST"
                                    action="{{ route('admin.promo.destroy', ['filename' => $image['filename']]) }}"
                                    class="absolute right-5 top-5 opacity-0 transition-opacity group-hover:opacity-100"
                                    onsubmit="return confirm('Hapus poster promo ini?')"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-red-200 bg-white/90 text-red-600 shadow-sm hover:bg-white" aria-label="Hapus poster promo">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4" aria-hidden="true">
                                            <path d="M9 3h6m-8 4h10M10 7v14m4-14v14M6 7l1 14a1 1 0 0 0 1 .9h8a1 1 0 0 0 1-.9l1-14" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </form>

                                <div class="px-1 pb-2 pt-3">
                                    <div class="text-sm font-medium text-gray-500">
                                        {{ $dateLabel }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if (count($images) === 0)
                        <p class="mt-6 text-sm text-gray-500">
                            Belum ada poster promo.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <x-modal name="promo-upload" :show="false" maxWidth="2xl">
        <div class="admin-upload-modal" x-data="adminPromoUpload()" x-init="init()">
            <div class="admin-upload-header">
                <div class="admin-upload-title">Upload poster promo</div>
                <button
                    type="button"
                    class="admin-upload-close"
                    aria-label="Close"
                    x-on:click="close()"
                >
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="admin-upload-close-icon" aria-hidden="true">
                        <path d="M18 6 6 18M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <div class="admin-upload-body">
                <div
                    class="admin-dropzone"
                    :class="dragOver ? 'is-dragover' : ''"
                    x-on:dragover.prevent="dragOver = true"
                    x-on:dragleave.prevent="dragOver = false"
                    x-on:drop.prevent="dragOver = false; addFiles($event.dataTransfer.files)"
                    x-on:click="$refs.fileInput.click()"
                    role="button"
                    tabindex="0"
                    x-on:keydown.enter.prevent="$refs.fileInput.click()"
                >
                    <div class="admin-dropzone-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path d="M12 16V4m0 0 4 4m-4-4-4 4" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M4 16v3a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-3" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="admin-dropzone-text">
                        Drag and Drop file di sini atau <span class="admin-dropzone-link">Choose file</span>
                    </div>
                    <input
                        type="file"
                        x-ref="fileInput"
                        class="admin-upload-hidden-input"
                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                        multiple
                        x-on:change="addFiles($event.target.files); $event.target.value = ''"
                    />
                </div>

                <div class="admin-upload-support">
                    <div>Format: JPG, PNG, WEBP</div>
                    <div>Rasio 9:16, maksimum 5MB</div>
                </div>

                <template x-if="errorMessage">
                    <div class="admin-upload-error" x-text="errorMessage"></div>
                </template>

                <template x-if="queue.length">
                    <div class="admin-upload-list">
                        <template x-for="item in queue" :key="item.id">
                            <div class="admin-upload-item">
                                <div class="admin-upload-file-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                        <path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M14 3v5h5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>

                                <div class="admin-upload-file-meta">
                                    <div class="admin-upload-file-name" x-text="item.name"></div>
                                    <div class="admin-upload-file-size" x-text="item.sizeLabel"></div>
                                    <div class="admin-upload-progress-track">
                                        <div class="admin-upload-progress-fill" :style="`width: ${item.progress}%`"></div>
                                    </div>
                                </div>

                                <div class="admin-upload-file-actions">
                                    <button
                                        type="button"
                                        class="admin-upload-file-remove"
                                        aria-label="Remove"
                                        x-on:click="remove(item.id)"
                                        :disabled="uploading"
                                    >
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="admin-upload-close-icon" aria-hidden="true">
                                            <path d="M18 6 6 18M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <div class="admin-upload-percent" x-text="`${item.progress}%`"></div>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>
            </div>

            <div class="admin-upload-footer">
                <div class="admin-upload-help">
                    <span class="admin-upload-help-icon">?</span>
                    <span>Bantuan</span>
                </div>
                <div class="admin-upload-footer-actions">
                    <button type="button" class="admin-upload-footer-button admin-upload-footer-button--ghost" x-on:click="cancel()" x-text="uploading || committing ? 'Cancel' : 'Close'"></button>
                    <button
                        type="button"
                        class="admin-upload-footer-button admin-upload-footer-button--primary"
                        x-on:click="commit()"
                        :class="canCommit() ? 'is-ready' : 'is-disabled'"
                        x-text="committing ? 'Menyimpan...' : (uploading ? 'Uploading...' : 'Upload')"
                    ></button>
                </div>
            </div>
        </div>
    </x-modal>

    <div
        x-data="{ show: false, url: '', alt: '' }"
        x-on:promo-preview-open.window="url = $event.detail.url || ''; alt = $event.detail.alt || ''; show = true"
        x-on:keydown.escape.window="show = false"
        x-show="show"
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        style="display: none;"
    >
        <div class="absolute inset-0 bg-black/70" x-on:click="show = false"></div>
        <div class="relative w-full max-w-5xl">
            <img :src="url" :alt="alt" class="w-full max-h-[85vh] rounded-2xl object-contain shadow-2xl">
        </div>
    </div>

    <script>
        function adminPromoUpload() {
            return {
                dragOver: false,
                uploading: false,
                committing: false,
                errorMessage: '',
                cancelRequested: false,
                tempUrl: '',
                commitUrl: '',
                clearUrl: '',
                queue: [],
                init() {
                    const base = (window.location.pathname || '/dashboard/promo').replace(/\/$/, '');
                    this.tempUrl = `${base}/temp`;
                    this.commitUrl = `${base}/commit`;
                    this.clearUrl = `${base}/temp/clear`;
                },
                addFiles(files) {
                    if (!files || files.length === 0) return;
                    const allowed = ['image/jpeg', 'image/png', 'image/webp'];
                    const maxBytes = 5 * 1024 * 1024;
                    let added = 0;

                    for (const file of files) {
                        const name = (file.name || '').toLowerCase();
                        const okByMime = file.type ? allowed.includes(file.type) : false;
                        const okByExt = /\.(jpe?g|png|webp)$/.test(name);

                        if (!okByMime && !okByExt) {
                            continue;
                        }

                        if (file.size > maxBytes) {
                            continue;
                        }

                        this.queue.push({
                            id: crypto.randomUUID ? crypto.randomUUID() : `${Date.now()}-${Math.random()}`,
                            file,
                            name: file.name,
                            sizeLabel: this.formatBytes(file.size),
                            progress: 0,
                            status: 'queued',
                            token: null,
                            xhr: null,
                        });
                        added += 1;
                    }
                    this.errorMessage = added === 0 ? 'File tidak diterima. Pastikan format JPG/PNG/WEBP dan ukuran ≤ 5MB.' : '';
                    if (added > 0) {
                        this.startTempUpload();
                    }
                },
                remove(id) {
                    if (this.uploading) return;
                    this.queue = this.queue.filter((item) => item.id !== id);
                },
                close() {
                    this.cleanupAndClose();
                },
                cancel() {
                    if (this.uploading) {
                        this.cancelRequested = true;
                        for (const item of this.queue) {
                            if (item.xhr) {
                                try {
                                    item.xhr.abort();
                                } catch (e) {}
                            }
                        }
                        return;
                    }
                    if (this.committing) {
                        return;
                    }
                    this.cleanupAndClose();
                },
                cleanupAndClose() {
                    if (this.uploading || this.committing) {
                        return;
                    }

                    const tokens = this.queue.map((item) => item.token).filter(Boolean);
                    if (tokens.length === 0) {
                        window.dispatchEvent(new CustomEvent('close-modal', { detail: 'promo-upload' }));
                        this.queue = [];
                        this.errorMessage = '';
                        return;
                    }

                    const tokenMeta = document.querySelector('meta[name="csrf-token"]');
                    const token = tokenMeta ? tokenMeta.getAttribute('content') : '';

                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', this.clearUrl, true);
                    xhr.setRequestHeader('Accept', 'application/json');
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                    if (token) {
                        xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }

                    xhr.onload = () => {
                        window.dispatchEvent(new CustomEvent('close-modal', { detail: 'promo-upload' }));
                        this.queue = [];
                        this.errorMessage = '';
                    };
                    xhr.onerror = () => {
                        window.dispatchEvent(new CustomEvent('close-modal', { detail: 'promo-upload' }));
                        this.queue = [];
                        this.errorMessage = '';
                    };

                    xhr.send(JSON.stringify({ tokens }));
                },
                canCommit() {
                    if (this.queue.length === 0) return false;
                    if (this.uploading) return false;
                    if (this.committing) return false;
                    return this.queue.every((item) => item.status === 'uploaded' && item.token);
                },
                startTempUpload() {
                    if (this.uploading) return;
                    if (this.queue.length === 0) return;
                    this.uploadAllTemp();
                },
                uploadOneTemp(item, token) {
                    return new Promise((resolve, reject) => {
                        const xhr = new XMLHttpRequest();
                        item.xhr = xhr;

                        xhr.open('POST', this.tempUrl, true);
                        xhr.setRequestHeader('Accept', 'application/json');
                        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                        if (token) {
                            xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }

                        xhr.timeout = 120000;
                        xhr.upload.onprogress = (event) => {
                            if (!event.lengthComputable) return;
                            const pct = Math.round((event.loaded / event.total) * 100);
                            item.progress = Math.max(item.progress, Math.min(99, pct));
                        };

                        xhr.onload = () => {
                            if (xhr.status >= 200 && xhr.status < 300) {
                                let data = null;
                                try {
                                    data = JSON.parse(xhr.responseText || '{}');
                                } catch (e) {
                                    data = null;
                                }

                                const tokenValue = data && data.items && data.items[0] && data.items[0].token ? data.items[0].token : null;
                                if (!tokenValue) {
                                    reject(new Error('Response upload tidak valid.'));
                                    return;
                                }
                                resolve(tokenValue);
                                return;
                            }
                            if (xhr.status === 419) {
                                reject(new Error('Session/CSRF expired. Refresh halaman lalu coba lagi.'));
                                return;
                            }
                            if (xhr.status === 413) {
                                reject(new Error('File terlalu besar. Pastikan ≤ 5MB dan server mengizinkan upload.'));
                                return;
                            }
                            reject(new Error(`Upload gagal (HTTP ${xhr.status}).`));
                        };

                        xhr.onerror = () => reject(new Error('Upload gagal. Cek koneksi atau konfigurasi server.'));
                        xhr.ontimeout = () => reject(new Error('Upload timeout.'));
                        xhr.onabort = () => reject(new Error('Upload dibatalkan.'));

                        const form = new FormData();
                        form.append('images[]', item.file);
                        if (token) {
                            form.append('_token', token);
                        }
                        xhr.send(form);
                    });
                },
                async uploadAllTemp() {
                    this.uploading = true;
                    this.cancelRequested = false;
                    this.errorMessage = '';
                    const tokenMeta = document.querySelector('meta[name="csrf-token"]');
                    const token = tokenMeta ? tokenMeta.getAttribute('content') : '';

                    for (const item of this.queue) {
                        if (item.status === 'uploaded') continue;

                        try {
                            item.status = 'uploading';
                            const tempToken = await this.uploadOneTemp(item, token);
                            item.progress = 100;
                            item.status = 'uploaded';
                            item.token = tempToken;
                        } catch (error) {
                            if (this.cancelRequested) {
                                item.status = 'cancelled';
                                this.uploading = false;
                                this.cancelRequested = false;
                                this.cleanupAndClose();
                                return;
                            }
                            item.status = 'error';
                            this.errorMessage = error && error.message ? error.message : 'Upload gagal.';
                            this.uploading = false;
                            return;
                        }
                    }

                    this.uploading = false;
                },
                commit() {
                    if (!this.canCommit()) {
                        if (this.queue.length === 0) {
                            this.errorMessage = 'Pilih file dulu sebelum upload.';
                        } else if (this.uploading) {
                            this.errorMessage = 'Tunggu upload selesai (progress 100%) dulu.';
                        } else {
                            this.errorMessage = 'Tunggu semua file selesai terupload dulu.';
                        }
                        return;
                    }

                    this.commitAll();
                },
                commitAll() {
                    this.committing = true;
                    this.errorMessage = '';
                    const tokenMeta = document.querySelector('meta[name="csrf-token"]');
                    const token = tokenMeta ? tokenMeta.getAttribute('content') : '';
                    const tokens = this.queue.map((item) => item.token).filter(Boolean);

                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', this.commitUrl, true);
                    xhr.setRequestHeader('Accept', 'application/json');
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                    if (token) {
                        xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }

                    xhr.onload = () => {
                        this.committing = false;
                        if (xhr.status >= 200 && xhr.status < 300) {
                            window.dispatchEvent(new CustomEvent('close-modal', { detail: 'promo-upload' }));
                            window.location.reload();
                            return;
                        }
                        if (xhr.status === 419) {
                            this.errorMessage = 'Session/CSRF expired. Refresh halaman lalu coba lagi.';
                            return;
                        }
                        if (xhr.status === 422) {
                            try {
                                const payload = JSON.parse(xhr.responseText || '{}');
                                this.errorMessage = payload && payload.message ? payload.message : 'Gagal simpan.';
                            } catch (e) {
                                this.errorMessage = 'Gagal simpan.';
                            }
                            return;
                        }
                        this.errorMessage = `Gagal simpan (HTTP ${xhr.status}).`;
                    };
                    xhr.onerror = () => {
                        this.committing = false;
                        this.errorMessage = 'Gagal simpan. Cek koneksi atau konfigurasi server.';
                    };

                    xhr.send(JSON.stringify({ tokens }));
                },
                formatBytes(bytes) {
                    if (!bytes) return '0 B';
                    const units = ['B', 'KB', 'MB', 'GB'];
                    const index = Math.min(Math.floor(Math.log(bytes) / Math.log(1024)), units.length - 1);
                    const value = bytes / Math.pow(1024, index);
                    return `${value.toFixed(index === 0 ? 0 : 1)} ${units[index]}`;
                },
            }
        }
    </script>

    <script>
        (function () {
            const items = document.querySelectorAll('[data-promo-preview]');
            items.forEach((item) => {
                item.addEventListener('click', () => {
                    const url = item.getAttribute('data-url') || '';
                    const alt = item.getAttribute('data-alt') || '';
                    window.dispatchEvent(new CustomEvent('promo-preview-open', { detail: { url, alt } }));
                });
            });
        })();
    </script>
</x-app-layout>
