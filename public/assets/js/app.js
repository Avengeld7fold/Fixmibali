// Custom JS for FIXMI landing page (optional future interactions)
document.addEventListener("DOMContentLoaded", function () {
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

    if (!wasDismissedRecently()) {
      var hasInteracted = false;
      var markInteracted = function () {
        hasInteracted = true;
      };

      document.addEventListener("scroll", function () {
        if (window.scrollY > 360) {
          hasInteracted = true;
        }
      });
      document.addEventListener("click", markInteracted);
      document.addEventListener("touchstart", markInteracted, { passive: true });

      popupAutoTimer = setTimeout(function () {
        if (!hasInteracted) {
          openPopup();
        }
      }, 2400);
    }
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
    if (storeMapIframe && config.mapSrc) {
      storeMapIframe.src = config.mapSrc;
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
});
