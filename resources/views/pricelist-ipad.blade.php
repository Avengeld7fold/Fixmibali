<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<title>Pricelist iPad - FIXMI Bali</title>
<link rel="icon" type="image/png" href="/assets/img/favinco.png"/>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
<!-- Google Fonts + Icons for hero -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&amp;family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"/>
<!-- Black Ops One font -->
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&amp;display=swap" rel="stylesheet"/>
<!-- Custom CSS -->
<link href="/assets/css/style.css" rel="stylesheet"/>
</head>
<body class="fixmi-pricelist-page">
@include('partials.nav')

<section class="service-listing-section">
<div class="container">
<div class="service-listing-header text-center">
<h2 class="service-listing-title">Layanan Service</h2>
<p class="service-listing-subtitle">
Beberapa layanan yang kami sediakan berdasarkan perangkat,
dan diskon 10% off khusus member di Fixmi Bali.
</p>
<button class="service-listing-pill" type="button">Klik untuk detailnya.</button>
</div>

@include('partials.pricelist-cards', ['activeService' => 'ipad'])

<div class="service-pricelist-accordion">
<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceLcdReplacementIpad" aria-expanded="false" aria-controls="priceLcdReplacementIpad">
<span class="service-price-icon">
<i class="bi bi-tablet"></i>
</span>
<span class="service-price-title">Price LCD Replacement iPad</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceLcdReplacementIpad">
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
<span class="service-price-title">Price Touchscreen iPad</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceTouchscreenIpad">
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
<span class="service-price-title">Price Battery iPad</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceBatteryIpad">
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
<span class="service-price-title">Price Flexibel Charger iPad</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceFlexChargerIpad">
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
<span class="service-price-title">Price Flex On/Off iPad</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceFlexOnOffIpad">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['ipad-flex-onoff'] ?? null])
</div>
</div>
</div>
</div>
</div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="/assets/js/app.js"></script>
</body>
</html>
