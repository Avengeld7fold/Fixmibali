<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>{{ __('site.promo.page_title') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" type="image/svg+xml" href="/assets/img/favinco.svg"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&amp;family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&amp;family=Space+Grotesk:wght@500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&amp;display=swap" rel="stylesheet"/>
    <link href="/assets/css/style.css" rel="stylesheet"/>
</head>
<body class="fixmi-home-page fixmi-promo-page fixmi-whatsapp-mobile">
@include('partials.nav')

<section class="py-5 promo-section">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-title">{{ __('site.promo.title') }}</h2>
            <p class="text-muted mb-0">{{ __('site.promo.subtitle') }}</p>
        </div>

        @if (count($images) === 0)
            <div class="text-center py-5">
                <p class="mb-0">{{ __('site.promo.empty') }}</p>
            </div>
        @else
            <div class="promo-grid">
                @foreach ($images as $image)
                    @php
                        $altText = __('site.promo.image_alt', ['name' => $image['filename']]);
                    @endphp
                    <button
                        type="button"
                        class="promo-card"
                        data-bs-toggle="modal"
                        data-bs-target="#promoModal"
                        data-src="{{ $image['url'] }}"
                        data-alt="{{ $altText }}"
                        data-index="{{ $loop->index }}"
                        data-filename="{{ $image['filename'] }}"
                    >
                        <img
                            src="{{ $image['url'] }}"
                            alt="{{ $altText }}"
                            class="promo-image"
                            loading="lazy"
                        />
                    </button>
                @endforeach
            </div>
        @endif
    </div>
</section>

<section class="py-5 promo-steps-section process-section">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-title">{{ __('site.promo.how_title') }}</h2>
            <p class="text-muted mb-0">{{ __('site.promo.how_subtitle') }}</p>
        </div>
        <div class="row g-3">
            <div class="col-12 col-md-4">
                <div class="process-card h-100">
                    <div class="process-icon"><i class="bi bi-image"></i></div>
                    <h5 class="process-title mb-1">{{ __('site.promo.steps.pick_title') }}</h5>
                    <p class="process-desc mb-0">{{ __('site.promo.steps.pick_desc') }}</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="process-card h-100">
                    <div class="process-icon"><i class="bi bi-chat-dots"></i></div>
                    <h5 class="process-title mb-1">{{ __('site.promo.steps.chat_title') }}</h5>
                    <p class="process-desc mb-0">{{ __('site.promo.steps.chat_desc') }}</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="process-card h-100">
                    <div class="process-icon"><i class="bi bi-check2-circle"></i></div>
                    <h5 class="process-title mb-1">{{ __('site.promo.steps.claim_title') }}</h5>
                    <p class="process-desc mb-0">{{ __('site.promo.steps.claim_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.footer')

<div class="modal fade" id="promoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 promo-modal-body">
                <div class="promo-modal-view">
                    <img id="promoModalImage" src="" alt="" class="img-fluid rounded-4 shadow-lg promo-modal-image">
                    <button type="button" class="promo-modal-nav promo-modal-prev" id="promoModalPrev" aria-label="Poster sebelumnya">
                        <i class="bi bi-chevron-left" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="promo-modal-nav promo-modal-next" id="promoModalNext" aria-label="Poster berikutnya">
                        <i class="bi bi-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="promo-modal-actions">
                    <a id="promoModalDownload" class="promo-modal-action" href="#" download>
                        <i class="bi bi-download" aria-hidden="true"></i>
                        <span>Download</span>
                    </a>
                    <div class="promo-modal-share-group">
                        <button
                            type="button"
                            class="promo-modal-action"
                            id="promoModalShareToggle"
                            aria-expanded="false"
                            aria-controls="promoModalShareMenu"
                        >
                            <i class="bi bi-share" aria-hidden="true"></i>
                            <span>Share</span>
                            <i class="bi bi-chevron-down" aria-hidden="true"></i>
                        </button>
                        <div class="promo-modal-share-menu" id="promoModalShareMenu" role="menu" aria-label="Share menu">
                            <button type="button" class="promo-modal-action" id="promoModalShareWhatsapp" role="menuitem">
                                <i class="bi bi-whatsapp" aria-hidden="true"></i>
                                <span>WhatsApp</span>
                            </button>
                            <button type="button" class="promo-modal-action" id="promoModalShareFacebook" role="menuitem">
                                <i class="bi bi-facebook" aria-hidden="true"></i>
                                <span>Facebook</span>
                            </button>
                            <button type="button" class="promo-modal-action" id="promoModalShareInstagram" role="menuitem">
                                <i class="bi bi-instagram" aria-hidden="true"></i>
                                <span>Instagram</span>
                            </button>
                        </div>
                    </div>
                    <button type="button" class="promo-modal-action promo-modal-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg" aria-hidden="true"></i>
                        <span>Tutup</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/app.js"></script>
<script>
    (function () {
        const modal = document.getElementById('promoModal');
        const modalImage = document.getElementById('promoModalImage');
        const downloadLink = document.getElementById('promoModalDownload');
        const shareToggle = document.getElementById('promoModalShareToggle');
        const shareMenu = document.getElementById('promoModalShareMenu');
        const shareWhatsapp = document.getElementById('promoModalShareWhatsapp');
        const shareFacebook = document.getElementById('promoModalShareFacebook');
        const shareInstagram = document.getElementById('promoModalShareInstagram');
        const prevButton = document.getElementById('promoModalPrev');
        const nextButton = document.getElementById('promoModalNext');
        if (!modal || !modalImage) return;

        const cards = Array.from(document.querySelectorAll('.promo-card'));
        if (!cards.length) return;

        const items = cards.map((card) => ({
            src: card.getAttribute('data-src') || '',
            alt: card.getAttribute('data-alt') || '',
            filename: card.getAttribute('data-filename') || '',
        }));

        let currentIndex = 0;

        const getFilename = (item, index) => {
            if (item && item.filename) return item.filename;
            if (item && item.src) {
                const base = item.src.split('?')[0] || '';
                const parts = base.split('/');
                const name = parts[parts.length - 1];
                if (name) return name;
            }
            return `promo-${index + 1}.jpg`;
        };

        const updateModal = (index) => {
            if (!items.length) return;
            currentIndex = (index + items.length) % items.length;
            const item = items[currentIndex];
            modalImage.src = item.src;
            modalImage.alt = item.alt;
            if (downloadLink) {
                downloadLink.href = item.src || '#';
                downloadLink.setAttribute('download', getFilename(item, currentIndex));
            }
        };

        const step = (delta) => {
            updateModal(currentIndex + delta);
        };

        if (items.length < 2) {
            if (prevButton) prevButton.classList.add('is-hidden');
            if (nextButton) nextButton.classList.add('is-hidden');
        }

        modal.addEventListener('show.bs.modal', function (event) {
            const trigger = event.relatedTarget;
            const index = trigger ? parseInt(trigger.getAttribute('data-index') || '0', 10) : 0;
            updateModal(isNaN(index) ? 0 : index);
        });

        modal.addEventListener('hidden.bs.modal', function () {
            modalImage.src = '';
            modalImage.alt = '';
            closeShareMenu();
        });

        if (prevButton) {
            prevButton.addEventListener('click', function () {
                step(-1);
            });
        }

        if (nextButton) {
            nextButton.addEventListener('click', function () {
                step(1);
            });
        }

        const shareMessage = 'Hey lihat ini deh Fixmi Service Center saat ini sedang ada promo baru link promo nya';

        const buildShareText = (url) => `${shareMessage} ${url}`.trim();

        const shareNative = async (payload) => {
            if (!navigator.share) return false;
            try {
                await navigator.share(payload);
                return true;
            } catch (e) {
                return false;
            }
        };

        const setCopiedState = (button, label) => {
            if (!button) return;
            const span = button.querySelector('span');
            if (!span) return;
            const original = span.textContent;
            button.classList.add('is-copied');
            span.textContent = label;
            window.setTimeout(() => {
                span.textContent = original;
                button.classList.remove('is-copied');
            }, 1400);
        };

        const copyToClipboard = async (text, button) => {
            if (navigator.clipboard && window.isSecureContext) {
                try {
                    await navigator.clipboard.writeText(text);
                    setCopiedState(button, 'Link tersalin');
                    return true;
                } catch (e) {
                    return false;
                }
            }
            return false;
        };

        const closeShareMenu = () => {
            if (!shareMenu || !shareToggle) return;
            shareMenu.classList.remove('is-open');
            shareToggle.setAttribute('aria-expanded', 'false');
        };

        const positionShareMenu = () => {
            if (!shareMenu || !shareToggle) return;
            const rect = shareToggle.getBoundingClientRect();
            if (!rect.width || !rect.height) return;

            const menuRect = shareMenu.getBoundingClientRect();
            const menuWidth = menuRect.width || 220;
            const menuHeight = menuRect.height || 48;
            const padding = 8;

            let left = rect.left + rect.width / 2;
            left = Math.min(window.innerWidth - menuWidth / 2 - padding, Math.max(menuWidth / 2 + padding, left));

            let top = rect.bottom + padding;
            if (top + menuHeight > window.innerHeight - padding) {
                top = rect.top - menuHeight - padding;
            }

            shareMenu.style.setProperty('--promo-share-left', `${left}px`);
            shareMenu.style.setProperty('--promo-share-top', `${top}px`);
        };

        const getSharePayload = () => {
            const item = items[currentIndex] || {};
            const url = item.src || window.location.href;
            return {
                url,
                text: shareMessage,
                title: document.title,
            };
        };

        if (shareToggle && shareMenu) {
            shareToggle.addEventListener('click', function () {
                const isOpen = shareMenu.classList.contains('is-open');
                if (isOpen) {
                    closeShareMenu();
                } else {
                    shareMenu.classList.add('is-open');
                    shareToggle.setAttribute('aria-expanded', 'true');
                    positionShareMenu();
                }
            });
        }

        if (shareWhatsapp) {
            shareWhatsapp.addEventListener('click', async function () {
                const payload = getSharePayload();
                const url = payload.url || window.location.href;
                if (await shareNative(payload)) {
                    closeShareMenu();
                    return;
                }
                const text = buildShareText(url);
                window.open(`https://wa.me/?text=${encodeURIComponent(text)}`, '_blank', 'noopener,noreferrer');
                closeShareMenu();
            });
        }

        if (shareFacebook) {
            shareFacebook.addEventListener('click', async function () {
                const payload = getSharePayload();
                const url = payload.url || window.location.href;
                if (await shareNative(payload)) {
                    closeShareMenu();
                    return;
                }
                const quote = buildShareText(url);
                window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}&quote=${encodeURIComponent(quote)}`, '_blank', 'noopener,noreferrer');
                closeShareMenu();
            });
        }

        if (shareInstagram) {
            shareInstagram.addEventListener('click', async function () {
                const payload = getSharePayload();
                const url = payload.url || window.location.href;
                if (await shareNative(payload)) {
                    closeShareMenu();
                    return;
                }
                const text = buildShareText(url);
                const copied = await copyToClipboard(text, shareInstagram);
                if (!copied) {
                    window.prompt('Salin link promo:', text);
                }
                window.open('https://www.instagram.com/', '_blank', 'noopener,noreferrer');
                closeShareMenu();
            });
        }

        let touchStartX = 0;
        let touchStartY = 0;
        const onTouchStart = (event) => {
            const touch = event.changedTouches[0];
            touchStartX = touch ? touch.clientX : 0;
            touchStartY = touch ? touch.clientY : 0;
        };
        const onTouchEnd = (event) => {
            const touch = event.changedTouches[0];
            if (!touch) return;
            const deltaX = touch.clientX - touchStartX;
            const deltaY = touch.clientY - touchStartY;
            if (Math.abs(deltaX) < 40 || Math.abs(deltaX) < Math.abs(deltaY)) {
                return;
            }
            if (deltaX > 0) {
                step(-1);
            } else {
                step(1);
            }
        };

        modalImage.addEventListener('touchstart', onTouchStart, { passive: true });
        modalImage.addEventListener('touchend', onTouchEnd, { passive: true });

        document.addEventListener('keydown', function (event) {
            if (!modal.classList.contains('show')) {
                return;
            }
            if (event.key === 'ArrowLeft') {
                step(-1);
            } else if (event.key === 'ArrowRight') {
                step(1);
            }
        });

        document.addEventListener('click', function (event) {
            if (!shareMenu || !shareToggle) return;
            if (!shareMenu.classList.contains('is-open')) return;
            const group = shareToggle.closest('.promo-modal-share-group');
            if (group && !group.contains(event.target)) {
                closeShareMenu();
            }
        });

        window.addEventListener('resize', function () {
            if (shareMenu && shareMenu.classList.contains('is-open')) {
                positionShareMenu();
            }
        });

    })();
</script>
</body>
</html>
