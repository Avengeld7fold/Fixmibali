<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>{{ __('site.contact.page_title') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" type="image/png" href="/assets/img/favinco.png"/>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&amp;family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&amp;family=Space+Grotesk:wght@500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&amp;display=swap" rel="stylesheet"/>
    <link href="/assets/css/style.css" rel="stylesheet"/>
</head>
<body class="fixmi-home-page fixmi-contact-page fixmi-whatsapp-mobile">

@include('partials.nav')

@php
    $mapLink = 'https://www.google.com/maps?cid=4657379395589989071';
    $whatsAppNumber = $whatsAppNumber ?? '628873183122';
@endphp

<main class="contact-page">
    <section class="contact-hero">
        <div class="container">
            <div class="contact-hero-inner">
                <span class="contact-pill">{{ __('site.contact.hero_badge') }}</span>
                <h1 class="contact-title">{{ __('site.contact.hero_title') }}</h1>
                <p class="contact-subtitle">{{ __('site.contact.hero_subtitle') }}</p>
            </div>
        </div>
    </section>

    <section class="contact-request">
        <div class="container">
            <form
                class="contact-request-card"
                id="contactQuickForm"
                action="#"
                method="get"
                data-whatsapp-number="{{ $whatsAppNumber }}"
                data-message-prefix="{{ __('site.contact.form.message_prefix') }}"
                data-label-name="{{ __('site.contact.form.name_label') }}"
                data-label-whatsapp="{{ __('site.contact.form.whatsapp_label') }}"
                data-label-device="{{ __('site.contact.form.device_label') }}"
                data-label-model="{{ __('site.contact.form.model_label') }}"
                data-label-issue="{{ __('site.contact.form.issue_label') }}"
            >
                <div class="contact-step is-active">
                    <div class="contact-step-header">
                        <span class="contact-step-index">1</span>
                        <span class="contact-step-title">{{ __('site.contact.form_step_contact') }}</span>
                        <span class="contact-step-toggle"><i class="bi bi-chevron-down"></i></span>
                    </div>
                    <div class="contact-step-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="contact-input">
                                    <span class="contact-input-icon"><i class="bi bi-person"></i></span>
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="name"
                                        placeholder="{{ __('site.contact.name_placeholder') }}"
                                        aria-label="{{ __('site.contact.name_placeholder') }}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-input">
                                    <span class="contact-input-icon"><i class="bi bi-whatsapp"></i></span>
                                    <input
                                        class="form-control"
                                        type="tel"
                                        name="whatsapp"
                                        placeholder="{{ __('site.contact.whatsapp_placeholder') }}"
                                        aria-label="{{ __('site.contact.whatsapp_placeholder') }}"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contact-step is-active">
                    <div class="contact-step-header">
                        <span class="contact-step-index">2</span>
                        <span class="contact-step-title">{{ __('site.contact.form_step_device') }}</span>
                        <span class="contact-step-toggle"><i class="bi bi-chevron-down"></i></span>
                    </div>
                    <div class="contact-step-body">
                        <div class="device-grid">
                            <label class="device-option">
                                <input type="radio" name="device" value="iphone" checked />
                                <span class="device-card">
                                    <span class="device-icon"><i class="bi bi-phone"></i></span>
                                    <span class="device-label">{{ __('site.contact.device_iphone') }}</span>
                                </span>
                            </label>
                            <label class="device-option">
                                <input type="radio" name="device" value="android" />
                                <span class="device-card">
                                    <span class="device-icon"><i class="bi bi-android2"></i></span>
                                    <span class="device-label">{{ __('site.contact.device_android') }}</span>
                                </span>
                            </label>
                            <label class="device-option">
                                <input type="radio" name="device" value="macbook" />
                                <span class="device-card">
                                    <span class="device-icon"><i class="bi bi-laptop"></i></span>
                                    <span class="device-label">{{ __('site.contact.device_macbook') }}</span>
                                </span>
                            </label>
                            <label class="device-option">
                                <input type="radio" name="device" value="laptop" />
                                <span class="device-card">
                                    <span class="device-icon"><i class="bi bi-laptop-fill"></i></span>
                                    <span class="device-label">{{ __('site.contact.device_laptop') }}</span>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="contact-step is-active">
                    <div class="contact-step-header">
                        <span class="contact-step-index">3</span>
                        <span class="contact-step-title">{{ __('site.contact.form_step_issue') }}</span>
                        <span class="contact-step-toggle"><i class="bi bi-chevron-down"></i></span>
                    </div>
                    <div class="contact-step-body">
                        <div class="contact-input contact-input--full">
                            <span class="contact-input-icon"><i class="bi bi-cpu"></i></span>
                            <input
                                class="form-control"
                                type="text"
                                name="model"
                                placeholder="{{ __('site.contact.model_placeholder') }}"
                                aria-label="{{ __('site.contact.model_placeholder') }}"
                            />
                        </div>
                        <div class="contact-textarea">
                            <textarea
                                class="form-control"
                                rows="4"
                                name="issue"
                                placeholder="{{ __('site.contact.issue_placeholder') }}"
                                aria-label="{{ __('site.contact.issue_placeholder') }}"
                            ></textarea>
                        </div>
                    </div>
                </div>

                <div class="contact-request-actions">
                    <button class="contact-submit" type="submit">
                        {{ __('site.contact.cta_submit') }}
                        <i class="bi bi-arrow-right"></i>
                    </button>
                    <p class="contact-note">{!! __('site.contact.cta_note') !!}</p>
                </div>
            </form>
        </div>
    </section>

    <section class="contact-location">
        <div class="container">
            <div class="location-header">
                <div class="location-heading">
                    <span class="contact-pill contact-pill--soft">{{ __('site.contact.location_badge') }}</span>
                    <h2 class="section-title">{{ __('site.contact.location_title') }}</h2>
                    <p class="section-desc">{{ __('site.contact.location_desc') }}</p>
                </div>
                <span class="location-count">{{ __('site.contact.location_count') }}</span>
            </div>

            <div class="row g-4 align-items-stretch">
                <div class="col-lg-5">
                    <div class="location-list">
                        <article class="location-card is-active" data-location-index="0" data-hours-default="09:00-21:00" data-hours-friday="closed" data-hours-sunday="09:00-18:00" role="button" tabindex="0" aria-pressed="true">
                            <div class="location-card-top">
                                <span class="location-icon"><i class="bi bi-geo-alt"></i></span>
                                <div class="location-card-heading">
                                    <span class="location-label">{{ __('site.contact.locations.head_label') }}</span>
                                    <h3 class="location-card-title">{{ __('site.contact.locations.head_title') }}</h3>
                                </div>
                                <span class="location-status is-open" data-status-open="{{ __('site.contact.status_open') }}" data-status-closed="{{ __('site.contact.status_closed') }}" data-status-holiday="{{ __('site.contact.status_holiday') }}">{{ __('site.contact.locations.head_status') }}</span>
                            </div>
                            <div class="location-card-body">
                                <span class="location-subtitle">{{ __('site.contact.location_address_label') }}</span>
                                <p class="location-address">{{ __('site.contact.locations.head_address') }}</p>
                            </div>
                            <div class="location-card-footer">
                                <span class="location-subtitle">{{ __('site.contact.location_hours_label') }}</span>
                                <span class="location-hours">{{ __('site.contact.locations.head_hours') }}</span>
                            </div>
                        </article>

                        <article class="location-card" data-location-index="1" data-hours-default="09:00-21:00" data-hours-friday="closed" role="button" tabindex="0" aria-pressed="false">
                            <div class="location-card-top">
                                <span class="location-icon"><i class="bi bi-shop"></i></span>
                                <div class="location-card-heading">
                                    <span class="location-label">{{ __('site.contact.locations.branch_label') }}</span>
                                    <h3 class="location-card-title">{{ __('site.contact.locations.branch_title') }}</h3>
                                </div>
                                <span class="location-status is-open" data-status-open="{{ __('site.contact.status_open') }}" data-status-closed="{{ __('site.contact.status_closed') }}" data-status-holiday="{{ __('site.contact.status_holiday') }}">{{ __('site.contact.locations.branch_status') }}</span>
                            </div>
                            <div class="location-card-body">
                                <span class="location-subtitle">{{ __('site.contact.location_address_label') }}</span>
                                <p class="location-address">{{ __('site.contact.locations.branch_address') }}</p>
                            </div>
                            <div class="location-card-footer">
                                <span class="location-subtitle">{{ __('site.contact.location_hours_label') }}</span>
                                <span class="location-hours">{{ __('site.contact.locations.branch_hours') }}</span>
                            </div>
                        </article>

                        <article class="location-card" data-location-index="2" data-hours-default="10:00-22:00" role="button" tabindex="0" aria-pressed="false">
                            <div class="location-card-top">
                                <span class="location-icon"><i class="bi bi-geo"></i></span>
                                <div class="location-card-heading">
                                    <span class="location-label">{{ __('site.contact.locations.other_label') }}</span>
                                    <h3 class="location-card-title">{{ __('site.contact.locations.other_title') }}</h3>
                                </div>
                                <span class="location-status is-closed" data-status-open="{{ __('site.contact.status_open') }}" data-status-closed="{{ __('site.contact.status_closed') }}" data-status-holiday="{{ __('site.contact.status_holiday') }}">{{ __('site.contact.locations.other_status') }}</span>
                            </div>
                            <div class="location-card-body">
                                <span class="location-subtitle">{{ __('site.contact.location_address_label') }}</span>
                                <p class="location-address">{{ __('site.contact.locations.other_address') }}</p>
                            </div>
                            <div class="location-card-footer">
                                <span class="location-subtitle">{{ __('site.contact.location_hours_label') }}</span>
                                <span class="location-hours">{{ __('site.contact.locations.other_hours') }}</span>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="location-map">
                        <div class="location-map-canvas">
                            <div id="google-map" style="width: 100%; height: 100%; border-radius: 28px;"></div>
                        </div>
                        <!-- Controls removed as Google Maps has its own -->
                        <div class="location-map-footer">
                            <span class="map-footer-icon"><i class="bi bi-geo-alt-fill"></i></span>
                            <div class="map-footer-text">
                                <span class="map-footer-title">{{ __('site.contact.map_title') }}</span>
                                <span class="map-footer-desc">{{ __('site.contact.map_desc') }}</span>
                            </div>
                            <a class="map-footer-link" href="{{ $mapLink }}" target="_blank" rel="noopener">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('partials.footer', ['hideContactSection' => true])

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/app.js"></script>

</body>
<script>
    function initMap() {
        // Center approximate to show all 3 points
        const center = { lat: -8.740, lng: 115.180 };
        
        const mapOptions = {
            zoom: 12,
            center: center,
            disableDefaultUI: true,
            zoomControl: true,
            zoomControlOptions: {
                position: google.maps.ControlPosition.TOP_RIGHT
            },
            styles: [
                {
                    "elementType": "geometry",
                    "stylers": [{ "color": "#f5f5f5" }]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [{ "visibility": "off" }]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [{ "color": "#616161" }]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [{ "color": "#f5f5f5" }]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [{ "color": "#bdbdbd" }]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{ "color": "#eeeeee" }]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [{ "color": "#757575" }]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [{ "color": "#ffffff" }]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.text.fill",
                    "stylers": [{ "color": "#757575" }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [{ "color": "#dadada" }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.text.fill",
                    "stylers": [{ "color": "#616161" }]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [{ "color": "#9e9e9e" }]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [{ "color": "#e5e5e5" }]
                },
                {
                    "featureType": "transit.station",
                    "elementType": "geometry",
                    "stylers": [{ "color": "#eeeeee" }]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{ "color": "#c9c9c9" }]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [{ "color": "#9e9e9e" }]
                }
            ]
        };

        const map = new google.maps.Map(document.getElementById("google-map"), mapOptions);

        // Store Locations
        const locations = [
            { 
                title: "Fixmi Bali", 
                lat: -8.759229543631317, 
                lng: 115.17628628769123,
                address: "Link. Kubu Alit Kedonganan, Jl. Raya Uluwatu, Kedonganan, Kec. Kuta, Kabupaten Badung, Bali 80361",
                mapsLink: "https://maps.app.goo.gl/wjy3m1pNDJyoVaHN9",
                rating: "4.9",
                reviews: "1,240"
            },
            { 
                title: "Fixmi Bali Phone Taman Griya", 
                lat: -8.795211286730995, 
                lng: 115.18692765700816,
                address: "Taman Griya, Jl. Nuansa Utama No.33, Jimbaran, South Kuta, Badung Regency, Bali 80361",
                mapsLink: "https://maps.app.goo.gl/YdQSksMzd4eWEb4x5",
                rating: "4.8",
                reviews: "856"
            },
            { 
                title: "Mobicare Service Center", 
                lat: -8.67049674423244, 
                lng: 115.209545433761,
                address: "Cellular World Arena, Jl. Teuku Umar No.57, Dauh Puri Kauh, Kec. Denpasar Bar., Kota Denpasar, Bali 80113",
                mapsLink: "https://maps.app.goo.gl/TSwjfngt6ZRfzgbN7",
                rating: "5.0",
                reviews: "432"
            }
        ];

        const infoWindow = new google.maps.InfoWindow();
        const markers = [];
        const markerContents = [];
        const locationCards = document.querySelectorAll("[data-location-index]");

        const alignInfoWindowClose = () => {
            const container = document.querySelector("#google-map .gm-style-iw-c");
            if (!container) {
                return;
            }
            const title = container.querySelector("h5");
            const closeButton = container.querySelector("button.gm-ui-hover-effect");
            if (!title || !closeButton) {
                return;
            }
            const containerRect = container.getBoundingClientRect();
            const titleRect = title.getBoundingClientRect();
            const closeRect = closeButton.getBoundingClientRect();
            if (!containerRect.height || !titleRect.height || !closeRect.height) {
                return;
            }
            const targetTop = titleRect.top - containerRect.top + (titleRect.height - closeRect.height) / 2;
            closeButton.style.top = `${Math.max(0, Math.round(targetTop))}px`;
        };

        google.maps.event.addListener(infoWindow, "domready", () => {
            requestAnimationFrame(alignInfoWindowClose);
        });

        const getBaliTime = () => {
            const formatter = new Intl.DateTimeFormat("en-US", {
                timeZone: "Asia/Makassar",
                hour12: false,
                weekday: "short",
                hour: "2-digit",
                minute: "2-digit"
            });
            const parts = formatter.formatToParts(new Date());
            const values = {};
            parts.forEach((part) => {
                if (part.type !== "literal") {
                    values[part.type] = part.value;
                }
            });
            const dayIndexMap = { Sun: 0, Mon: 1, Tue: 2, Wed: 3, Thu: 4, Fri: 5, Sat: 6 };
            return {
                dayIndex: dayIndexMap[values.weekday] ?? new Date().getDay(),
                hour: Number(values.hour),
                minute: Number(values.minute)
            };
        };

        const parseHours = (rawValue) => {
            if (!rawValue) {
                return null;
            }
            const value = rawValue.trim().toLowerCase();
            if (value === "closed" || value === "libur") {
                return { closed: true };
            }
            const match = value.match(/^(\d{1,2}):(\d{2})\s*-\s*(\d{1,2}):(\d{2})$/);
            if (!match) {
                return null;
            }
            return {
                open: { hour: Number(match[1]), minute: Number(match[2]) },
                close: { hour: Number(match[3]), minute: Number(match[4]) }
            };
        };

        const updateLocationStatuses = () => {
            if (!locationCards.length) {
                return;
            }
            const now = getBaliTime();
            const dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            const dayKey = dayNames[now.dayIndex];
            const nowMinutes = now.hour * 60 + now.minute;

            locationCards.forEach((card) => {
                const statusEl = card.querySelector(".location-status");
                if (!statusEl) {
                    return;
                }

                const labels = {
                    open: statusEl.getAttribute("data-status-open") || statusEl.textContent,
                    closed: statusEl.getAttribute("data-status-closed") || statusEl.textContent,
                    holiday: statusEl.getAttribute("data-status-holiday") || statusEl.textContent
                };

                const scheduleValue = card.dataset[`hours${dayKey}`] || card.dataset.hoursDefault;
                if (!scheduleValue) {
                    return;
                }

                const schedule = parseHours(scheduleValue);
                if (!schedule) {
                    return;
                }

                let statusType = "closed";
                if (schedule.closed) {
                    statusType = "holiday";
                } else {
                    const openMinutes = schedule.open.hour * 60 + schedule.open.minute;
                    const closeMinutes = schedule.close.hour * 60 + schedule.close.minute;
                    if (nowMinutes >= openMinutes && nowMinutes < closeMinutes) {
                        statusType = "open";
                    }
                }

                statusEl.textContent = labels[statusType];
                statusEl.classList.toggle("is-open", statusType === "open");
                statusEl.classList.toggle("is-closed", statusType === "closed");
                statusEl.classList.toggle("is-holiday", statusType === "holiday");
            });
        };

        const updateFooter = (loc) => {
            const footerLink = document.querySelector(".map-footer-link");
            const footerTitle = document.querySelector(".map-footer-title");
            if (footerLink) {
                footerLink.href = loc.mapsLink;
            }
            if (footerTitle) {
                footerTitle.innerText = `Direction to: ${loc.title}`;
            }
        };

        const setActiveCard = (activeIndex) => {
            if (!locationCards.length) {
                return;
            }
            locationCards.forEach((card) => {
                const cardIndex = Number(card.getAttribute("data-location-index"));
                const isActive = cardIndex === activeIndex;
                card.classList.toggle("is-active", isActive);
                card.setAttribute("aria-pressed", isActive ? "true" : "false");
            });
        };

        const openLocation = (index) => {
            const loc = locations[index];
            const marker = markers[index];
            const contentString = markerContents[index];
            if (!loc || !marker || !contentString) {
                return;
            }
            infoWindow.setContent(contentString);
            infoWindow.open(map, marker);
            updateFooter(loc);
            setActiveCard(index);
            map.panTo(marker.getPosition());
        };

        locations.forEach((loc, index) => {
            const marker = new google.maps.Marker({
                position: { lat: loc.lat, lng: loc.lng },
                map: map,
                title: loc.title,
                animation: google.maps.Animation.DROP
            });

            // Content for InfoWindow (Google Maps Style)
            const contentString = `
                <div style="padding: 4px; min-width: 200px; font-family: 'Roboto', sans-serif;">
                    <h5 style="margin: 0 0 6px; font-size: 16px; font-weight: 600; color: #202124;">${loc.title}</h5>
                    <div style="display: flex; align-items: center; margin-bottom: 8px;">
                        <span style="color: #E7711B; font-size: 14px; font-weight: 500; margin-right: 4px;">${loc.rating}</span>
                        <span style="color: #fbbc04; font-size: 14px; letter-spacing: 1px;">★★★★★</span>
                        <span style="color: #70757a; font-size: 13px; margin-left: 6px;">(${loc.reviews})</span>
                    </div>
                    <p style="margin: 0 0 12px; font-size: 13px; color: #70757a;">${loc.address}</p>
                    <a href="${loc.mapsLink}" target="_blank" style="display: inline-block; text-decoration: none; color: #1a73e8; font-size: 13px; font-weight: 500;">
                        View on Google Maps
                    </a>
                </div>
            `;

            markers[index] = marker;
            markerContents[index] = contentString;

            marker.addListener("click", () => {
                openLocation(index);
            });

            // Open first marker info by default
            if (index === 0) {
                // Optional: Auto open first on load
                // openLocation(index);
            }
        });

        if (locationCards.length) {
            locationCards.forEach((card) => {
                const cardIndex = Number(card.getAttribute("data-location-index"));
                if (Number.isNaN(cardIndex)) {
                    return;
                }

                const activateCard = () => openLocation(cardIndex);
                card.addEventListener("click", activateCard);
                card.addEventListener("keydown", (event) => {
                    if (event.key === "Enter" || event.key === " ") {
                        event.preventDefault();
                        activateCard();
                    }
                });
            });
        }

        updateLocationStatuses();
        setInterval(updateLocationStatuses, 60000);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&v=weekly&loading=async" async defer></script>
</html>
