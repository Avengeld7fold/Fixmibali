<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>{{ __('site.gallery.page_title') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" type="image/png" href="/assets/img/favinco.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&amp;family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&amp;family=Space+Grotesk:wght@500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&amp;display=swap" rel="stylesheet"/>
    <link href="/assets/css/style.css" rel="stylesheet"/>
    <style>
        .gallery-justified {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        align-items: flex-start;
        transition: opacity 0.3s ease;
        }

        .gallery-justified:not(.is-ready) .gallery-item {
            width: 210px;
            height: 160px;
        }

        .gallery-justified:not(.is-ready) .gallery-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @media (max-width: 575.98px) {
            .gallery-justified {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .gallery-item {
                width: auto !important;
                height: auto !important;
            }

            .gallery-card {
                border-radius: 14px;
                aspect-ratio: 4 / 5;
            }

            .gallery-button,
            .gallery-image {
                width: 100%;
                height: 100%;
            }
        }

        .gallery-item {
            flex: 0 0 auto;
        }

        .gallery-card {
            border-radius: 1rem;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 0.75rem 1.5rem rgba(15, 23, 42, 0.08);
            border: 1px solid var(--admin-border, rgba(15, 23, 42, 0.08));
            transition: transform 0.18s ease, box-shadow 0.18s ease;
            height: 100%;
        }

        .gallery-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 1rem 2rem rgba(15, 23, 42, 0.12);
        }

        .gallery-button {
            display: block;
            width: 100%;
            height: 100%;
            padding: 0;
            border: 0;
            background: transparent;
        }

        .gallery-image {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .gallery-modal-image {
            width: auto;
            height: auto;
            max-width: 100%;
            max-height: 85vh;
            object-fit: contain;
            object-position: center;
            background-color: transparent;
            display: block;
            margin: 0 auto;
        }

        #galleryModal .modal-content {
            position: relative;
        }

        #galleryModal .modal-body {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gallery-modal-close {
            position: absolute;
            top: 12px;
            right: 12px;
            z-index: 2;
            width: 38px;
            height: 38px;
            border: 0;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.85);
            color: #111111;
            font-size: 1.6rem;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .gallery-modal-close:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 575.98px) {
            #galleryModal .modal-dialog {
                margin: 1rem;
                max-width: calc(100% - 2rem);
            }

            #galleryModal .modal-body {
                padding: 0;
            }

            .gallery-modal-image {
                max-height: 80vh;
                border-radius: 1rem;
            }

            .modal-backdrop {
                background-color: transparent;
            }

            .modal-backdrop.show {
                opacity: 0;
            }
        }
    </style>
</head>
<body class="fixmi-home-page fixmi-gallery-page fixmi-whatsapp-mobile">
@include('partials.nav')

<section class="py-5 gallery-section">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-title">{{ __('site.gallery.title') }}</h2>
            <p class="text-muted mb-0">{{ __('site.gallery.subtitle') }}</p>
        </div>

        @if (count($images) === 0)
            <div class="text-center py-5">
                <p class="mb-0">{{ __('site.gallery.empty') }}</p>
            </div>
        @else
                <div id="galleryJustified" class="gallery-justified">
                @foreach ($images as $image)
                <div class="gallery-item">
                        <div class="gallery-card">
                            <button
                                type="button"
                                class="gallery-button"
                                data-bs-toggle="modal"
                                data-bs-target="#galleryModal"
                                data-src="{{ $image['url'] }}"
                                data-alt="Gallery repair {{ $image['filename'] }}"
                                data-filename="{{ $image['filename'] }}"
                            >
                                <img
                                    src="{{ $image['url'] }}"
                                    alt="Gallery repair {{ $image['filename'] }}"
                                    class="gallery-image"
                                    loading="lazy"
                                />
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

@include('partials.footer')

<div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-transparent border-0">
            <button type="button" class="gallery-modal-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body p-0">
                <img id="galleryModalImage" src="" alt="" class="img-fluid rounded-4 shadow-lg gallery-modal-image">
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/app.js"></script>
<script>
    (function () {
        const modal = document.getElementById('galleryModal');
        const modalImage = document.getElementById('galleryModalImage');
        if (!modal || !modalImage) return;

        modal.addEventListener('show.bs.modal', function (event) {
            const trigger = event.relatedTarget;
            if (!trigger) return;
            const src = trigger.getAttribute('data-src') || '';
            const alt = trigger.getAttribute('data-alt') || '';
            const filename = trigger.getAttribute('data-filename') || '';
            modalImage.src = src;
            modalImage.alt = alt;
            if (filename) {
                const tokenMeta = document.querySelector('meta[name="csrf-token"]');
                const token = tokenMeta ? tokenMeta.getAttribute('content') : '';
                fetch(`/gallery/view/${encodeURIComponent(filename)}`, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        ...(token ? { 'X-CSRF-TOKEN': token } : {}),
                    },
                }).catch(() => {});
            }
        });
        
        modal.addEventListener('hidden.bs.modal', function () {
            modalImage.src = '';
            modalImage.alt = '';
        });
    })();
</script>
<script>
    (function () {
        const container = document.getElementById('galleryJustified');
        if (!container) return;

        const clamp = (value, min, max) => Math.min(max, Math.max(min, value));

        const targetRowHeight = () => {
            const w = window.innerWidth || 1200;
            if (w < 576) return 160;
            if (w < 992) return 190;
            return 230;
        };

        const isMobileGrid = () => (window.innerWidth || 0) < 576;

        const layout = () => {
            const gap = 14;
            const items = Array.from(container.querySelectorAll('.gallery-item'));
            if (items.length === 0) return;

            const containerWidth = container.clientWidth;
            if (!containerWidth) return;

            if (isMobileGrid()) {
                items.forEach((item) => {
                    item.style.width = '';
                    item.style.height = '';
                });
                container.classList.add('is-ready');
                return;
            }

            const rowTarget = targetRowHeight();
            const minRow = 160;
            const maxRow = 320;

            const metas = items
                .map((item) => {
                    const img = item.querySelector('img');
                    if (!img) return null;
                    const w = img.naturalWidth || 0;
                    const h = img.naturalHeight || 0;
                    const ratio = w > 0 && h > 0 ? w / h : 4 / 3;
                    return { item, ratio };
                })
                .filter(Boolean);

            let row = [];
            let rowRatioSum = 0;

            const flushRow = (isLastRow) => {
                if (row.length === 0) return;

                const gapsWidth = gap * (row.length - 1);
                const available = Math.max(1, containerWidth - gapsWidth);
                let height = available / rowRatioSum;
                if (isLastRow) {
                    height = rowTarget;
                }
                height = clamp(height, minRow, maxRow);

                for (const meta of row) {
                    const width = meta.ratio * height;
                    meta.item.style.width = `${width}px`;
                    meta.item.style.height = `${height}px`;
                }

                row = [];
                rowRatioSum = 0;
            };

            for (let i = 0; i < metas.length; i += 1) {
                const meta = metas[i];
                row.push(meta);
                rowRatioSum += meta.ratio;

                const gapsWidth = gap * (row.length - 1);
                const predicted = rowRatioSum * rowTarget + gapsWidth;
                const isLast = i === metas.length - 1;

                if (predicted >= containerWidth || isLast) {
                    flushRow(isLast);
                }
            }

            container.classList.add('is-ready');
        };

        const ensureLoaded = async () => {
            const imgs = Array.from(container.querySelectorAll('img'));
            await Promise.all(
                imgs.map(async (img) => {
                    try {
                        if (img.complete) return;
                        await img.decode();
                    } catch (e) {}
                })
            );
            layout();
        };

        let resizeTimer = null;
        window.addEventListener('resize', () => {
            if (resizeTimer) {
                window.clearTimeout(resizeTimer);
            }
            resizeTimer = window.setTimeout(() => {
                layout();
            }, 120);
        });

        ensureLoaded();
        window.setTimeout(() => {
            layout();
        }, 400);
    })();
</script>
</body>
</html>
