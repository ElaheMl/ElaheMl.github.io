(() => {
    "use strict";

    const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    const connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
    const saveData = !!(connection && (connection.saveData || /2g/i.test(connection.effectiveType || "")));
    const lightMode = reduceMotion || saveData;

    document.documentElement.classList.toggle("motion-lite", lightMode);

    /* ---------- Mobile menu ---------- */
    const menuToggle = document.querySelector(".menu-toggle");
    const mobileMenu = document.querySelector(".mobile-menu");
    const overlay = document.querySelector(".nav-overlay");
    const menuClose = document.querySelector(".menu-close");
    const mobileLinks = document.querySelectorAll(".mobile-links a");
    const navbar = document.querySelector(".navbar");

    const closeMenu = () => {
        mobileMenu?.classList.remove("active");
        overlay?.classList.remove("active");
        navbar?.classList.remove("hide-navbar");
        document.body.classList.remove("menu-open");
    };

    const openMenu = () => {
        mobileMenu?.classList.add("active");
        overlay?.classList.add("active");
        navbar?.classList.add("hide-navbar");
        document.body.classList.add("menu-open");
    };

    menuToggle?.addEventListener("click", openMenu);
    menuClose?.addEventListener("click", closeMenu);
    overlay?.addEventListener("click", closeMenu);
    mobileLinks.forEach((link) => link.addEventListener("click", closeMenu));

    /* ---------- Reveal sections (one observer) ---------- */
    const revealMap = [
        [".stats-section", 0.35],
        [".about-section", 0.2],
        [".services-section", 0.25],
        [".banner-section", 0.3],
        [".skills-section", 0.25],
        [".projects-section", 0.2],
        [".contact-section", 0.3],
        [".footer-section", 0.1],
    ];

    const runStatsCounter = (section) => {
        section.querySelectorAll(".stats-item").forEach((item, index) => {
            window.setTimeout(() => {
                item.classList.add("is-in-view");
                const number = item.querySelector(".stats-content h3");
                if (!number || number.classList.contains("counted")) return;

                number.classList.add("counted");
                const original = number.textContent.trim();
                const target = parseInt(original, 10);
                if (Number.isNaN(target)) return;
                const symbol = original.replace(String(target), "");

                if (lightMode) {
                    number.textContent = target + symbol;
                    return;
                }

                const duration = 1200;
                const startTime = performance.now();

                const tick = (time) => {
                    let progress = (time - startTime) / duration;
                    if (progress > 1) progress = 1;
                    const ease = 1 - Math.pow(1 - progress, 4);
                    number.textContent = Math.floor(target * ease) + symbol;
                    if (progress < 1) requestAnimationFrame(tick);
                    else number.textContent = target + symbol;
                };

                requestAnimationFrame(tick);
            }, lightMode ? 0 : index * 120);
        });
    };

    if ("IntersectionObserver" in window) {
        const io = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;
                    const el = entry.target;
                    el.classList.add("active", "is-in-view");
                    if (el.classList.contains("stats-section")) runStatsCounter(el);
                    if (el.classList.contains("about-section")) el.classList.add("active");
                    io.unobserve(el);
                });
            },
            { rootMargin: "0px 0px -8% 0px", threshold: 0.15 }
        );

        revealMap.forEach(([selector]) => {
            const el = document.querySelector(selector);
            if (el) io.observe(el);
        });
    } else {
        revealMap.forEach(([selector]) => {
            document.querySelector(selector)?.classList.add("active", "is-in-view");
        });
        const stats = document.querySelector(".stats-section");
        if (stats) runStatsCounter(stats);
    }

    /* ---------- Hero parallax (rAF + lite skip) ---------- */
    const hero = document.querySelector(".hero-section") || document.querySelector(".hero");
    const heroContent = document.querySelector(".hero-content");
    const heroBg = document.querySelector(".hero-background") || document.querySelector(".hero-bg");

    if (hero && !lightMode) {
        let ticking = false;

        const animateHero = () => {
            const scrollY = window.scrollY || window.pageYOffset;
            const progress = Math.min(scrollY / Math.max(hero.offsetHeight, 1), 1);

            if (heroContent) {
                heroContent.style.transform = `translate3d(0, ${progress * -48}px, 0)`;
                heroContent.style.opacity = String(1 - progress * 0.55);
            }

            if (heroBg) {
                heroBg.style.transform = `translate3d(0, ${scrollY * 0.08}px, 0) scale(${1 + progress * 0.04})`;
            }

            ticking = false;
        };

        window.addEventListener(
            "scroll",
            () => {
                if (ticking) return;
                ticking = true;
                requestAnimationFrame(animateHero);
            },
            { passive: true }
        );

        animateHero();
    }

    /* ---------- Cursor effect (desktop + not lite) ---------- */
    if (!lightMode && window.matchMedia("(pointer: fine)").matches) {
        const spotlight = document.createElement("div");
        spotlight.className = "cursor-spotlight";
        document.body.appendChild(spotlight);

        let mouseX = window.innerWidth / 2;
        let mouseY = window.innerHeight / 2;
        let spotlightX = mouseX;
        let spotlightY = mouseY;
        let lastParticle = 0;

        const animateSpotlight = () => {
            spotlightX += (mouseX - spotlightX) * 0.1;
            spotlightY += (mouseY - spotlightY) * 0.1;
            spotlight.style.transform = `translate3d(${spotlightX}px, ${spotlightY}px, 0) translate(-50%, -50%)`;
            requestAnimationFrame(animateSpotlight);
        };

        animateSpotlight();

        document.addEventListener(
            "mousemove",
            (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;

                const now = performance.now();
                if (now - lastParticle < 70) return;
                lastParticle = now;

                const particle = document.createElement("div");
                particle.className = "cursor-particle";
                particle.style.left = `${e.clientX + (Math.random() - 0.5) * 8}px`;
                particle.style.top = `${e.clientY + (Math.random() - 0.5) * 8}px`;
                const size = 1.5 + Math.random() * 2;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                document.body.appendChild(particle);
                window.setTimeout(() => particle.remove(), 650);
            },
            { passive: true }
        );
    }

    /* ---------- Contact form ---------- */
    const contactForm = document.getElementById("contactForm");
    const successModal = document.getElementById("successModal");
    const successModalClose = document.getElementById("successModalClose");

    const closeModal = () => {
        successModal?.classList.remove("active");
        successModal?.setAttribute("aria-hidden", "true");
    };

    contactForm?.addEventListener("submit", async (e) => {
        e.preventDefault();
        const button = contactForm.querySelector(".contact-btn");
        const originalHTML = button?.innerHTML;
        if (button) {
            button.disabled = true;
            button.innerHTML = "Sending...";
        }

        try {
            const response = await fetch("https://api.web3forms.com/submit", {
                method: "POST",
                body: new FormData(contactForm),
            });
            const result = await response.json();

            if (response.ok && result.success) {
                contactForm.reset();
                successModal?.classList.add("active");
                successModal?.setAttribute("aria-hidden", "false");
            } else {
                alert(result.message || "Message could not be sent.");
            }
        } catch (error) {
            console.error("Web3Forms error:", error);
            alert("Something went wrong. Please try again.");
        } finally {
            if (button) {
                button.disabled = false;
                button.innerHTML = originalHTML;
            }
        }
    });

    successModalClose?.addEventListener("click", closeModal);
    successModal?.addEventListener("click", (e) => {
        if (e.target === successModal) closeModal();
    });

    /* ---------- Service worker ---------- */
    if ("serviceWorker" in navigator) {
        window.addEventListener("load", () => {
            navigator.serviceWorker.register("./sw.js").catch(() => {});
        });
    }
})();

window.copyPhoneNumber = function copyPhoneNumber() {
    const number = "+989962262487";
    if (navigator.clipboard?.writeText) {
        navigator.clipboard.writeText(number);
        return;
    }
    const input = document.createElement("input");
    input.value = number;
    document.body.appendChild(input);
    input.select();
    document.execCommand("copy");
    input.remove();
};
