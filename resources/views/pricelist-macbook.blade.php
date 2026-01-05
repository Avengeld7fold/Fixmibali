<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<title>Pricelist Macbook - FIXMI Bali</title>
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

@include('partials.pricelist-cards', ['activeService' => 'macbook'])

<div class="service-pricelist-accordion">
<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceLcdMacbook" aria-expanded="false" aria-controls="priceLcdMacbook">
<span class="service-price-icon">
<i class="bi bi-laptop"></i>
</span>
<span class="service-price-title">Price LCD Macbook</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceLcdMacbook">
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
<span class="service-price-title">Price Battery Macbook</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceBatteryMacbook">
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
<span class="service-price-title">Price Keyboard Macbook</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceKeyboardMacbook">
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
<span class="service-price-title">Price Speaker Macbook</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceSpeakerMacbook">
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
<span class="service-price-title">Price Touch Pad Macbook</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceTouchpadMacbook">
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
<span class="service-price-title">Price SSD / Penyimpanan Storage Macbook</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceStorageMacbook">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['macbook-storage'] ?? null])
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
