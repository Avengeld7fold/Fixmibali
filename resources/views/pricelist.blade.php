<!DOCTYPE html>

<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<title>{{ __('site.pricelist.page_title') }}</title>
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

@include('partials.pricelist-cards', ['activeService' => 'iphone'])

<div class="service-pricelist-accordion">
<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceLcd" aria-expanded="false" aria-controls="priceLcd">
<span class="service-price-icon">
<i class="bi bi-phone"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.iphone.lcd') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceLcd">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['lcd'] ?? null])
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceBattery" aria-expanded="false" aria-controls="priceBattery">
<span class="service-price-icon">
<i class="bi bi-battery-full"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.iphone.battery') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceBattery">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['battery'] ?? null])
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceCharger" aria-expanded="false" aria-controls="priceCharger">
<span class="service-price-icon">
<i class="bi bi-plug"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.iphone.charger') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceCharger">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['charger'] ?? null])
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceCamera" aria-expanded="false" aria-controls="priceCamera">
<span class="service-price-icon">
<i class="bi bi-camera"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.iphone.camera') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceCamera">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['camera'] ?? null])
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceFaceId" aria-expanded="false" aria-controls="priceFaceId">
<span class="service-price-icon">
<i class="bi bi-person-bounding-box"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.iphone.face_id') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceFaceId">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['face-id'] ?? null])
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceHousing" aria-expanded="false" aria-controls="priceHousing">
<span class="service-price-icon">
<i class="bi bi-phone-fill"></i>
</span>
<span class="service-price-title">{{ __('site.pricelist.iphone.housing') }}</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceHousing">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['housing'] ?? null])
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
