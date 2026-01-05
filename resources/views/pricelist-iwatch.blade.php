<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<title>Pricelist iWatch - FIXMI Bali</title>
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

@include('partials.pricelist-cards', ['activeService' => 'iwatch'])

<div class="service-pricelist-accordion">
<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceLcdIwatch" aria-expanded="false" aria-controls="priceLcdIwatch">
<span class="service-price-icon">
<i class="bi bi-smartwatch"></i>
</span>
<span class="service-price-title">Price LCD iWatch</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceLcdIwatch">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['iwatch-lcd'] ?? null])
</div>
</div>
</div>

<div class="service-price-item">
<button class="service-price-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#priceBatteryIwatch" aria-expanded="false" aria-controls="priceBatteryIwatch">
<span class="service-price-icon">
<i class="bi bi-battery-full"></i>
</span>
<span class="service-price-title">Price Battery iWatch</span>
<span class="service-price-toggle">+</span>
</button>
<div class="collapse service-price-body" id="priceBatteryIwatch">
<div class="service-price-content">
@include('partials.pricelist-table', ['table' => $priceTables['iwatch-battery'] ?? null])
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
