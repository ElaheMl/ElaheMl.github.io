/* Service worker — cache-first for static assets (helps flaky Iran networks) */
const CACHE = "elahe-portfolio-v2";
const PRECACHE = [
    "./",
    "./index.html",
    "./assets/css/fonts.css",
    "./assets/css/icons.css",
    "./assets/css/style.css",
    "./assets/css/responsive.css",
    "./assets/css/animition.css",
    "./assets/js/main.js",
    "./assets/fonts/poppins-400.woff2",
    "./assets/fonts/poppins-500.woff2",
    "./assets/fonts/poppins-600.woff2",
    "./assets/fonts/poppins-700.woff2",
    "./assets/images/hero-desktop.webp",
    "./assets/images/hero-mobile.webp",
    "./assets/images/elix7.png",
];

self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open(CACHE).then((cache) => cache.addAll(PRECACHE)).then(() => self.skipWaiting())
    );
});

self.addEventListener("activate", (event) => {
    event.waitUntil(
        caches.keys().then((keys) =>
            Promise.all(keys.filter((k) => k !== CACHE).map((k) => caches.delete(k)))
        ).then(() => self.clients.claim())
    );
});

self.addEventListener("fetch", (event) => {
    const { request } = event;
    if (request.method !== "GET") return;

    const url = new URL(request.url);
    if (url.origin !== self.location.origin) return;

    event.respondWith(
        caches.match(request).then((cached) => {
            const network = fetch(request)
                .then((response) => {
                    if (response && response.status === 200 && response.type === "basic") {
                        const copy = response.clone();
                        caches.open(CACHE).then((cache) => cache.put(request, copy));
                    }
                    return response;
                })
                .catch(() => cached);

            return cached || network;
        })
    );
});
