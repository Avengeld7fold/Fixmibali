<!DOCTYPE html>

<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<title>{{ __('site.pricelist.page_title_ipad') }}</title>
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

@include('partials.pricelist-cards', ['activeService' => 'ipad'])

<div class="service-pricelist-accordion" id="servicePricelistAccordion">
<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceLcdReplacementIpad" aria-expanded="false" aria-controls="priceLcdReplacementIpad">
<span class="service-price-icon">
<i class="bi bi-tablet"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.ipad.lcd') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="priceLcdReplacementIpad">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['ipad-lcd'] ?? null])
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceTouchscreenIpad" aria-expanded="false" aria-controls="priceTouchscreenIpad">
<span class="service-price-icon">
<i class="bi bi-hand-index-thumb"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.ipad.touchscreen') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="priceTouchscreenIpad">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['ipad-touchscreen'] ?? null])
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceBatteryIpad" aria-expanded="false" aria-controls="priceBatteryIpad">
<span class="service-price-icon">
<i class="bi bi-battery-full"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.ipad.battery') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="priceBatteryIpad">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['ipad-battery'] ?? null])
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceFlexChargerIpad" aria-expanded="false" aria-controls="priceFlexChargerIpad">
<span class="service-price-icon">
<i class="bi bi-plug"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.ipad.charger') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="priceFlexChargerIpad">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['ipad-flex-charger'] ?? null])
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceFlexOnOffIpad" aria-expanded="false" aria-controls="priceFlexOnOffIpad">
<span class="service-price-icon">
<i class="bi bi-toggle2-on"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.ipad.onoff') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" data-bs-parent="#servicePricelistAccordion" id="priceFlexOnOffIpad">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['ipad-flex-onoff'] ?? null])
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
