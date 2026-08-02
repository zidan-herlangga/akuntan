(function () {
  'use strict';

  /* ---------- Header scroll state ---------- */
  const header = document.getElementById('site-header');
  const onScroll = function () {
    if (window.scrollY > 10) {
      header && header.classList.add('is-scrolled');
    } else {
      header && header.classList.remove('is-scrolled');
    }
  };
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  /* ---------- Mobile menu (offcanvas) ---------- */
  const menuBtn = document.getElementById('mobile-menu-btn');
  const offcanvasWrapper = document.getElementById('offcanvas-wrapper');
  const offcanvasBackdrop = document.getElementById('offcanvas-backdrop');
  const offcanvasPanel = document.getElementById('offcanvas-panel');
  const offcanvasClose = document.getElementById('offcanvas-close-btn');

  function openMenu() {
    if (!offcanvasWrapper) return;
    offcanvasWrapper.classList.remove('hidden');
    requestAnimationFrame(function () {
      offcanvasBackdrop && offcanvasBackdrop.classList.remove('opacity-0');
      offcanvasPanel && offcanvasPanel.classList.remove('translate-x-full');
    });
    document.body.style.overflow = 'hidden';
  }

  function closeMenu() {
    if (!offcanvasWrapper) return;
    offcanvasBackdrop && offcanvasBackdrop.classList.add('opacity-0');
    offcanvasPanel && offcanvasPanel.classList.add('translate-x-full');
    document.body.style.overflow = '';
    setTimeout(function () { offcanvasWrapper.classList.add('hidden'); }, 300);
  }

  if (menuBtn && offcanvasWrapper) {
    menuBtn.addEventListener('click', openMenu);
    offcanvasClose && offcanvasClose.addEventListener('click', closeMenu);
    offcanvasBackdrop && offcanvasBackdrop.addEventListener('click', closeMenu);
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && !offcanvasWrapper.classList.contains('hidden')) closeMenu();
    });
  }

  /* ---------- Reveal on scroll ---------- */
  var revealEls = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('active');
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );
    revealEls.forEach(function (el) { io.observe(el); });
  } else {
    revealEls.forEach(function (el) { el.classList.add('active'); });
  }

  /* ---------- Animated counters ---------- */
  function animateCounter(el) {
    var target = parseInt(el.getAttribute('data-counter'), 10) || 0;
    var suffix = el.getAttribute('data-suffix') || '';
    var prefix = el.getAttribute('data-prefix') || '';
    var duration = 1600;
    var start = null;
    function tick(now) {
      if (!start) start = now;
      var p = Math.min((now - start) / duration, 1);
      var eased = 1 - Math.pow(1 - p, 3);
      el.textContent = prefix + Math.round(target * eased) + suffix;
      if (p < 1) requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  }

  var counters = document.querySelectorAll('[data-counter]');
  if ('IntersectionObserver' in window && counters.length) {
    var counterIO = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            counterIO.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.4 }
    );
    counters.forEach(function (el) { counterIO.observe(el); });
  } else {
    counters.forEach(function (el) {
      el.textContent = (el.getAttribute('data-prefix') || '') + el.getAttribute('data-counter') + (el.getAttribute('data-suffix') || '');
    });
  }

  /* ---------- Testimonial slider ---------- */
  var track = document.querySelector('[data-testimonial-track]');
  if (track) {
    var slides = Array.prototype.slice.call(track.children);
    var prevBtn = document.querySelector('[data-testimonial-prev]');
    var nextBtn = document.querySelector('[data-testimonial-next]');
    var dotsWrap = document.querySelector('[data-testimonial-dots]');
    var index = 0;
    var timer = null;

    var dots = [];
    if (dotsWrap) {
      slides.forEach(function (_, i) {
        var d = document.createElement('button');
        d.className = 'dot' + (i === 0 ? ' active' : '');
        d.setAttribute('aria-label', 'Pindah ke testimoni ' + (i + 1));
        d.addEventListener('click', function () { go(i); restart(); });
        dotsWrap.appendChild(d);
        dots.push(d);
      });
    }

    function go(i) {
      index = (i + slides.length) % slides.length;
      track.style.transform = 'translateX(-' + index * 100 + '%)';
      dots.forEach(function (d, j) { d.classList.toggle('active', j === index); });
    }

    function restart() {
      if (timer) clearInterval(timer);
      timer = setInterval(function () { go(index + 1); }, 6500);
    }

    prevBtn && prevBtn.addEventListener('click', function () { go(index - 1); restart(); });
    nextBtn && nextBtn.addEventListener('click', function () { go(index + 1); restart(); });
    restart();
  }

  /* ---------- Booking wizard ---------- */
  var wizard = document.getElementById('booking-wizard');
  if (wizard) {
    var steps = Array.prototype.slice.call(wizard.querySelectorAll('[data-step]'));
    var indicators = Array.prototype.slice.call(wizard.querySelectorAll('[data-step-ind]'));
    var lines = Array.prototype.slice.call(wizard.querySelectorAll('[data-step-line]'));
    var current = 0;

    function show(i) {
      if (i < 0 || i >= steps.length) return;
      current = i;
      steps.forEach(function (s, j) { s.classList.toggle('hidden', j !== i); });
      indicators.forEach(function (ind, j) {
        ind.classList.toggle('active', j === i);
        ind.classList.toggle('done', j < i);
      });
      lines.forEach(function (ln, j) { ln.classList.toggle('done', j < i); });
      wizard.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    wizard.querySelectorAll('[data-next]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var stepEl = steps[current];
        var invalid = false;
        var controls = stepEl.querySelectorAll('input, select, textarea');
        Array.prototype.forEach.call(controls, function (el) {
          if (!el.disabled && typeof el.checkValidity === 'function' && !el.checkValidity()) {
            el.reportValidity();
            invalid = true;
          }
        });
        if (invalid) return;
        if (current === steps.length - 2) {
          // last step is summary — fill it
          fillSummary();
        }
        show(current + 1);
      });
    });

    wizard.querySelectorAll('[data-prev]').forEach(function (btn) {
      btn.addEventListener('click', function () { show(current - 1); });
    });

    // date picker: auto-select "tomorrow" as default + set min
    var dateInput = document.getElementById('booking-date');
    if (dateInput) {
      var min = new Date(Date.now() + 86400000);
      var iso = min.toISOString().split('T')[0];
      dateInput.min = iso;
      if (!dateInput.value) dateInput.value = iso;
      var label = document.getElementById('booking-date-label');
      if (label) {
        label.textContent = new Date(iso).toLocaleDateString('id-ID', {
          weekday: 'long', day: 'numeric', month: 'long', year: 'numeric'
        });
      }
      dateInput.addEventListener('change', function () {
        if (label) {
          label.textContent = new Date(this.value).toLocaleDateString('id-ID', {
            weekday: 'long', day: 'numeric', month: 'long', year: 'numeric'
          });
        }
      });
    }

    // summary builder
    function fillSummary() {
      var getVal = function (name) {
        var el = wizard.querySelector('[name="' + name + '"]:checked') || wizard.querySelector('[name="' + name + '"]');
        return el ? (el.getAttribute('data-label') || el.value || '') : '';
      };
      var map = {
        'summary-service': getVal('service'),
        'summary-consultant': getVal('consultant'),
        'summary-date': document.getElementById('booking-date-label')
          ? document.getElementById('booking-date-label').textContent
          : '',
        'summary-time': getVal('time'),
        'summary-name': getVal('client_name'),
        'summary-company': getVal('company_name'),
        'summary-email': getVal('email'),
        'summary-phone': getVal('phone'),
      };
      Object.keys(map).forEach(function (id) {
        var el = document.getElementById(id);
        if (el) el.textContent = map[id];
      });
    }

    show(0);
  }

  /* ---------- CSRF helper ---------- */
  function csrfToken() {
    var meta = document.querySelector('meta[name="csrf-token"]');
    return meta ? meta.getAttribute('content') : '';
  }

  /* ---------- Contact form ---------- */
  var contactForm = document.getElementById('contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      if (!contactForm.checkValidity()) {
        contactForm.reportValidity();
        return;
      }
      var button = contactForm.querySelector('[type="submit"]');
      var original = button.innerHTML;
      var errorBox = document.getElementById('contact-error');
      if (errorBox) { errorBox.classList.add('hidden'); errorBox.textContent = ''; }
      button.disabled = true;
      button.innerHTML = 'Mengirim...';

      var payload = {};
      Array.prototype.forEach.call(contactForm.querySelectorAll('[name]'), function (el) {
        payload[el.name] = el.value.trim();
      });

      fetch('/kontak', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': csrfToken()
        },
        body: JSON.stringify(payload)
      })
        .then(function (r) {
          return r.json().then(function (b) { return { ok: r.ok, body: b }; });
        })
        .then(function (res) {
          if (res.ok) {
            contactForm.reset();
            var success = document.getElementById('contact-success');
            if (success) success.classList.remove('hidden');
          } else {
            var msg = (res.body && res.body.message) || 'Terjadi kesalahan. Silakan coba lagi.';
            if (res.body && res.body.errors) {
              var keys = Object.keys(res.body.errors);
              if (keys.length) msg = res.body.errors[keys[0]][0];
            }
            if (errorBox) { errorBox.textContent = msg; errorBox.classList.remove('hidden'); }
          }
        })
        .catch(function () {
          if (errorBox) {
            errorBox.textContent = 'Gagal terhubung ke server. Silakan coba lagi.';
            errorBox.classList.remove('hidden');
          }
        })
        .finally(function () {
          button.disabled = false;
          button.innerHTML = original;
        });
    });
  }

  /* ---------- Newsletter & other demo forms ---------- */
  document.querySelectorAll('[data-fake-submit]').forEach(function (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      if (!form.checkValidity()) {
        form.reportValidity();
        return;
      }
      var target = form.getAttribute('data-fake-submit');
      var success = document.getElementById(target);
      var button = form.querySelector('[type="submit"]');
      if (button) {
        var original = button.innerHTML;
        button.disabled = true;
        button.innerHTML = 'Mengirim...';
        setTimeout(function () {
          button.disabled = false;
          button.innerHTML = original;
          form.reset();
          if (success) success.classList.remove('hidden');
        }, 900);
      }
    });
  });

  /* ---------- Case study (portofolio) filter ---------- */
  var filters = document.querySelectorAll('.case-filter');
  var cards = document.querySelectorAll('.case-card');
  if (filters.length && cards.length) {
    var activeClasses = 'bg-brand-950 text-white border-brand-950';
    var inactiveClasses = 'bg-white border-slate-200 text-slate-600 hover:border-blue-600 hover:text-blue-600';

    function applyFilter(filter) {
      var visible = 0;
      cards.forEach(function (card) {
        var show = filter === 'all' || card.getAttribute('data-industry') === filter;
        card.style.display = show ? '' : 'none';
        if (show) {
          visible++;
          card.classList.add('active');
        } else {
          card.classList.remove('active');
        }
      });
      filters.forEach(function (btn) {
        var active = btn.getAttribute('data-filter') === filter;
        btn.classList.toggle('bg-brand-950', active);
        btn.classList.toggle('text-white', active);
        btn.classList.toggle('border-brand-950', active);
        btn.classList.toggle('bg-white', !active);
        btn.classList.toggle('border-slate-200', !active);
        btn.classList.toggle('text-slate-600', !active);
        btn.setAttribute('aria-pressed', active ? 'true' : 'false');
      });
      return visible;
    }

    filters.forEach(function (btn) {
      btn.addEventListener('click', function () {
        applyFilter(btn.getAttribute('data-filter'));
      });
    });

    // Respect ?kategori=... deep link (e.g. /portofolio?kategori=Ritel)
    var params = new URLSearchParams(window.location.search);
    var initial = params.get('kategori');
    var valid = initial && Array.prototype.some.call(filters, function (f) {
      return f.getAttribute('data-filter') === initial;
    });
    if (valid) applyFilter(initial);
  }

  /* ---------- Footer year ---------- */
  var yearEl = document.getElementById('year');
  if (yearEl) yearEl.textContent = new Date().getFullYear();
})();
