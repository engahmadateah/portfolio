import AOS from 'aos'
import 'aos/dist/aos.css'
import Lenis from 'lenis'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import GLightbox from 'glightbox'
import 'glightbox/dist/css/glightbox.min.css'
import { Notyf } from 'notyf'
import 'notyf/notyf.min.css'

gsap.registerPlugin(ScrollTrigger)

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches
const isTouch = window.matchMedia('(pointer: coarse)').matches

/* ---------------------------------------------------------
   Navbar — shrinks and gets more opaque once you scroll past
   the hero, and highlights whichever section is in view
--------------------------------------------------------- */
const siteNav = document.getElementById('site-nav')
const siteNavRow = document.getElementById('site-nav-row')

if (siteNav && siteNavRow) {
    const applyNavScrollState = () => {
        const scrolled = window.scrollY > 40

        siteNav.classList.toggle('bg-slate-900/95', scrolled)
        siteNav.classList.toggle('bg-slate-900/15', !scrolled)
        siteNav.classList.toggle('shadow-lg', scrolled)
        siteNav.classList.toggle('shadow-black/20', scrolled)
        siteNavRow.classList.toggle('py-3', scrolled)
        siteNavRow.classList.toggle('py-5', !scrolled)
    }

    applyNavScrollState()
    window.addEventListener('scroll', applyNavScrollState, { passive: true })
}

const navLinks = document.querySelectorAll('[data-nav-link]')

if (navLinks.length) {
    const setActiveNavLink = (id) => {
        navLinks.forEach((link) => {
            const isActive = link.dataset.navLink === id
            link.classList.toggle('text-cyan-400', isActive)
            link.querySelector('.nav-underline')?.classList.toggle('w-full', isActive)
            link.querySelector('.nav-underline')?.classList.toggle('w-0', !isActive)
        })
    }

    const sectionObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) setActiveNavLink(entry.target.id)
            })
        },
        { rootMargin: '-45% 0px -50% 0px' }
    )

    navLinks.forEach((link) => {
        const section = document.getElementById(link.dataset.navLink)
        if (section) sectionObserver.observe(section)
    })
}

/* ---------------------------------------------------------
   Hero background — soft parallax that follows the cursor
--------------------------------------------------------- */
const heroSection = document.querySelector('[data-hero-parallax]')

if (heroSection && !prefersReducedMotion && !isTouch) {
    const layers = heroSection.querySelectorAll('[data-parallax-depth]')

    const moveLayers = gsap.utils.toArray(layers).map((layer) =>
        gsap.quickTo(layer, 'x', { duration: 0.8, ease: 'power3.out' })
    )
    const moveLayersY = gsap.utils.toArray(layers).map((layer) =>
        gsap.quickTo(layer, 'y', { duration: 0.8, ease: 'power3.out' })
    )

    heroSection.addEventListener('mousemove', (e) => {
        const rect = heroSection.getBoundingClientRect()
        const px = (e.clientX - rect.left) / rect.width - 0.5
        const py = (e.clientY - rect.top) / rect.height - 0.5

        layers.forEach((layer, i) => {
            const depth = parseFloat(layer.dataset.parallaxDepth) || 10
            moveLayers[i](px * depth)
            moveLayersY[i](py * depth)
        })
    })

    heroSection.addEventListener('mouseleave', () => {
        layers.forEach((layer, i) => {
            moveLayers[i](0)
            moveLayersY[i](0)
        })
    })
}

/* ---------------------------------------------------------
   Page loader — fades out once everything has loaded
--------------------------------------------------------- */
window.addEventListener('load', () => {
    const loader = document.getElementById('page-loader')
    if (!loader) return

    setTimeout(() => {
        loader.classList.add('opacity-0', 'scale-110')
        setTimeout(() => loader.remove(), 700)
    }, prefersReducedMotion ? 0 : 1200)
})

/* ---------------------------------------------------------
   Project gallery lightbox (only present on project pages)
--------------------------------------------------------- */
if (document.querySelector('.glightbox')) {
    GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
        zoomable: true,
        openEffect: 'zoom',
        closeEffect: 'fade',
    })
}

/* ---------------------------------------------------------
   Reading progress bar (blog article pages only)
--------------------------------------------------------- */
const progressBar = document.getElementById('reading-progress')
const article = document.getElementById('article-content')

if (progressBar && article) {
    if (prefersReducedMotion) {
        progressBar.style.transform = 'scaleX(1)'
    } else {
        ScrollTrigger.create({
            trigger: article,
            start: 'top top',
            end: 'bottom bottom',
            scrub: 0.3,
            onUpdate: (self) => {
                progressBar.style.transform = `scaleX(${self.progress})`
            },
        })
    }
}

/* ---------------------------------------------------------
   Menu + theme (unchanged behaviour, just guarded)
--------------------------------------------------------- */
window.toggleMenu = function () {
    const menu = document.getElementById('mobile-menu')
    if (menu) menu.classList.toggle('hidden')
}

window.toggleTheme = function () {
    const html = document.documentElement

    if (html.classList.contains('light')) {
        html.classList.remove('light')
        localStorage.setItem('theme', 'dark')
    } else {
        html.classList.add('light')
        localStorage.setItem('theme', 'light')
    }

    ScrollTrigger.refresh()
}

document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('theme') === 'light') {
        document.documentElement.classList.add('light')
    }
})

/* ---------------------------------------------------------
   Project / testimonial carousel
--------------------------------------------------------- */
const track = document.getElementById('track')
const nextBtn = document.getElementById('nextBtn')
const prevBtn = document.getElementById('prevBtn')

if (track && nextBtn && prevBtn) {
    nextBtn.onclick = () => track.scrollBy({ left: 350, behavior: 'smooth' })
    prevBtn.onclick = () => track.scrollBy({ left: -350, behavior: 'smooth' })
}

/* ---------------------------------------------------------
   Smooth inertia scrolling (desktop only — mobile keeps
   native scroll for better touch responsiveness)
--------------------------------------------------------- */
let lenis = null

if (!prefersReducedMotion && !isTouch) {
    lenis = new Lenis({
        duration: 1.1,
        smoothWheel: true,
    })

    lenis.on('scroll', ScrollTrigger.update)

    gsap.ticker.add((time) => {
        lenis.raf(time * 1000)
    })

    gsap.ticker.lagSmoothing(0)
}

/* ---------------------------------------------------------
   Scroll-reveal (AOS) — subtle, fast, plays once
--------------------------------------------------------- */
AOS.init({
    duration: 700,
    easing: 'ease-out-cubic',
    once: true,
    offset: 60,
    disable: prefersReducedMotion,
})

window.addEventListener('load', () => AOS.refresh())

/* ---------------------------------------------------------
   Hero entrance — staggered reveal of the first screen
--------------------------------------------------------- */
if (!prefersReducedMotion) {
    gsap.from('[data-hero-in]', {
        y: 24,
        opacity: 0,
        duration: 0.9,
        ease: 'power3.out',
        stagger: 0.12,
        delay: 0.15,
    })
}

/* ---------------------------------------------------------
   Animated counters (stats section) — counts up once
   when it scrolls into view
--------------------------------------------------------- */
document.querySelectorAll('[data-counter]').forEach((el) => {
    const target = parseFloat(el.dataset.counter)
    const suffix = el.dataset.counterSuffix || ''
    const decimals = el.dataset.counter.includes('.') ? 1 : 0

    if (prefersReducedMotion) {
        el.textContent = target.toFixed(decimals) + suffix
        return
    }

    const counter = { value: 0 }

    ScrollTrigger.create({
        trigger: el,
        start: 'top 85%',
        once: true,
        onEnter: () => {
            gsap.to(counter, {
                value: target,
                duration: 1.6,
                ease: 'power2.out',
                onUpdate: () => {
                    el.textContent = counter.value.toFixed(decimals) + suffix
                },
            })
        },
    })
})

/* ---------------------------------------------------------
   Magnetic buttons — pulls toward the cursor on hover
--------------------------------------------------------- */
if (!prefersReducedMotion && !isTouch) {
    document.querySelectorAll('.magnetic').forEach((el) => {
        const strength = 18

        el.addEventListener('mousemove', (e) => {
            const rect = el.getBoundingClientRect()
            const mx = (e.clientX - rect.left - rect.width / 2) / rect.width * strength
            const my = (e.clientY - rect.top - rect.height / 2) / rect.height * strength
            el.style.setProperty('--mx', `${mx}px`)
            el.style.setProperty('--my', `${my}px`)
        })

        el.addEventListener('mouseleave', () => {
            el.style.setProperty('--mx', '0px')
            el.style.setProperty('--my', '0px')
        })
    })
}

/* ---------------------------------------------------------
   Tilt cards — subtle 3D tilt following the cursor
--------------------------------------------------------- */
if (!prefersReducedMotion && !isTouch) {
    document.querySelectorAll('.tilt-card').forEach((el) => {
        const max = 6

        el.addEventListener('mousemove', (e) => {
            const rect = el.getBoundingClientRect()
            const px = (e.clientX - rect.left) / rect.width
            const py = (e.clientY - rect.top) / rect.height
            const ry = (px - 0.5) * max * 2
            const rx = (0.5 - py) * max * 2
            el.style.setProperty('--rx', `${rx}deg`)
            el.style.setProperty('--ry', `${ry}deg`)
        })

        el.addEventListener('mouseleave', () => {
            el.style.setProperty('--rx', '0deg')
            el.style.setProperty('--ry', '0deg')
        })
    })
}

/* ---------------------------------------------------------
   Cursor glow — soft light that follows the pointer
--------------------------------------------------------- */
if (!prefersReducedMotion && !isTouch) {
    const glow = document.getElementById('cursor-glow')

    if (glow) {
        window.addEventListener('mousemove', (e) => {
            glow.classList.add('is-active')
            glow.style.setProperty('--x', `${e.clientX}px`)
            glow.style.setProperty('--y', `${e.clientY}px`)
        })

        window.addEventListener('mouseleave', () => glow.classList.remove('is-active'))
    }
}

/* ---------------------------------------------------------
   Toast notifications (Notyf) — elegant pop-ups that appear
   on screen wherever the visitor currently is
--------------------------------------------------------- */
const TOAST_DURATION = 6000

const notyf = new Notyf({
    duration: TOAST_DURATION,
    position: { x: 'center', y: 'top' },
    dismissible: true,
    ripple: false,
    types: [
        {
            type: 'success',
            background: '#0f172a',
            icon: { className: 'fa-solid fa-circle-check', tagName: 'i' },
        },
        {
            type: 'error',
            background: '#0f172a',
            icon: { className: 'fa-solid fa-circle-exclamation', tagName: 'i' },
        },
    ],
})

const escapeHtml = (value) =>
    String(value ?? '').replace(/[&<>"']/g, (c) => ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#39;',
    }[c]))

window.showToast = function (type, title, text = '') {
    notyf.open({
        type,
        message:
            `<div class="toast-title">${escapeHtml(title)}</div>` +
            (text ? `<div class="toast-text">${text}</div>` : ''),
    })
}

/* Flash messages from a normal (non-AJAX) redirect */
if (window.__flash) {
    const flash = window.__flash

    // wait until the page loader has finished
    setTimeout(() => {
        if (flash.success) window.showToast('success', flash.successTitle, escapeHtml(flash.success))
        else if (flash.error) window.showToast('error', flash.errorTitle, escapeHtml(flash.error))
    }, prefersReducedMotion ? 300 : 1900)
}

/* ---------------------------------------------------------
   Contact form — sends via fetch so the page never reloads
   or jumps, then shows a success / error toast
--------------------------------------------------------- */
const contactForm = document.getElementById('contactForm')

if (contactForm) {
    const submitBtn = document.getElementById('submitBtn')
    const btnNormal = document.getElementById('btnNormal')
    const btnSending = document.getElementById('btnSending')
    const msg = contactForm.dataset
    let busy = false

    const setBusy = (state) => {
        busy = state
        submitBtn.disabled = state
        btnNormal.classList.toggle('hidden', state)
        btnSending.classList.toggle('hidden', !state)
        btnSending.classList.toggle('flex', state)
    }

    const clearErrors = () => {
        contactForm.querySelectorAll('[data-field-error]').forEach((el) => el.remove())
        contactForm.querySelectorAll('.field-invalid').forEach((el) => el.classList.remove('field-invalid'))
    }

    const showFieldErrors = (errors) => {
        let firstField = null

        Object.entries(errors).forEach(([name, messages]) => {
            const field = contactForm.querySelector(`[name="${name}"]`)
            if (!field) return

            firstField = firstField || field
            field.classList.add('field-invalid')

            const p = document.createElement('p')
            p.dataset.fieldError = ''
            p.className = 'text-red-400 text-sm mt-2'
            p.textContent = messages[0]
            field.parentElement.appendChild(p)
        })

        if (firstField) firstField.focus({ preventScroll: true })
    }

    // remove the red state as soon as the visitor edits the field
    contactForm.addEventListener('input', (e) => {
        const field = e.target
        if (!field.classList?.contains('field-invalid')) return

        field.classList.remove('field-invalid')
        field.parentElement.querySelector('[data-field-error]')?.remove()
    })

    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault()
        if (busy) return

        clearErrors()

        if (!contactForm.checkValidity()) {
            contactForm.reportValidity()
            return
        }

        setBusy(true)
        const startedAt = performance.now()

        // keep the "sending" animation visible for a moment even on fast responses
        const settle = () =>
            new Promise((resolve) =>
                setTimeout(resolve, Math.max(0, 1100 - (performance.now() - startedAt)))
            )

        try {
            const response = await fetch(contactForm.action, {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: new FormData(contactForm),
                credentials: 'same-origin',
            })

            const data = await response.json().catch(() => ({}))
            await settle()

            if (response.ok && data.success === true) {
                contactForm.reset()
                window.showToast('success', msg.successTitle, escapeHtml(data.message || msg.successText))
            } else if (response.status === 422 && data.errors) {
                showFieldErrors(data.errors)

                const list = Object.values(data.errors)
                    .map((m) => m[0])
                    .slice(0, 3)
                    .map(escapeHtml)
                    .join('<br>')

                window.showToast('error', msg.errorTitle, list || escapeHtml(msg.validationText))
            } else if (response.status === 419) {
                window.showToast('error', msg.errorTitle, escapeHtml(msg.sessionText))
            } else {
                window.showToast('error', msg.errorTitle, escapeHtml(data.message || msg.serverText))
            }
        } catch (error) {
            await settle()
            window.showToast('error', msg.errorTitle, escapeHtml(msg.networkText))
        } finally {
            setBusy(false)
        }
    })
}
