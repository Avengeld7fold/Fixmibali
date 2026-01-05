<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<title>{{ $title ?? 'Placeholder' }} - FIXMI Bali</title>
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
<style>
.service h5 { 
  text-align: right; 
}

.service p { 
  text-align: right; 
  display: block; 
  margin: 4px 0; 
}
</style></head>
<body>
@include('partials.nav')

<section class="py-5 placeholder-section">
<div class="container">
<div class="text-center mb-4">
<h2 class="section-title">{{ $title ?? 'Placeholder' }}</h2>
<p class="mb-0">{{ $description ?? 'Konten halaman ini sedang disiapkan.' }}</p>
</div>
<div class="row g-4">
<div class="col-md-4">
<div class="card h-100 border-0 shadow-sm">
<div class="card-body">
<h5 class="card-title mb-2">Coming Soon</h5>
<p class="card-text mb-0">Konten akan ditampilkan setelah data lengkap.</p>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card h-100 border-0 shadow-sm">
<div class="card-body">
<h5 class="card-title mb-2">Sedang Disiapkan</h5>
<p class="card-text mb-0">Halaman ini masih dalam tahap penyesuaian.</p>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card h-100 border-0 shadow-sm">
<div class="card-body">
<h5 class="card-title mb-2">Update Selanjutnya</h5>
<p class="card-text mb-0">Kami akan mengisi detail setelah migrasi selesai.</p>
</div>
</div>
</div>
</div>
<div class="text-center mt-4">
<a class="btn btn-dark" href="{{ route('home') }}">Kembali ke Home</a>
</div>
</div>
</section>

<!-- WhatsApp floating button (optional) -->
<a class="whatsapp-float" href="https://wa.me/62XXXXXXXXXX" rel="noopener" target="_blank">
  <img src="/assets/img/whatsapp.svg" alt="WhatsApp" class="whatsapp-float-icon" />
</a>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="/assets/js/app.js"></script>
</body>
</html>
