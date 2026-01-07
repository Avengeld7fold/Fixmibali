
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<title>FIXMI Bali - Phone Service</title>
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
<style>
.service h5 { 
  text-align: right; 
}

.service p { 
  text-align: right; 
  display: block; 
  margin: 4px 0; 
}

body.fixmi-home-page {
  --admin-bg: #f7f9fb;
  --admin-glow: rgba(242, 106, 33, 0.12);
  --admin-sidebar-bg: #f7f9fb;
  --admin-border: #eef1f6;
  --admin-text: #2f3b52;
  --admin-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
  --home-accent: #f26a21;
  --home-accent-soft: #ffe2c9;
  --home-heading: #2e3440;
  --home-muted: #7c889b;

  background: var(--admin-bg);
  color: var(--admin-text);
  min-height: 100vh;
}

body.fixmi-home-page .hero-section {
  background-color: var(--admin-sidebar-bg);
  background-image: none;
  color: var(--admin-text);
}

body.fixmi-home-page .hero-section::before {
  background-image: none;
  opacity: 0;
}

body.fixmi-home-page .before-after-section,
body.fixmi-home-page .service-banner-section,
body.fixmi-home-page .advantages-section {
  background-color: var(--admin-sidebar-bg);
}

body.fixmi-home-page .contact-section {
  background-color: #ffffff;
  border-top-color: var(--admin-border);
}
</style></head>
<body class="fixmi-home-page">
@php
    $whatsAppNumber = '628873183122';
    $whatsAppText = rawurlencode('Halo Fixmi Bali, saya mau konsultasi service. Device saya: ... Keluhannya: ...');
    $whatsAppLink = "https://wa.me/{$whatsAppNumber}?text={$whatsAppText}";
@endphp
@include('partials.nav')
<!-- Hero Section -->
<!-- HERO SECTION (IMAGE BACKGROUND + ICON CARDS + SLIDER) -->
<section class="hero-section" id="home">
<div class="hero-overlay">
<div class="container">
<div class="row align-items-center gy-4">
<!-- Left copy -->
<div class="col-lg-6 hero-left">
<h1 class="hero-title-main mb-1 hero-reveal delay-1"><span class="hero-title-word">FIXMI</span><span class="hero-title-word">BALI</span></h1>
<h2 class="hero-title-sub mb-3 hero-reveal delay-2">Phone Service</h2>
<p class="hero-text mb-3 hero-reveal delay-3">
            Service gadget cepat, transparan, dan bergaransi. Kami handle Android, iPhone, Macbook, dan laptop.
          </p>
<ul class="list-unstyled d-grid gap-2 mb-4 hero-benefits hero-reveal delay-4">
<li class="d-flex align-items-start gap-2"><i class="bi bi-check-circle-fill text-success"></i><span>Free biaya pengecekan + estimasi sebelum pengerjaan</span></li>
<li class="d-flex align-items-start gap-2"><i class="bi bi-check-circle-fill text-success"></i><span>Teknisi berpengalaman untuk hardware &amp; software</span></li>
<li class="d-flex align-items-start gap-2"><i class="bi bi-check-circle-fill text-success"></i><span>Sparepart ready stok &amp; opsi kualitas sesuai kebutuhan</span></li>
</ul>
<h6 class="hero-hardware-title mb-3 hero-reveal delay-5">Hardware Repair Expert</h6>
<div class="row g-3 hero-services mb-4 hero-reveal delay-6">
<div class="col-sm-6">
<div class="hero-service">
<div class="hero-service-icon hero-service-icon-green">
<i class="bi bi-cpu"></i>
</div>
<div class="hero-service-label">EMMC/UFS Repair</div>
</div>
</div>
<div class="col-sm-6">
<div class="hero-service">
<div class="hero-service-icon hero-service-icon-blue">
<i class="bi bi-droplet-half"></i>
</div>
<div class="hero-service-label">Water Damage Phone</div>
</div>
</div>
<div class="col-sm-6">
<div class="hero-service">
<div class="hero-service-icon hero-service-icon-orange">
<i class="bi bi-lightning-charge-fill"></i>
</div>
<div class="hero-service-label">Charging Trouble</div>
</div>
</div>
<div class="col-sm-6">
<div class="hero-service">
<div class="hero-service-icon hero-service-icon-cyan">
<i class="bi bi-phone"></i>
</div>
<div class="hero-service-label">Change LCD/Battery</div>
</div>
</div>
</div>
<div class="d-flex flex-wrap gap-2 hero-cta hero-reveal delay-7">
<a class="btn btn-dark hero-btn" href="{{ route('pricelist') }}">Cek Pricelist</a>
<a class="btn btn-success hero-btn" id="heroWhatsappLink" href="{{ $whatsAppLink }}" target="_blank" rel="noopener">Chat WhatsApp</a>
<button class="btn btn-outline-dark hero-btn" id="konsultasiGratisBtn" type="button">Konsultasi Gratis</button>
</div>
</div>
<!-- Right slider -->
<div class="col-lg-6 hero-right">
<div class="carousel slide hero-photo-frame hero-reveal delay-4" data-bs-interval="4500" data-bs-ride="carousel" id="heroCarousel">
<div class="carousel-inner">
<div class="carousel-item active">
<img alt="Fixmi Technician 1" class="d-block w-100 hero-photo-img" src="/assets/img/hero-1.jpeg" decoding="async" fetchpriority="high"/>
</div>
<div class="carousel-item">
<img alt="Fixmi Technician 2" class="d-block w-100 hero-photo-img" src="/assets/img/hero-2.jpeg" loading="lazy" decoding="async"/>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="py-5 quick-services-section" id="estimasi">
<div class="container">
<div class="row align-items-end g-3 mb-4">
<div class="col-lg-8">
<h2 class="section-title mb-2">Service populer &amp; estimasi cepat</h2>
<p class="mb-0 text-muted">Pilih kategori untuk lihat detail layanan &amp; harga transparan di halaman pricelist.</p>
</div>
<div class="col-lg-4 text-lg-end">
<a class="btn btn-dark" href="{{ route('pricelist') }}">Lihat semua di Pricelist</a>
</div>
</div>
<div class="row g-3">
<div class="col-6 col-lg-3">
<a class="quick-service-card" href="{{ route('pricelist') }}">
<div class="quick-service-icon"><i class="bi bi-phone"></i></div>
<div class="quick-service-title">LCD / Touchscreen</div>
<div class="quick-service-subtitle">Penggantian layar &amp; touch</div>
</a>
</div>
<div class="col-6 col-lg-3">
<a class="quick-service-card" href="{{ route('pricelist') }}">
<div class="quick-service-icon"><i class="bi bi-battery-charging"></i></div>
<div class="quick-service-title">Battery</div>
<div class="quick-service-subtitle">Baterai drop / cepat habis</div>
</a>
</div>
<div class="col-6 col-lg-3">
<a class="quick-service-card" href="{{ route('pricelist') }}">
<div class="quick-service-icon"><i class="bi bi-lightning-charge"></i></div>
<div class="quick-service-title">Charging</div>
<div class="quick-service-subtitle">Port / IC charging</div>
</a>
</div>
<div class="col-6 col-lg-3">
<a class="quick-service-card" href="{{ route('pricelist') }}">
<div class="quick-service-icon"><i class="bi bi-droplet"></i></div>
<div class="quick-service-title">Water Damage</div>
<div class="quick-service-subtitle">Kena air / lembab</div>
</a>
</div>
</div>
</div>
</section>
<!-- Before & After Section -->
<section class="py-5 before-after-section">
<div class="container">
<div class="text-center mb-4">
<h2 class="section-title">Before &amp; After</h2>
</div>
<div class="row align-items-center g-4">
<div class="col-lg-4">
<div class="ba-list">
<div class="ba-item ba-link" data-extra-target="backglass"><div class="service service-body"><h5>Body Repair</h5><p>Body HP rusak atau penyok? Biar kami bantu rapikan, cepat dan rapi seperti baru!</p></div>
</div>
<div class="ba-item ba-link" data-target-index="6">
<div class="service"><h5>Water Damage Repair</h5><p>HP kamu kena air? Tenang, kami bantu atasi kerusakan dengan prosedur yang aman. Biar HP kamu kembali normal seperti semula!</p></div></div>
<div class="ba-item ba-link" data-target-index="3">
<div class="service"><h5>Battery Replacement</h5><p>Baterai HP cepat habis? Saatnya ganti baterai baru di tempat kami, cepat, aman, dan bergaransi!</p></div></div>
</div>
</div>
<div class="col-lg-4 text-center">
<div class="phone-frame">
<div class="phone-screen">
<img alt="Fixmi iPhone 13" class="phone-sequence-image is-active" data-index="13" src="/assets/img/Iphone/13.webp"/>
<img alt="Fixmi iPhone 12" class="phone-sequence-image" data-index="12" src="/assets/img/Iphone/12.webp"/>
<img alt="Fixmi iPhone 11" class="phone-sequence-image" data-index="11" src="/assets/img/Iphone/11.webp"/>
<img alt="Fixmi iPhone 10" class="phone-sequence-image" data-index="10" src="/assets/img/Iphone/10.webp"/>
<img alt="Fixmi iPhone 9" class="phone-sequence-image" data-index="9" src="/assets/img/Iphone/9.webp"/>
<img alt="Fixmi iPhone 8" class="phone-sequence-image" data-index="8" src="/assets/img/Iphone/8.webp"/>
<img alt="Fixmi iPhone 7" class="phone-sequence-image" data-index="7" src="/assets/img/Iphone/7.webp"/>
<img alt="Fixmi iPhone 6" class="phone-sequence-image" data-index="6" src="/assets/img/Iphone/6.webp"/>
<img alt="Fixmi iPhone 5" class="phone-sequence-image" data-index="5" src="/assets/img/Iphone/5.webp"/>
<img alt="Fixmi iPhone 4" class="phone-sequence-image" data-index="4" src="/assets/img/Iphone/4.webp"/>
<img alt="Fixmi iPhone 3" class="phone-sequence-image" data-index="3" src="/assets/img/Iphone/3.webp"/>
<img alt="Fixmi iPhone 2" class="phone-sequence-image" data-index="2" src="/assets/img/Iphone/2.webp"/>
<img alt="Fixmi iPhone 1" class="phone-sequence-image" data-index="1" src="/assets/img/Iphone/1.webp"/>
<img alt="Fixmi Backglass Broken" class="phone-extra-image" data-extra-id="backglass" src="/assets/img/Iphone/backglass-broken.webp"/>
<img alt="Fixmi Recovery Mode" class="phone-extra-image" data-extra-id="recovery" src="/assets/img/Iphone/recovery-mode.webp"/>
</div>
</div>
<div class="scroll-hint">
<span class="scroll-hint-text">scroll me</span>
<span class="scroll-hint-icon">
<i class="bi bi-mouse"></i>
<i class="bi bi-chevron-down"></i>
</span>
</div>
</div>
<div class="col-lg-4">
<div class="ba-list">
<div class="ba-item ba-link" data-target-pair="7,9">
<h5>Speaker Repair</h5>
<p>Suara HP hilang atau pecah? Kami siap bantu perbaiki agar jernih kembali!</p>
</div>
<div class="ba-item ba-link" data-extra-target="recovery">
<h5>Software Spesialist</h5>
<p>HP kamu bermasalah dengan software? Lupa pola, terkunci akun, lemot, atau butuh flashing ulang? Tenang, kami siap bantu dengan proses yang aman dan cepat!</p>
</div>
<div class="ba-item ba-link" data-target-index="2">
<h5>LCD Screen Replacement</h5>
<p>Layar retak atau blank? Ganti LCD HP kamu di sini, cepat, aman, dan tampilan kembali jernih seperti baru!</p>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="py-5 process-section" id="proses">
<div class="container">
<div class="text-center mb-4">
<h2 class="section-title mb-2">Proses service yang jelas</h2>
<p class="mb-0 text-muted">Biar kamu tenang, semua langkah transparan dari awal sampai selesai.</p>
</div>
<div class="row g-3">
<div class="col-12 col-md-6 col-lg-3">
<div class="process-card">
<div class="process-icon"><i class="bi bi-search"></i></div>
<h5 class="process-title mb-1">Diagnosa</h5>
<p class="process-desc mb-0">Cek kondisi device &amp; jelaskan penyebab masalah.</p>
</div>
</div>
<div class="col-12 col-md-6 col-lg-3">
<div class="process-card">
<div class="process-icon"><i class="bi bi-receipt"></i></div>
<h5 class="process-title mb-1">Estimasi</h5>
<p class="process-desc mb-0">Harga &amp; waktu pengerjaan disampaikan di awal.</p>
</div>
</div>
<div class="col-12 col-md-6 col-lg-3">
<div class="process-card">
<div class="process-icon"><i class="bi bi-check2-circle"></i></div>
<h5 class="process-title mb-1">Approval</h5>
<p class="process-desc mb-0">Pengerjaan hanya setelah kamu setuju.</p>
</div>
</div>
<div class="col-12 col-md-6 col-lg-3">
<div class="process-card">
<div class="process-icon"><i class="bi bi-tools"></i></div>
<h5 class="process-title mb-1">Pengerjaan</h5>
<p class="process-desc mb-0">Teknisi handle sesuai SOP &amp; quality check.</p>
</div>
</div>
</div>
<div class="mt-4 text-center">
<a class="btn btn-success" href="{{ $whatsAppLink }}" target="_blank" rel="noopener">Tanya estimasi via WhatsApp</a>
</div>
</div>
</section>
<!-- Service Banner -->
<section class="py-5 service-banner-section" id="promo">
<div class="container">
<div class="service-banner-card">
  <img src="/assets/img/banner.png" alt="Service Handphone Banner" class="service-banner-image" loading="lazy" decoding="async" />
</div>
</div>
</section>
<!-- Keunggulan Section -->
<section class="py-5 advantages-section" id="about">
<div class="container">
<h3 class="section-title mb-3">Keunggulan Fixmi Bali:</h3>
<p class="mb-3">
          Fixmi Bali Phone adalah pusat layanan perbaikan gadget terlengkap dan terpercaya di Bali. Kami melayani
          service software &amp; hardware untuk Android, iPhone, Macbook dan laptop, termasuk penggantian LCD, baterai, back cover,
          hingga perbaikan kerusakan berat – semua dengan peralatan dan sparepart original yang ready stok dan harga transparan.
        </p>
<p class="mb-3">
          Kami juga rutin memberikan promo menarik, seperti diskon jasa perbaikan, paket bundle accessories,
          dan program loyalty untuk customer setia. Dengan teknisi berpengalaman, ruang tunggu yang nyaman,
          serta standar pengerjaan yang rapi, kami siap membantu kamu mengembalikan performa gadget seperti baru.
        </p>
<ul>
<li>Teknisi profesional &amp; bersertifikat, siap menangani berbagai kerusakan.</li>
<li>Diagnosis cepat &amp; transparan, solusi selalu terupdate.</li>
<li>Jaminan kualitas di setiap pekerjaan, dengan garansi service yang jelas.</li>
<li>Sparepart berkualitas, bergaransi resmi dengan stok yang selalu ready.</li>
</ul>
<p class="mb-0">
          Fixmi Bali bukan hanya tempat service, tapi juga pusat edukasi dan pengembangan teknisi gadget di Bali.
</p>
</div>
</section>
<section class="py-5 testimonials-section" id="testimoni">
<div class="container">
<div class="text-center mb-4">
<h2 class="section-title mb-2">Testimoni pelanggan</h2>
<p class="mb-0 text-muted">Beberapa pengalaman singkat setelah service di Fixmi Bali.</p>
</div>
<div class="row g-3">
<div class="col-12 col-md-6 col-lg-4">
<div class="testimonial-card">
<div class="testimonial-head">
<div class="testimonial-avatar">AR</div>
<div>
<div class="testimonial-name">Ari</div>
<div class="testimonial-meta">iPhone • LCD</div>
</div>
</div>
<p class="testimonial-text mb-0">“Pengerjaan cepat, hasil rapi, dan dijelasin dari awal. Recommended.”</p>
</div>
</div>
<div class="col-12 col-md-6 col-lg-4">
<div class="testimonial-card">
<div class="testimonial-head">
<div class="testimonial-avatar">DN</div>
<div>
<div class="testimonial-name">Dina</div>
<div class="testimonial-meta">Android • Charging</div>
</div>
</div>
<p class="testimonial-text mb-0">“Awalnya cuma mau cek, ternyata bisa langsung beres hari itu juga.”</p>
</div>
</div>
<div class="col-12 col-md-6 col-lg-4">
<div class="testimonial-card">
<div class="testimonial-head">
<div class="testimonial-avatar">RS</div>
<div>
<div class="testimonial-name">Riski</div>
<div class="testimonial-meta">Android • Water Damage</div>
</div>
</div>
<p class="testimonial-text mb-0">“HP kena air, dikasih estimasi jelas, dan aman sampai selesai.”</p>
</div>
</div>
<div class="col-12 col-md-6 col-lg-4">
<div class="testimonial-card">
<div class="testimonial-head">
<div class="testimonial-avatar">MT</div>
<div>
<div class="testimonial-name">Made</div>
<div class="testimonial-meta">Macbook • Software</div>
</div>
</div>
<p class="testimonial-text mb-0">“Problem software kelar, data aman, prosesnya transparan.”</p>
</div>
</div>
<div class="col-12 col-md-6 col-lg-4">
<div class="testimonial-card">
<div class="testimonial-head">
<div class="testimonial-avatar">LK</div>
<div>
<div class="testimonial-name">Lukman</div>
<div class="testimonial-meta">iPhone • Battery</div>
</div>
</div>
<p class="testimonial-text mb-0">“Baterai jadi normal lagi, dikasih opsi part dan garansi.”</p>
</div>
</div>
<div class="col-12 col-md-6 col-lg-4">
<div class="testimonial-card">
<div class="testimonial-head">
<div class="testimonial-avatar">SA</div>
<div>
<div class="testimonial-name">Sari</div>
<div class="testimonial-meta">Android • Speaker</div>
</div>
</div>
<p class="testimonial-text mb-0">“Suara balik jernih, staff ramah, enak konsultasinya.”</p>
</div>
</div>
</div>
</div>
</section>
<section class="py-5 faq-section" id="faq">
<div class="container">
<div class="text-center mb-4">
<h2 class="section-title mb-2">Pertanyaan yang sering ditanya</h2>
<p class="mb-0 text-muted">Kalau masih bingung, langsung chat WA untuk konsultasi.</p>
</div>
<div class="accordion fixmi-accordion" id="fixmiFaq">
<div class="accordion-item">
<h2 class="accordion-header" id="faqOne">
<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">Berapa lama pengerjaan service?</button>
</h2>
<div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#fixmiFaq">
<div class="accordion-body">Tergantung jenis kerusakan dan ketersediaan part. Kami kasih estimasi waktu sebelum pengerjaan dimulai.</div>
</div>
</div>
<div class="accordion-item">
<h2 class="accordion-header" id="faqTwo">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">Apakah ada garansi?</button>
</h2>
<div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#fixmiFaq">
<div class="accordion-body">Ada garansi sesuai jenis service/part. Detail garansi dijelaskan di awal saat estimasi.</div>
</div>
</div>
<div class="accordion-item">
<h2 class="accordion-header" id="faqThree">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">Data di HP aman?</button>
</h2>
<div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree" data-bs-parent="#fixmiFaq">
<div class="accordion-body">Kami prioritaskan keamanan data. Untuk beberapa kasus, backup disarankan sebelum tindakan tertentu.</div>
</div>
</div>
<div class="accordion-item">
<h2 class="accordion-header" id="faqFour">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFour" aria-expanded="false" aria-controls="faqCollapseFour">Bisa cek dulu tanpa langsung service?</button>
</h2>
<div id="faqCollapseFour" class="accordion-collapse collapse" aria-labelledby="faqFour" data-bs-parent="#fixmiFaq">
<div class="accordion-body">Bisa. Kamu boleh konsultasi &amp; cek dulu, lalu putuskan setelah tahu estimasi.</div>
</div>
</div>
<div class="accordion-item">
<h2 class="accordion-header" id="faqFive">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFive" aria-expanded="false" aria-controls="faqCollapseFive">Apakah part original?</button>
</h2>
<div id="faqCollapseFive" class="accordion-collapse collapse" aria-labelledby="faqFive" data-bs-parent="#fixmiFaq">
<div class="accordion-body">Kami sediakan opsi part sesuai kebutuhan dan budget. Pilihan part dijelaskan sebelum pemasangan.</div>
</div>
</div>
</div>
<div class="mt-4 text-center">
<a class="btn btn-success" href="{{ $whatsAppLink }}" target="_blank" rel="noopener">Chat admin untuk tanya</a>
</div>
</div>
</section>
<!-- Contact & Store Section -->
<section class="py-5 contact-section" id="contact">
<div class="container">
<div class="row g-4">
<div class="col-lg-5">
<div class="footer-logo-block mb-4">
<img alt="FIXMI" class="footer-logo mb-3" src="/assets/img/logo-fixmi.png" loading="lazy" decoding="async"/>

</div>

<div class="store-finder mb-4">
<div class="store-finder-heading d-flex align-items-center mb-3">
            <img src="/assets/img/store-map-icon.png" alt="Lokasi FIXMI" class="store-finder-icon me-2" loading="lazy" decoding="async" />
            <h5 class="mb-0 store-finder-title">Temukan Toko Kami</h5>
          </div>
<div class="d-flex flex-wrap gap-2 mb-3">
<button class="btn btn-sm btn-danger" id="headStoreBtn" data-store="head">Head Store</button>
<button class="btn btn-sm btn-outline-danger" id="branchStoreBtn" data-store="branch">Branch Store</button>
<button class="btn btn-sm btn-outline-danger" id="otherStoreBtn" data-store="other">Other Store</button>
</div>
<p class="mb-1"><strong>Whatsapp Admin:</strong> <span id="storeWhatsapp">08873183122</span></p>
<p class="mb-0">
                Alamat Store: <span id="storeAddress">Link.kubu alit kedonganan, Jl. Raya Uluwatu, Kedonganan, Kec. Kuta, Kabupaten Badung, Bali 80361</span>
              </p>
<div class="d-flex flex-wrap gap-2 mt-3">
<a class="btn btn-success btn-sm" id="storeWhatsappLink" href="{{ $whatsAppLink }}" target="_blank" rel="noopener">Chat WhatsApp</a>
<a class="btn btn-outline-dark btn-sm" id="storeMapLink" href="https://maps.google.com/?q=FIXMI%20BALI%20PHONE%20SERVICE" target="_blank" rel="noopener">Buka Google Maps</a>
</div>
</div>
<h6 class="mb-2 footer-social-title">Social media kami</h6>
<div class="footer-social mb-3">
  <a href="https://www.facebook.com/dedik.alesha?mibextid=ZbWKwL" class="footer-social-link" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
    <img src="/assets/img/social-facebook.png" alt="Facebook" class="footer-social-icon" loading="lazy" decoding="async" />
  </a>
  <a href="https://www.instagram.com/fixmibali/?igsh=YTZnenhiZzN6OGVu#" class="footer-social-link" aria-label="Instagram" target="_blank" rel="noopener noreferrer">
    <img src="/assets/img/social-instagram.png" alt="Instagram" class="footer-social-icon" loading="lazy" decoding="async" />
  </a>
  <a href="https://www.tiktok.com/@fixmibali?_t=ZS-8xnjRqDgoT4&_r=1" class="footer-social-link" aria-label="TikTok" target="_blank" rel="noopener noreferrer">
    <img src="/assets/img/social-tiktok.png" alt="TikTok" class="footer-social-icon" loading="lazy" decoding="async" />
  </a>
</div>
<p class="footer-copy mt-4 mb-0">
              © 2016–2025 Fixmibali. All Rights Reserved
            </p>
</div>
<div class="col-lg-7">
<div class="map-card">
<div class="ratio ratio-16x9">
<!-- Ganti src dengan embed map asli dari Google Maps -->
<iframe allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.2849272692183!2d115.1737111759487!3d-8.759240191291688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2446e57c0f08f%3A0x409a770bb27592cf!2sFIXMI%20BALI%20PHONE%20SERVICE!5e0!3m2!1sen!2sid!4v1765683626204!5m2!1sen!2sid"  id="storeMapIframe"></iframe>
</div>
</div>
</div>
</div>
</div>
</section>

<!-- Popup Layanan FIXMI -->
<div class="fixmi-popup-overlay" id="servicePopup" aria-hidden="true">
  <div class="fixmi-popup-dialog">
    <div class="fixmi-popup-brand">
      <img src="/assets/img/logo-fixmi.png" alt="FIXMI Bali logo" class="fixmi-popup-brand-logo" />
    </div>
    <button
      type="button"
      class="fixmi-popup-close"
      aria-label="Tutup popup"
    >
      ×
    </button>

    <div class="fixmi-popup-inner">
      <!-- Kiri: gambar dan teks besar -->
      <div class="fixmi-popup-left">
        <div class="fixmi-popup-image-wrapper">
          <img
            src="/assets/img/cpu-repair.jpg"
            alt="Perbaikan motherboard smartphone di Fixmi Bali"
            class="fixmi-popup-image"
          />

          <div class="fixmi-popup-left-text">
            <p class="fixmi-popup-tagline">
              Device anda Rusak?
            </p>
            <p class="fixmi-popup-desc">
              Buruan bawa ke Fixmi Bali untuk di-service. Free biaya pengecekan
              dan akan dicek oleh teknisi bersertifikat di dunia perbaikan
              smartphone. Tunggu apa lagi, yuk buruan kak.
            </p>
          </div>
        </div>
      </div>

      <!-- Kanan: judul dan list layanan -->
      <div class="fixmi-popup-right">
        <h3 class="fixmi-popup-title fixmi-popup-title-blackops">
          Hardware • Android • Apple<br />
          Software Expert Service
        </h3>

        <ul class="fixmi-popup-service-list">
          <li>
            <span class="fixmi-popup-bullet"></span>
            CPU Reballing
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            Mati Total
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            Charging Trouble
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            Water Damage
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            LCD Replacement
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            Software
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            Swapboard iPhone
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            EMMC / UFS Repair
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            Battery Replacement
          </li>
          <li>
            <span class="fixmi-popup-bullet"></span>
            All Service Bergaransi
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>


<!-- WhatsApp floating button (optional) -->
<a class="whatsapp-float" id="floatingWhatsappLink" href="{{ $whatsAppLink }}" rel="noopener" target="_blank">
  <img src="/assets/img/whatsapp.svg" alt="WhatsApp" class="whatsapp-float-icon" />
</a>
<div class="fixmi-sticky-cta d-lg-none">
<a class="btn btn-dark flex-fill" href="{{ route('pricelist') }}">Pricelist</a>
<a class="btn btn-outline-dark flex-fill" href="#contact">Lokasi</a>
<a class="btn btn-success flex-fill" id="stickyWhatsappLink" href="{{ $whatsAppLink }}" target="_blank" rel="noopener">WhatsApp</a>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="/assets/js/app.js"></script>
</body>
</html>
