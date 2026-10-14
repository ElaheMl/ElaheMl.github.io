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


/* ---------- Projects: swipe dots + shared viewer ---------- */
(() => {
    const track = document.getElementById("projectsTrack");
    if (!track) return;

    const cards = Array.from(track.querySelectorAll(".project-card"));
    if (!cards.length) return;

    const dotsWrap = document.getElementById("projectsDots");
    const dots = dotsWrap ? Array.from(dotsWrap.querySelectorAll(".projects-dot")) : [];

    let activeIndex = 0;

    const updateDots = () => {
        dots.forEach((dot, i) => {
            dot.classList.toggle("is-active", i === activeIndex);
        });
    };

    const getActiveIndex = () => {
        const trackRect = track.getBoundingClientRect();
        const centerX = trackRect.left + trackRect.width * 0.35;
        let closest = 0;
        let minDist = Infinity;
        cards.forEach((card, i) => {
            const r = card.getBoundingClientRect();
            const dist = Math.abs(r.left - centerX);
            if (dist < minDist) {
                minDist = dist;
                closest = i;
            }
        });
        return closest;
    };

    const onScroll = () => {
        const idx = getActiveIndex();
        if (idx !== activeIndex) {
            activeIndex = idx;
            updateDots();
        }
    };

    track.addEventListener("scroll", onScroll, { passive: true });
    updateDots();

    dots.forEach((dot) => {
        dot.addEventListener("click", () => {
            const i = Number(dot.dataset.dotIndex);
            if (Number.isNaN(i) || !cards[i]) return;
            cards[i].scrollIntoView({ behavior: "smooth", inline: "start", block: "nearest" });
            activeIndex = i;
            updateDots();
        });
    });

    let resizeTimer;
    window.addEventListener("resize", () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            activeIndex = getActiveIndex();
            updateDots();
        }, 120);
    });

    /* Shared Project Viewer (desktop + mobile) */
    const viewer = document.getElementById("projectViewer");
    if (!viewer) return;

    const viewerMedia = document.getElementById("projectViewerMedia");
    const viewerImg = document.getElementById("projectViewerImage");
    const viewerTitle = document.getElementById("projectViewerTitle");
    const viewerDesc = document.getElementById("projectViewerDesc");
    const viewerLink = document.getElementById("projectViewerLink");
    const zoomHint = document.getElementById("projectViewerZoomHint");
    const btnPrev = document.getElementById("projectViewerPrev");
    const btnNext = document.getElementById("projectViewerNext");

    let viewerIndex = 0;

    /* ---- Zoom state ---- */
    let scale = 1;
    let posX = 0;
    let posY = 0;
    let isPanning = false;
    let panStartX = 0;
    let panStartY = 0;
    let originX = 0;
    let originY = 0;
    let pinchStartDist = 0;
    let pinchStartScale = 1;
    let lastTapTime = 0;

    const MIN_SCALE = 1;
    const MAX_SCALE = 3;
    const ZOOM_STEP = 0.2;

    const hasLiveUrl = (url) => {
        if (!url) return false;
        const v = String(url).trim();
        return v !== "" && v !== "#";
    };

    const applyZoomTransform = (animate) => {
        if (!viewerImg) return;
        if (!animate) viewerMedia?.classList.add("is-panning");
        viewerImg.style.transform = `translate(${posX}px, ${posY}px) scale(${scale})`;
        if (!animate) {
            requestAnimationFrame(() => viewerMedia?.classList.remove("is-panning"));
        }
        viewerMedia?.classList.toggle("is-zoomed", scale > 1.01);
        if (scale > 1.01) zoomHint?.classList.add("is-hidden");
    };

    const resetZoom = () => {
        scale = 1;
        posX = 0;
        posY = 0;
        isPanning = false;
        if (viewerImg) viewerImg.style.transform = "translate(0px, 0px) scale(1)";
        viewerMedia?.classList.remove("is-zoomed", "is-panning");
        zoomHint?.classList.remove("is-hidden");
    };

    const clampPan = () => {
        if (!viewerMedia || scale <= 1) {
            posX = 0;
            posY = 0;
            return;
        }
        const rect = viewerMedia.getBoundingClientRect();
        const maxX = ((scale - 1) * rect.width) / 2;
        const maxY = ((scale - 1) * rect.height) / 2;
        posX = Math.max(-maxX, Math.min(maxX, posX));
        posY = Math.max(-maxY, Math.min(maxY, posY));
    };

    const zoomAt = (clientX, clientY, nextScale) => {
        if (!viewerMedia) return;
        const rect = viewerMedia.getBoundingClientRect();
        const cx = clientX - rect.left - rect.width / 2;
        const cy = clientY - rect.top - rect.height / 2;
        const prev = scale;
        scale = Math.max(MIN_SCALE, Math.min(MAX_SCALE, nextScale));
        if (scale === prev) return;
        const ratio = scale / prev;
        posX = cx - (cx - posX) * ratio;
        posY = cy - (cy - posY) * ratio;
        if (scale <= 1) {
            posX = 0;
            posY = 0;
        } else {
            clampPan();
        }
        applyZoomTransform(true);
    };

    const readCard = (card) => ({
        title: card.dataset.title || "",
        description: card.dataset.description || "",
        image: card.dataset.image || "",
        url: (card.dataset.url || "").trim(),
    });

    const renderViewer = (index) => {
        const card = cards[index];
        if (!card) return;
        viewerIndex = index;
        const data = readCard(card);
        resetZoom();

        if (viewerImg) {
            viewerImg.style.opacity = "0";
            viewerImg.src = data.image;
            viewerImg.alt = data.title;
            requestAnimationFrame(() => {
                viewerImg.style.opacity = "1";
            });
        }
        if (viewerTitle) viewerTitle.textContent = data.title;
        if (viewerDesc) viewerDesc.textContent = data.description;

        if (viewerLink) {
            if (hasLiveUrl(data.url)) {
                viewerLink.hidden = false;
                viewerLink.href = data.url;
                viewerLink.setAttribute("target", "_blank");
                viewerLink.setAttribute("rel", "noopener noreferrer");
            } else {
                viewerLink.hidden = true;
                viewerLink.removeAttribute("href");
                viewerLink.removeAttribute("target");
                viewerLink.removeAttribute("rel");
            }
        }
    };

    const openViewer = (index) => {
        if (Number.isNaN(index) || index < 0 || index >= cards.length) return;
        renderViewer(index);
        viewer.classList.add("is-open");
        viewer.setAttribute("aria-hidden", "false");
        document.body.classList.add("project-viewer-open");
    };

    const closeViewer = () => {
        resetZoom();
        viewer.classList.remove("is-open");
        viewer.setAttribute("aria-hidden", "true");
        document.body.classList.remove("project-viewer-open");
    };

    /* Shared open handler: image + Preview buttons */
    const handleOpenTrigger = (e) => {
        const trigger = e.target.closest("[data-open-project]");
        if (!trigger || !track.contains(trigger)) return;
        e.preventDefault();
        e.stopPropagation();
        const i = Number(trigger.dataset.openProject);
        if (!Number.isNaN(i)) openViewer(i);
    };

    track.addEventListener("click", handleOpenTrigger);

    track.addEventListener("keydown", (e) => {
        if (e.key !== "Enter" && e.key !== " ") return;
        const trigger = e.target.closest("[data-open-project]");
        if (!trigger || !track.contains(trigger)) return;
        e.preventDefault();
        const i = Number(trigger.dataset.openProject);
        if (!Number.isNaN(i)) openViewer(i);
    });

    viewer.querySelectorAll("[data-viewer-close]").forEach((el) => {
        el.addEventListener("click", closeViewer);
    });

    btnPrev?.addEventListener("click", () => {
        renderViewer((viewerIndex - 1 + cards.length) % cards.length);
    });

    btnNext?.addEventListener("click", () => {
        renderViewer((viewerIndex + 1) % cards.length);
    });

    document.addEventListener("keydown", (e) => {
        if (!viewer.classList.contains("is-open")) return;
        if (e.key === "Escape") {
            if (scale > 1) {
                resetZoom();
                return;
            }
            closeViewer();
        }
        if (e.key === "ArrowLeft") {
            e.preventDefault();
            renderViewer((viewerIndex - 1 + cards.length) % cards.length);
        }
        if (e.key === "ArrowRight") {
            e.preventDefault();
            renderViewer((viewerIndex + 1) % cards.length);
        }
    });

    /* ---- Image zoom interactions ---- */
    if (viewerMedia) {
        viewerMedia.addEventListener("dblclick", (e) => {
            e.preventDefault();
            e.stopPropagation();
            if (scale > 1.01) resetZoom();
            else zoomAt(e.clientX, e.clientY, 2.2);
        });

        viewerMedia.addEventListener("wheel", (e) => {
            if (!viewer.classList.contains("is-open")) return;
            e.preventDefault();
            const delta = e.deltaY > 0 ? -ZOOM_STEP : ZOOM_STEP;
            zoomAt(e.clientX, e.clientY, scale + delta);
        }, { passive: false });

        viewerMedia.addEventListener("pointerdown", (e) => {
            if (scale <= 1.01) return;
            if (e.pointerType === "mouse" && e.button !== 0) return;
            isPanning = true;
            panStartX = e.clientX;
            panStartY = e.clientY;
            originX = posX;
            originY = posY;
            viewerMedia.classList.add("is-panning");
            viewerMedia.setPointerCapture?.(e.pointerId);
        });

        viewerMedia.addEventListener("pointermove", (e) => {
            if (!isPanning || scale <= 1.01) return;
            posX = originX + (e.clientX - panStartX);
            posY = originY + (e.clientY - panStartY);
            clampPan();
            applyZoomTransform(false);
        });

        const endPan = (e) => {
            if (!isPanning) return;
            isPanning = false;
            viewerMedia.classList.remove("is-panning");
            try {
                viewerMedia.releasePointerCapture?.(e.pointerId);
            } catch (_) {}
        };

        viewerMedia.addEventListener("pointerup", endPan);
        viewerMedia.addEventListener("pointercancel", endPan);

        /* Mobile double-tap */
        viewerMedia.addEventListener("touchend", (e) => {
            if (e.touches.length > 0) return;
            const now = Date.now();
            if (now - lastTapTime < 280 && e.changedTouches[0]) {
                e.preventDefault();
                const t = e.changedTouches[0];
                if (scale > 1.01) resetZoom();
                else zoomAt(t.clientX, t.clientY, 2.2);
                lastTapTime = 0;
            } else {
                lastTapTime = now;
            }
        }, { passive: false });

        /* Pinch zoom */
        viewerMedia.addEventListener("touchstart", (e) => {
            if (e.touches.length === 2) {
                e.preventDefault();
                const [a, b] = e.touches;
                pinchStartDist = Math.hypot(a.clientX - b.clientX, a.clientY - b.clientY);
                pinchStartScale = scale;
                isPanning = false;
            }
        }, { passive: false });

        viewerMedia.addEventListener("touchmove", (e) => {
            if (e.touches.length === 2) {
                e.preventDefault();
                const [a, b] = e.touches;
                const dist = Math.hypot(a.clientX - b.clientX, a.clientY - b.clientY);
                if (!pinchStartDist) return;
                const midX = (a.clientX + b.clientX) / 2;
                const midY = (a.clientY + b.clientY) / 2;
                zoomAt(midX, midY, pinchStartScale * (dist / pinchStartDist));
            }
        }, { passive: false });

        viewerMedia.addEventListener("touchend", (e) => {
            if (e.touches.length < 2) pinchStartDist = 0;
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
