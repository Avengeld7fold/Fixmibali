// Custom JS for FIXMI landing page (optional future interactions)
document.addEventListener("DOMContentLoaded", function () {
  var themeStorageKey = "fixmi_theme";
  var themeToggle = document.getElementById("themeToggle");
  var themeRoot = document.documentElement;

  var updateThemeLogos = function (theme) {
    var logos = document.querySelectorAll("[data-logo-light][data-logo-dark]");
    if (!logos.length) {
      return;
    }
    logos.forEach(function (logo) {
      var lightSrc = logo.getAttribute("data-logo-light");
      var darkSrc = logo.getAttribute("data-logo-dark");
      var nextSrc = theme === "dark" ? darkSrc : lightSrc;
      if (nextSrc && logo.getAttribute("src") !== nextSrc) {
        logo.setAttribute("src", nextSrc);
      }
    });
  };

  var applyTheme = function (theme) {
    if (theme === "dark") {
      themeRoot.setAttribute("data-theme", "dark");
    } else {
      themeRoot.setAttribute("data-theme", "light");
    }

    if (themeToggle) {
      var isDark = theme === "dark";
      themeToggle.setAttribute("aria-pressed", isDark ? "true" : "false");
      themeToggle.setAttribute(
        "title",
        isDark ? "Switch to light mode" : "Switch to dark mode"
      );
    }

    updateThemeLogos(theme);
  };

  var storedTheme = null;
  try {
    storedTheme = localStorage.getItem(themeStorageKey);
  } catch (e) {}

  applyTheme(storedTheme || "light");

  if (themeToggle) {
    themeToggle.addEventListener("click", function () {
      var current = themeRoot.getAttribute("data-theme");
      var next = current === "dark" ? "light" : "dark";
      applyTheme(next);
      try {
        localStorage.setItem(themeStorageKey, next);
      } catch (e) {}
    });
  }

  // Popup Layanan FIXMI
  var popup = document.getElementById("servicePopup");
  var openBtn = document.getElementById("konsultasiGratisBtn");
  var closeBtn = popup ? popup.querySelector(".fixmi-popup-close") : null;

  if (popup && openBtn) {
    var popupStorageKey = "fixmi_popup_dismissed_at";
    var popupDayMs = 24 * 60 * 60 * 1000;
    var popupOpened = false;
    var popupAutoTimer = null;

    var getNow = function () {
      return Date.now ? Date.now() : new Date().getTime();
    };

    var wasDismissedRecently = function () {
      try {
        var raw = localStorage.getItem(popupStorageKey);
        var ts = raw ? parseInt(raw, 10) : 0;
        if (!ts || isNaN(ts)) {
          return false;
        }
        return getNow() - ts < popupDayMs;
      } catch (e) {
        return false;
      }
    };

    var markDismissed = function () {
      try {
        localStorage.setItem(popupStorageKey, String(getNow()));
      } catch (e) {}
    };

    var openPopup = function () {
      if (popupOpened) {
        return;
      }
      if (document.body.classList.contains("lang-modal-open")) {
        return;
      }
      popupOpened = true;
      popup.classList.add("is-visible");
      document.body.classList.add("fixmi-popup-open");
    };

    var closePopup = function () {
      popup.classList.remove("is-visible");
      document.body.classList.remove("fixmi-popup-open");
      markDismissed();
    };

    openBtn.addEventListener("click", function () {
      openPopup();
    });

    if (closeBtn) {
      closeBtn.addEventListener("click", closePopup);
    }

    var handleBackdropClose = function (event) {
      if (event.target === popup) {
        closePopup();
      }
    };

    popup.addEventListener("click", handleBackdropClose);
    popup.addEventListener("touchstart", handleBackdropClose, { passive: true });

    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape" && popup.classList.contains("is-visible")) {
        closePopup();
      }
    });

    // Auto-open disabled: popup only appears when user clicks the button.
  }

  // Language selection modal (first visit on home)
  var langModal = document.getElementById("fixmiLangModal");
  if (langModal && document.body.classList.contains("fixmi-home-page")) {
    var cookieName =
      langModal.getAttribute("data-cookie") || "fixmi_locale";
    var actionBase = langModal.getAttribute("data-action") || "/set-locale";
    var promptKey = "fixmi_locale_prompted_at";
    var promptTtlMs = 24 * 60 * 60 * 1000;
    var getLangNow = function () {
      return Date.now ? Date.now() : new Date().getTime();
    };

    var getCookieValue = function (name) {
      var match = document.cookie.match(
        new RegExp("(^|; )" + name + "=([^;]*)")
      );
      return match ? decodeURIComponent(match[2]) : "";
    };

    var savedLocale =
      getCookieValue(cookieName) || localStorage.getItem("fixmi_locale");
    var lastPromptRaw = localStorage.getItem(promptKey);
    var lastPromptAt = lastPromptRaw ? parseInt(lastPromptRaw, 10) : 0;
    var nowMs = getLangNow();
    var promptExpired =
      !lastPromptAt || isNaN(lastPromptAt) || nowMs - lastPromptAt >= promptTtlMs;

    if (!savedLocale || promptExpired) {
      setTimeout(function () {
        langModal.classList.add("is-visible");
        langModal.setAttribute("aria-hidden", "false");
        document.body.classList.add("lang-modal-open");
      }, 400);
    }

    langModal.querySelectorAll("[data-locale]").forEach(function (button) {
      button.addEventListener("click", function () {
        var locale = button.getAttribute("data-locale");
        if (!locale) {
          return;
        }
        try {
          localStorage.setItem("fixmi_locale", locale);
          localStorage.setItem(promptKey, String(getLangNow()));
        } catch (e) {}

        button.classList.add("is-selected");
        var targetBase = actionBase.replace(/\/$/, "");
        var redirectPath =
          window.location.pathname +
          window.location.search +
          window.location.hash;
        window.location.href =
          targetBase +
          "/" +
          encodeURIComponent(locale) +
          "?redirect=" +
          encodeURIComponent(redirectPath);
      });
    });
  }

  // Warranty modal: disable backdrop on small screens to avoid extra overlay
  var warrantyModal = document.getElementById("warrantyModal");
  if (warrantyModal && typeof window.matchMedia === "function") {
    var warrantyBackdropMq = window.matchMedia("(max-width: 575.98px)");
    var syncWarrantyBackdrop = function () {
      if (warrantyBackdropMq.matches) {
        warrantyModal.setAttribute("data-bs-backdrop", "true");
      } else {
        warrantyModal.removeAttribute("data-bs-backdrop");
      }
    };

    syncWarrantyBackdrop();
    warrantyModal.addEventListener("show.bs.modal", function () {
      if (warrantyBackdropMq.matches) {
        document.body.classList.add("warranty-modal-open");
      }
    });
    warrantyModal.addEventListener("hidden.bs.modal", function () {
      document.body.classList.remove("warranty-modal-open");
    });
    if (typeof warrantyBackdropMq.addEventListener === "function") {
      warrantyBackdropMq.addEventListener("change", syncWarrantyBackdrop);
    } else if (typeof warrantyBackdropMq.addListener === "function") {
      warrantyBackdropMq.addListener(syncWarrantyBackdrop);
    }
  }

  // Mobile offcanvas: hide sticky CTA when menu opens
  var mobileNav = document.getElementById("fixmiMobileNav");

  if (mobileNav) {
    mobileNav.addEventListener("show.bs.offcanvas", function () {
      document.body.classList.add("offcanvas-open");
    });

    mobileNav.addEventListener("hidden.bs.offcanvas", function () {
      document.body.classList.remove("offcanvas-open");
    });
  }

  var normalizeWhatsAppNumber = function (rawNumber) {
    if (!rawNumber) {
      return "";
    }
    var cleaned = String(rawNumber).replace(/[^\d]/g, "");
    if (!cleaned) {
      return "";
    }
    if (cleaned.startsWith("0")) {
      return "62" + cleaned.slice(1);
    }
    if (cleaned.startsWith("62")) {
      return cleaned;
    }
    return cleaned;
  };

  var buildWhatsAppLink = function (rawNumber, message) {
    var number = normalizeWhatsAppNumber(rawNumber);
    if (!number) {
      return "https://wa.me/";
    }
    var base = "https://wa.me/" + number;
    if (!message) {
      return base;
    }
    return base + "?text=" + encodeURIComponent(message);
  };

  var defaultWhatsAppMessage =
    "Halo Fixmi Bali, saya mau konsultasi service. Device saya: ... Keluhannya: ...";

  var heroWhatsappLink = document.getElementById("heroWhatsappLink");
  var stickyWhatsappLink = document.getElementById("stickyWhatsappLink");
  var floatingWhatsappLink = document.getElementById("floatingWhatsappLink");
  var storeWhatsappLink = document.getElementById("storeWhatsappLink");

  function setWhatsAppLinks(rawNumber) {
    var href = buildWhatsAppLink(rawNumber, defaultWhatsAppMessage);
    [heroWhatsappLink, stickyWhatsappLink, floatingWhatsappLink, storeWhatsappLink].forEach(
      function (el) {
        if (!el) return;
        el.href = href;
      }
    );
  }

  // Magnetic micro-move for hero buttons (desktop only)
  var prefersReducedMotion =
    window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var heroButtons = document.querySelectorAll(".fixmi-home-page .hero-btn");

  if (!prefersReducedMotion && heroButtons.length) {
    var maxMove = 6;

    heroButtons.forEach(function (button) {
      var rafId = null;

      var setOffset = function (x, y) {
        button.style.setProperty("--hero-mx", x + "px");
        button.style.setProperty("--hero-my", y + "px");
      };

      var handleMove = function (event) {
        if (event.pointerType === "touch") {
          return;
        }
        var rect = button.getBoundingClientRect();
        if (!rect.width || !rect.height) {
          return;
        }
        var relX = event.clientX - rect.left;
        var relY = event.clientY - rect.top;
        var moveX = ((relX - rect.width / 2) / (rect.width / 2)) * maxMove;
        var moveY = ((relY - rect.height / 2) / (rect.height / 2)) * maxMove;

        if (rafId) {
          cancelAnimationFrame(rafId);
        }
        rafId = requestAnimationFrame(function () {
          setOffset(moveX.toFixed(2), moveY.toFixed(2));
        });
      };

      var reset = function () {
        if (rafId) {
          cancelAnimationFrame(rafId);
        }
        setOffset(0, 0);
      };

      button.addEventListener("pointermove", handleMove);
      button.addEventListener("pointerleave", reset);
      button.addEventListener("pointerdown", reset);
    });
  }

  // Before & After: stagger reveal for cards
  var baItems = document.querySelectorAll(".before-after-section .ba-item");

  if (baItems.length) {
    baItems.forEach(function (item, index) {
      item.classList.add("ba-reveal");
      item.style.setProperty("--ba-delay", index * 0.06 + "s");
    });

    if (prefersReducedMotion || !("IntersectionObserver" in window)) {
      baItems.forEach(function (item) {
        item.classList.add("is-visible");
      });
    } else {
      var baObserver = new IntersectionObserver(
        function (entries, observer) {
          entries.forEach(function (entry) {
            if (!entry.isIntersecting) {
              return;
            }
            entry.target.classList.add("is-visible");
            observer.unobserve(entry.target);
          });
        },
        { threshold: 0.25 }
      );

      baItems.forEach(function (item) {
        baObserver.observe(item);
      });
    }
  }

  // Advantages: reveal + title underline
  var advantageNodes = document.querySelectorAll(".advantages-section .advantages-reveal");
  var advantageTitle = document.querySelector(".advantages-section .section-title");

  if (advantageNodes.length || advantageTitle) {
    if (prefersReducedMotion || !("IntersectionObserver" in window)) {
      advantageNodes.forEach(function (node) {
        node.classList.add("is-visible");
      });
      if (advantageTitle) {
        advantageTitle.classList.add("is-visible");
      }
    } else {
      var advantageObserver = new IntersectionObserver(
        function (entries, observer) {
          entries.forEach(function (entry) {
            if (!entry.isIntersecting) return;
            entry.target.classList.add("is-visible");
            observer.unobserve(entry.target);
          });
        },
        { threshold: 0.3 }
      );

      advantageNodes.forEach(function (node) {
        advantageObserver.observe(node);
      });

      if (advantageTitle) {
        advantageObserver.observe(advantageTitle);
      }
    }
  }

  // FAQ: reveal on scroll
  var faqHeader = document.querySelector(".faq-section .faq-header");
  var faqItems = document.querySelectorAll(".faq-section .accordion-item");
  var faqNodes = [];

  if (faqHeader) {
    faqHeader.classList.add("faq-reveal");
    faqHeader.style.setProperty("--faq-delay", "0s");
    faqNodes.push(faqHeader);
  }

  if (faqItems.length) {
    faqItems.forEach(function (item, index) {
      item.classList.add("faq-reveal");
      item.style.setProperty("--faq-delay", 0.08 + index * 0.06 + "s");
      faqNodes.push(item);
    });
  }

  if (faqNodes.length) {
    if (prefersReducedMotion || !("IntersectionObserver" in window)) {
      faqNodes.forEach(function (node) {
        node.classList.add("is-visible");
      });
    } else {
      var faqObserver = new IntersectionObserver(
        function (entries, observer) {
          entries.forEach(function (entry) {
            if (!entry.isIntersecting) return;
            entry.target.classList.add("is-visible");
            observer.unobserve(entry.target);
          });
        },
        { threshold: 0.25 }
      );

      faqNodes.forEach(function (node) {
        faqObserver.observe(node);
      });
    }
  }

  var faqAccordion = document.getElementById("fixmiFaq");

  if (faqAccordion) {
    var faqCollapses = faqAccordion.querySelectorAll(".accordion-collapse");

    faqCollapses.forEach(function (collapse) {
      var item = collapse.closest(".accordion-item");
      if (item && collapse.classList.contains("show")) {
        item.classList.add("is-open");
      }

      collapse.addEventListener("shown.bs.collapse", function () {
        if (item) {
          item.classList.add("is-open");
        }
      });

      collapse.addEventListener("hidden.bs.collapse", function () {
        if (item) {
          item.classList.remove("is-open");
        }
      });
    });
  }

  // Testimonial: expand/collapse long reviews
  var testimonialToggles = document.querySelectorAll(".testimonial-toggle");

  testimonialToggles.forEach(function (toggle) {
    toggle.addEventListener("click", function () {
      var card = toggle.closest(".testimonial-card");
      if (!card) return;
      var isExpanded = card.classList.toggle("is-expanded");
      toggle.setAttribute("aria-expanded", isExpanded ? "true" : "false");
      var labelMore = toggle.getAttribute("data-label-more") || "See more";
      var labelLess = toggle.getAttribute("data-label-less") || "See less";
      toggle.textContent = isExpanded ? labelLess : labelMore;
    });
  });

  // Testimonial: mobile slider arrows + dots
  var testimonialTrack = document.querySelector(
    ".testimonials-section .testimonial-track"
  );
  var testimonialNav = document.querySelector(".testimonial-mobile-nav");

  if (testimonialTrack && testimonialNav) {
    var testimonialItems = Array.prototype.slice
      .call(testimonialTrack.children)
      .filter(function (item) {
        return item.classList.contains("col-12");
      });
    var dotsContainer = testimonialNav.querySelector(".testimonial-dots");
    var prevArrow = testimonialNav.querySelector(".testimonial-arrow-prev");
    var nextArrow = testimonialNav.querySelector(".testimonial-arrow-next");
    var prefersReducedMotion = window.matchMedia(
      "(prefers-reduced-motion: reduce)"
    ).matches;
    var dots = [];
    var scrollTicking = false;

    function getStepSize() {
      var firstItem = testimonialItems[0];
      if (!firstItem) return testimonialTrack.clientWidth;
      var style = window.getComputedStyle(testimonialTrack);
      var gap =
        parseFloat(style.columnGap || style.gap || style.rowGap) || 0;
      return firstItem.getBoundingClientRect().width + gap;
    }

    function getActiveIndex() {
      var step = getStepSize();
      if (!step) return 0;
      return Math.round(testimonialTrack.scrollLeft / step);
    }

    function updateActive(index) {
      dots.forEach(function (dot, idx) {
        var isActive = idx === index;
        dot.classList.toggle("is-active", isActive);
        dot.setAttribute("aria-current", isActive ? "true" : "false");
      });
      if (prevArrow) prevArrow.disabled = index <= 0;
      if (nextArrow) nextArrow.disabled = index >= dots.length - 1;
    }

    function scrollToIndex(index) {
      var step = getStepSize();
      testimonialTrack.scrollTo({
        left: step * index,
        behavior: prefersReducedMotion ? "auto" : "smooth",
      });
    }

    if (dotsContainer && testimonialItems.length > 0) {
      dotsContainer.innerHTML = "";
      testimonialItems.forEach(function (_, index) {
        var dot = document.createElement("button");
        dot.type = "button";
        dot.className = "testimonial-dot";
        dot.setAttribute("aria-label", "Slide " + (index + 1));
        dot.addEventListener("click", function () {
          scrollToIndex(index);
        });
        dotsContainer.appendChild(dot);
        dots.push(dot);
      });
      updateActive(0);
    }

    if (prevArrow) {
      prevArrow.addEventListener("click", function () {
        var currentIndex = getActiveIndex();
        scrollToIndex(Math.max(currentIndex - 1, 0));
      });
    }

    if (nextArrow) {
      nextArrow.addEventListener("click", function () {
        var currentIndex = getActiveIndex();
        scrollToIndex(Math.min(currentIndex + 1, dots.length - 1));
      });
    }

    testimonialTrack.addEventListener("scroll", function () {
      if (scrollTicking) return;
      scrollTicking = true;
      window.requestAnimationFrame(function () {
        scrollTicking = false;
        updateActive(getActiveIndex());
      });
    });

    window.addEventListener("resize", function () {
      updateActive(getActiveIndex());
    });
  }

  // Global flag: ketika user klik teks layanan, animasi scroll tidak menimpa pilihan
  window.__FIXMI_MANUAL_LOCK = window.__FIXMI_MANUAL_LOCK || false;

  var phoneScreen = document.querySelector(".phone-screen");
  var images = [];
  var extraImages = [];
  var total = 0;

  if (phoneScreen) {
    images = Array.prototype.slice.call(
      phoneScreen.querySelectorAll(".phone-sequence-image")
    );
    extraImages = Array.prototype.slice.call(
      phoneScreen.querySelectorAll(".phone-extra-image")
    );
    total = images.length;
  }

  // Urutan array: [13.webp, 12.webp, ..., 1.webp]
  // Step 0  -> hanya 13.webp yang kelihatan
  // Step 1  -> 13 + 12
  // ...
  // Step 11 -> 13 .. 2 berlapis
  // Step 12 -> KHUSUS: hanya 1.webp yang kelihatan (benar-benar berganti)
  var currentStep = 0;
  var currentProgress = 0; // float 0..(total-1)
  var targetProgress = 0;
  var lastAppliedStep = -1;

  function applyStep(step) {
    if (!total) {
      return;
    }
    if (step < 0) step = 0;
    if (step > total - 1) step = total - 1;
    currentStep = step;

    images.forEach(function (img, idx) {
      if (currentStep === total - 1) {
        // Pengecualian gambar terakhir (1.webp): hanya dia yang tampil
        img.classList.toggle("is-active", idx === currentStep);
      } else {
        // Mode layering: semua index <= currentStep aktif (menimpa)
        img.classList.toggle("is-active", idx <= currentStep);
      }
    });
  }

  function syncScrollState(stepIndex) {
    if (!total) {
      return;
    }
    if (stepIndex < 0) stepIndex = 0;
    if (stepIndex > total - 1) stepIndex = total - 1;
    currentStep = stepIndex;
    currentProgress = stepIndex;
    targetProgress = stepIndex;
    lastAppliedStep = stepIndex;
  }

  function getStepForDataIndex(idx) {
    if (!images.length || isNaN(idx)) {
      return -1;
    }
    return images.findIndex(function (img) {
      var current = parseInt(img.getAttribute("data-index"), 10);
      return current === idx;
    });
  }

  function setActiveIndexes(indexes) {
    if (!images.length) {
      return;
    }
    images.forEach(function (img) {
      var current = parseInt(img.getAttribute("data-index"), 10);
      img.classList.toggle("is-active", indexes.indexOf(current) !== -1);
    });
  }

  function clearExtras() {
    if (!extraImages.length) {
      return;
    }
    extraImages.forEach(function (img) {
      img.classList.remove("is-active");
    });
  }

  function hasImageIndex(idx) {
    return images.some(function (img) {
      var current = parseInt(img.getAttribute("data-index"), 10);
      return current === idx;
    });
  }

  function hasExtraId(id) {
    return extraImages.some(function (img) {
      return img.getAttribute("data-extra-id") === id;
    });
  }

  function showImageByIndex(idx) {
    if (!images.length || isNaN(idx) || !hasImageIndex(idx)) {
      return false;
    }
    clearExtras();
    setActiveIndexes([idx]);
    return true;
  }

  function showExtraById(id) {
    if (!extraImages.length || !hasExtraId(id)) {
      return false;
    }
    // Matikan semua scroll images
    images.forEach(function (img) {
      img.classList.remove("is-active");
    });
    // Tampilkan hanya extra image sesuai id
    extraImages.forEach(function (img) {
      var eid = img.getAttribute("data-extra-id");
      img.classList.toggle("is-active", eid === id);
    });
    return true;
  }

  if (phoneScreen && total) {
    function animate() {
      // Jika sedang manual lock (klik teks), jangan ubah gambar berdasarkan scroll
      if (window.__FIXMI_MANUAL_LOCK) {
        requestAnimationFrame(animate);
        return;
      }
      // Easing ke targetProgress
      var diff = targetProgress - currentProgress;

      if (Math.abs(diff) > 0.001) {
        currentProgress += diff * 0.12; // faktor smoothing (semakin kecil semakin lembut)
      } else {
        currentProgress = targetProgress;
      }

      // Hitung step terdekat
      var step = Math.round(currentProgress);

      if (step !== lastAppliedStep) {
        applyStep(step);
        lastAppliedStep = step;
      }

      requestAnimationFrame(animate);
    }

    // Mulai dengan hanya 13.webp aktif
    applyStep(0);
    currentProgress = 0;
    targetProgress = 0;
    lastAppliedStep = 0;
    requestAnimationFrame(animate);

    // Scroll hanya saat pointer di area gambar
    phoneScreen.addEventListener(
      "wheel",
      function (e) {
        e.preventDefault();

        // Jika user scroll lagi, manual lock dimatikan
        window.__FIXMI_MANUAL_LOCK = false;

        // Saat user scroll, pastikan gambar extra (backglass / recovery) disembunyikan
        clearExtras();

        // Setelah extra disembunyikan, pastikan ada gambar dasar yang langsung tampil tanpa delay
        var stepNow = Math.round(targetProgress);
        if (isNaN(stepNow) || stepNow < 0) stepNow = 0;
        if (stepNow > total - 1) stepNow = total - 1;
        applyStep(stepNow);
        lastAppliedStep = stepNow;

        // Sesuaikan sensitivitas scroll di sini:
        // semakin besar pembaginya (300, 400, dst) semakin pelan
        var sensitivity = 320;
        targetProgress += e.deltaY / sensitivity;

        // Clamp ke range 0..(total-1)
        if (targetProgress < 0) targetProgress = 0;
        if (targetProgress > total - 1) targetProgress = total - 1;
      },
      { passive: false }
    );

    // Swipe support untuk mobile (touch) - versi tweaked
    var lastTouchY = null;

    phoneScreen.addEventListener(
      "touchstart",
      function (e) {
        if (e.touches && e.touches.length > 0) {
          lastTouchY = e.touches[0].clientY;
        }
      },
      { passive: true }
    );

    phoneScreen.addEventListener(
      "touchmove",
      function (e) {
        if (!e.touches || e.touches.length === 0 || lastTouchY === null) {
          return;
        }

        var currentY = e.touches[0].clientY;
        var deltaY = lastTouchY - currentY;
        lastTouchY = currentY;

        var minThreshold = 2.5;
        if (Math.abs(deltaY) < minThreshold) {
          return;
        }

        window.__FIXMI_MANUAL_LOCK = false;

        clearExtras();

        var baseSensitivity = 140;
        var swipeStrength = Math.min(Math.abs(deltaY) / 40, 2);
        var effectiveSensitivity = baseSensitivity / (0.6 + swipeStrength);

        targetProgress += deltaY / effectiveSensitivity;

        if (targetProgress < 0) targetProgress = 0;
        if (targetProgress > total - 1) targetProgress = total - 1;

        var stepNow = Math.round(targetProgress);
        if (isNaN(stepNow) || stepNow < 0) stepNow = 0;
        if (stepNow > total - 1) stepNow = total - 1;
        applyStep(stepNow);
        lastAppliedStep = stepNow;

        e.preventDefault();
      },
      { passive: false }
    );
  }

  // Klik judul + sub text di daftar Before & After
  if (images.length) {
    document.querySelectorAll(".ba-list .ba-link").forEach(function (el) {
      el.addEventListener("click", function (event) {
        var handled = false;
        var stepIndexes = [];

        var extraTarget = el.getAttribute("data-extra-target");
        if (extraTarget) {
          handled = showExtraById(extraTarget);
        } else {
          var pairAttr = el.getAttribute("data-target-pair");
          if (pairAttr) {
            var parts = pairAttr
              .split(",")
              .map(function (p) {
                return parseInt(p.trim(), 10);
              })
              .filter(function (n) {
                return !isNaN(n);
              });

            if (parts.length) {
              clearExtras();
              setActiveIndexes(parts);
              handled = true;
              stepIndexes = parts;
            }
          }

          if (!handled) {
            var targetAttr = el.getAttribute("data-target-index");
            if (targetAttr) {
              var target = parseInt(targetAttr, 10);
              if (!isNaN(target) && showImageByIndex(target)) {
                handled = true;
                stepIndexes = [target];
              }
            }
          }
        }

        if (handled) {
          if (event && event.preventDefault) {
            event.preventDefault();
          }
          window.__FIXMI_MANUAL_LOCK = true;

          document.querySelectorAll(".ba-list .ba-item.is-active").forEach(function (item) {
            item.classList.remove("is-active");
          });
          el.classList.add("is-active");

          if (stepIndexes.length) {
            var steps = stepIndexes
              .map(getStepForDataIndex)
              .filter(function (step) {
                return step >= 0;
              });
            if (steps.length) {
              syncScrollState(Math.max.apply(null, steps));
            }
          }
        }
      });
    });
  }

  // Store finder toggle (Head Store / Branch Store / Other Store)
  var headStoreBtn = document.getElementById("headStoreBtn");
  var branchStoreBtn = document.getElementById("branchStoreBtn");
  var otherStoreBtn = document.getElementById("otherStoreBtn");
  var storeWhatsappEl = document.getElementById("storeWhatsapp");
  var storeAddressEl = document.getElementById("storeAddress");
  var storeMapIframe = document.getElementById("storeMapIframe");
  var storeMapIframeMobile = document.getElementById("storeMapIframeMobile");
  var storeMapLink = document.getElementById("storeMapLink");

  var storeConfigs = {
    head: {
      whatsapp: "08873183122",
      address:
        "Link.kubu alit kedonganan, Jl. Raya Uluwatu, Kedonganan, Kec. Kuta, Kabupaten Badung, Bali 80361",
      mapSrc:
        "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.2849272692183!2d115.1737111759487!3d-8.759240191291688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2446e57c0f08f%3A0x409a770bb27592cf!2sFIXMI%20BALI%20PHONE%20SERVICE!5e0!3m2!1sen!2sid!4v1765683626204!5m2!1sen!2sid"
      ,
      mapLink: "https://maps.google.com/?q=FIXMI%20BALI%20PHONE%20SERVICE"
    },
    branch: {
      whatsapp: "085123579557",
      address:
        "Taman Griya, Jl. Nuansa Utama No.33, Jimbaran, South Kuta, Badung Regency, Bali 80361",
      mapSrc:
        "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1971.4531090565445!2d115.1862666!3d-8.7948811!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd245b7aede93f7%3A0x66181e041d1dfde4!2sFixmi%20Bali%20Phone%20Taman%20Griya!5e0!3m2!1sen!2sid!4v1765684844362!5m2!1sen!2sid"
      ,
      mapLink: "https://maps.google.com/?q=Fixmi%20Bali%20Phone%20Taman%20Griya"
    },
    other: {
      whatsapp: "08873183122",
      address:
        "Cellular World Arena, Jl. Teuku Umar No.57, Dauh Puri Kauh, Kec. Denpasar Bar., Kota Denpasar, Bali 80113",
      mapSrc:
        "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.2209567931473!2d115.20696627594779!3d-8.67052539137721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd241d1aabc7995%3A0x7e4bf1c703f4a420!2sMobicare%20Service%20Center!5e0!3m2!1sen!2sid!4v1765685075112!5m2!1sen!2sid"
      ,
      mapLink: "https://maps.google.com/?q=Cellular%20World%20Arena%20Teuku%20Umar%2057"
    }
  };

  function setActiveStore(storeKey) {
    if (!storeConfigs[storeKey]) return;
    var config = storeConfigs[storeKey];

    if (storeWhatsappEl) {
      storeWhatsappEl.textContent = config.whatsapp;
    }
    if (storeAddressEl) {
      storeAddressEl.textContent = config.address;
    }
    if (config.mapSrc) {
      if (storeMapIframe) {
        storeMapIframe.src = config.mapSrc;
      }
      if (storeMapIframeMobile) {
        storeMapIframeMobile.src = config.mapSrc;
      }
    }
    if (storeMapLink && config.mapLink) {
      storeMapLink.href = config.mapLink;
    }

    setWhatsAppLinks(config.whatsapp);

    try {
      localStorage.setItem("fixmi_active_store", storeKey);
    } catch (e) {}

    // Reset all button styles then activate the selected one
    var btnPairs = [headStoreBtn, branchStoreBtn, otherStoreBtn];
    btnPairs.forEach(function (btn) {
      if (!btn) return;
      btn.classList.remove("btn-danger");
      btn.classList.add("btn-outline-danger");
    });

    if (storeKey === "head" && headStoreBtn) {
      headStoreBtn.classList.add("btn-danger");
      headStoreBtn.classList.remove("btn-outline-danger");
    } else if (storeKey === "branch" && branchStoreBtn) {
      branchStoreBtn.classList.add("btn-danger");
      branchStoreBtn.classList.remove("btn-outline-danger");
    } else if (storeKey === "other" && otherStoreBtn) {
      otherStoreBtn.classList.add("btn-danger");
      otherStoreBtn.classList.remove("btn-outline-danger");
    }
  }

  if (headStoreBtn || branchStoreBtn || otherStoreBtn) {
    if (headStoreBtn) {
      headStoreBtn.addEventListener("click", function (e) {
        e.preventDefault();
        setActiveStore("head");
      });
    }

    if (branchStoreBtn) {
      branchStoreBtn.addEventListener("click", function (e) {
        e.preventDefault();
        setActiveStore("branch");
      });
    }

    if (otherStoreBtn) {
      otherStoreBtn.addEventListener("click", function (e) {
        e.preventDefault();
        setActiveStore("other");
      });
    }

    var initialStore = "head";
    try {
      var storedStore = localStorage.getItem("fixmi_active_store");
      if (storedStore && storeConfigs[storedStore]) {
        initialStore = storedStore;
      }
    } catch (e) {}

    setActiveStore(initialStore);
  } else {
    setWhatsAppLinks("08873183122");
  }

  var initPricelistTables = function () {
    var shells = document.querySelectorAll(".service-price-table-shell[data-pricelist-instance]");
    if (!shells.length) {
      return;
    }

    var normalize = function (value) {
      return String(value || "")
        .toLowerCase()
        .replace(/\s+/g, " ")
        .trim();
    };

    var parseNumber = function (raw) {
      var cleaned = String(raw || "").trim();
      if (!cleaned || cleaned === "-") {
        return null;
      }
      cleaned = cleaned.replace(/[^\d,.\-]/g, "");
      if (!cleaned || cleaned === "-" || cleaned === ".") {
        return null;
      }

      var hasComma = cleaned.indexOf(",") !== -1;
      var hasDot = cleaned.indexOf(".") !== -1;

      if (hasComma && hasDot) {
        var lastComma = cleaned.lastIndexOf(",");
        var lastDot = cleaned.lastIndexOf(".");
        if (lastComma > lastDot) {
          cleaned = cleaned.replace(/\./g, "");
          cleaned = cleaned.replace(",", ".");
        } else {
          cleaned = cleaned.replace(/,/g, "");
        }
      } else if (hasComma) {
        var parts = cleaned.split(",");
        var suffix = parts[parts.length - 1] || "";
        if (suffix.length === 2) {
          cleaned = cleaned.replace(/\./g, "");
          cleaned = cleaned.replace(",", ".");
        } else {
          cleaned = cleaned.replace(/,/g, "");
        }
      } else {
        cleaned = cleaned.replace(/\./g, "");
      }

      var n = Number(cleaned);
      return isFinite(n) ? n : null;
    };

    var getCellText = function (cell) {
      if (!cell) {
        return "";
      }
      var clone = cell.cloneNode(true);
      return String(clone.textContent || "")
        .replace(/\s+/g, " ")
        .trim();
    };

    shells.forEach(function (shell) {
      var instanceId = shell.getAttribute("data-pricelist-instance");
      if (!instanceId) {
        return;
      }

      var table = shell.querySelector('table[data-pricelist-table="' + instanceId + '"]');
      if (!table || !table.tBodies || !table.tBodies[0]) {
        return;
      }

      var searchEl = shell.querySelector('[data-pricelist-search="' + instanceId + '"]');

      var tbody = table.tBodies[0];
      var rows = Array.prototype.slice.call(tbody.rows || []);

      rows.forEach(function (row) {
        var rowText = Array.prototype.slice
          .call(row.querySelectorAll("td"))
          .map(getCellText)
          .join(" ");
        row.__fixmiSearch = normalize(rowText);
      });

      var applyFilters = function () {
        var q = searchEl ? normalize(searchEl.value) : "";

        rows.forEach(function (row) {
          var ok = true;
          if (q) {
            ok = row.__fixmiSearch && row.__fixmiSearch.indexOf(q) !== -1;
          }
          row.style.display = ok ? "" : "none";
        });
      };

      var setSort = function (colIndex) {
        var th = table.querySelector('thead th[data-col="' + colIndex + '"]');
        if (!th) {
          return;
        }

        var currentDir = th.classList.contains("is-sort-asc")
          ? "asc"
          : th.classList.contains("is-sort-desc")
            ? "desc"
            : "";
        var nextDir = currentDir === "asc" ? "desc" : "asc";

        Array.prototype.slice.call(table.querySelectorAll("thead th")).forEach(function (node) {
          node.classList.remove("is-sort-asc");
          node.classList.remove("is-sort-desc");
        });
        th.classList.add(nextDir === "asc" ? "is-sort-asc" : "is-sort-desc");

        var isPrice = th.getAttribute("data-is-price") === "1";

        rows.sort(function (a, b) {
          var aCell = a.querySelector('td[data-col="' + colIndex + '"]');
          var bCell = b.querySelector('td[data-col="' + colIndex + '"]');
          var av = getCellText(aCell);
          var bv = getCellText(bCell);

          if (isPrice) {
            var an = parseNumber(av);
            var bn = parseNumber(bv);
            if (an !== null && bn !== null) {
              return nextDir === "asc" ? an - bn : bn - an;
            }
          }

          var cmp = String(av).localeCompare(String(bv), undefined, {
            numeric: true,
            sensitivity: "base",
          });
          return nextDir === "asc" ? cmp : -cmp;
        });

        rows.forEach(function (row) {
          tbody.appendChild(row);
        });

        applyFilters();
      };

      if (searchEl) {
        searchEl.addEventListener("input", applyFilters);
      }

      shell.querySelectorAll('[data-pricelist-sort="' + instanceId + '"]').forEach(function (btn) {
        btn.addEventListener("click", function () {
          var col = parseInt(btn.getAttribute("data-col"), 10);
          if (isNaN(col)) {
            return;
          }
          setSort(col);
        });
      });

      applyFilters();
    });
  };

  var initPromoMagnet = function () {
    var cards = document.querySelectorAll(".promo-card");
    if (!cards.length) {
      return;
    }

    var maxShift = 12;
    var jiggleMin = 1.4;
    var jiggleMax = 3.6;
    var jiggleRotMax = 1.2;

    var clamp = function (value, min, max) {
      return Math.min(max, Math.max(min, value));
    };

    var randomizeSheen = function (card) {
      var isReverse = Math.random() < 0.5;
      card.style.setProperty("--promo-sheen-angle", isReverse ? "-115deg" : "115deg");
      card.style.setProperty("--promo-sheen-start", isReverse ? "120%" : "-120%");
      card.style.setProperty("--promo-sheen-end", isReverse ? "-120%" : "120%");
      card.style.setProperty("--promo-sheen-skew", isReverse ? "12deg" : "-12deg");
    };

    var stopJiggle = function (card) {
      card.__promoJiggleActive = false;
      if (card.__promoJiggleTimer) {
        window.clearTimeout(card.__promoJiggleTimer);
        card.__promoJiggleTimer = null;
      }
      card.style.setProperty("--promo-jiggle-x", "0px");
      card.style.setProperty("--promo-jiggle-y", "0px");
      card.style.setProperty("--promo-jiggle-rot", "0deg");
    };

    var startJiggle = function (card) {
      stopJiggle(card);
      card.__promoJiggleActive = true;

      var step = function () {
        if (!card.__promoJiggleActive) {
          return;
        }

        var amp = jiggleMin + Math.random() * (jiggleMax - jiggleMin);
        var shiftX = (Math.random() * 2 - 1) * amp;
        var shiftY = (Math.random() * 2 - 1) * amp;
        var rot = (Math.random() * 2 - 1) * jiggleRotMax;

        card.style.setProperty("--promo-jiggle-x", shiftX.toFixed(2) + "px");
        card.style.setProperty("--promo-jiggle-y", shiftY.toFixed(2) + "px");
        card.style.setProperty("--promo-jiggle-rot", rot.toFixed(2) + "deg");

        card.__promoJiggleTimer = window.setTimeout(step, 60 + Math.random() * 80);
      };

      step();
    };

    cards.forEach(function (card) {
      var setShift = function (x, y) {
        card.style.setProperty("--promo-shift-x", x + "px");
        card.style.setProperty("--promo-shift-y", y + "px");
      };

      card.addEventListener("mouseenter", function () {
        randomizeSheen(card);
        startJiggle(card);
      });

      card.addEventListener("mousemove", function (event) {
        var rect = card.getBoundingClientRect();
        if (!rect.width || !rect.height) {
          return;
        }

        var x = event.clientX - rect.left;
        var y = event.clientY - rect.top;
        var percentX = (x / rect.width) * 2 - 1;
        var percentY = (y / rect.height) * 2 - 1;
        var shiftX = clamp(percentX, -1, 1) * maxShift;
        var shiftY = clamp(percentY, -1, 1) * maxShift;

        setShift(shiftX.toFixed(2), shiftY.toFixed(2));
      });

      card.addEventListener("mouseleave", function () {
        stopJiggle(card);
        setShift(0, 0);
      });
    });
  };

  initPromoMagnet();
  initPricelistTables();
});
