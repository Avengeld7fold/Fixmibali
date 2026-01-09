<!DOCTYPE html>

<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<title>{{ __('site.pricelist.page_title_macbook') }}</title>
<link rel="icon" type="image/png" href="/assets/img/favinco.png"/>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
<!-- Google Fonts + Icons for hero -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&amp;family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&amp;family=Space+Grotesk:wght@500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"/>
<!-- Black Ops One font -->
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&amp;display=swap" rel="stylesheet"/>
<!-- Custom CSS -->
<link href="/assets/css/style.css" rel="stylesheet"/>
</head>
<body class="fixmi-home-page fixmi-pricelist-page fixmi-whatsapp-mobile">
@include('partials.nav')

<section class="service-listing-section">
<div class="container">
<div class="service-listing-header text-center">
<h2 class="service-listing-title">{{ __('site.pricelist.section_title') }}</h2>
<p class="service-listing-subtitle">
{{ __('site.pricelist.section_subtitle') }}
</p>
@include('partials.pricelist-warranty-pill')
</div>

@include('partials.pricelist-cards', ['activeService' => 'macbook'])

<div class="service-pricelist-accordion" id="servicePricelistAccordion">
<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceLcdMacbook" aria-expanded="false" aria-controls="priceLcdMacbook">
<span class="service-price-icon">
<i class="bi bi-laptop"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.macbook.lcd') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="priceLcdMacbook">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['macbook-lcd'] ?? null])
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceBatteryMacbook" aria-expanded="false" aria-controls="priceBatteryMacbook">
<span class="service-price-icon">
<i class="bi bi-battery-full"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.macbook.battery') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="priceBatteryMacbook">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['macbook-battery'] ?? null])
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceKeyboardMacbook" aria-expanded="false" aria-controls="priceKeyboardMacbook">
<span class="service-price-icon">
<i class="bi bi-keyboard"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.macbook.keyboard') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="priceKeyboardMacbook">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['macbook-keyboard'] ?? null])
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceSpeakerMacbook" aria-expanded="false" aria-controls="priceSpeakerMacbook">
<span class="service-price-icon">
<i class="bi bi-volume-up"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.macbook.speaker') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="priceSpeakerMacbook">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['macbook-speaker'] ?? null])
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceTouchpadMacbook" aria-expanded="false" aria-controls="priceTouchpadMacbook">
<span class="service-price-icon">
<i class="bi bi-mouse"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.macbook.touchpad') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="priceTouchpadMacbook">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['macbook-touchpad'] ?? null])
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceStorageMacbook" aria-expanded="false" aria-controls="priceStorageMacbook">
<span class="service-price-icon">
<i class="bi bi-hdd"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.macbook.storage') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="priceStorageMacbook">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['macbook-storage'] ?? null])
</div>
</div>
</div>
</div>
</div>
</section>

@include('partials.footer')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="/assets/js/app.js"></script>
</body>
</html>
