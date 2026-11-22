<?php

$content = require __DIR__ . '/../config/content.php';

/* url خالی یا '#' = پروژه آنلاین نیست → دکمه Visit Project مخفی می‌شود
   images: آرایه عکس‌ها (حداقل یکی). برای آلبوم چندتایی فقط سوایپ؛ فلش اضافه نمی‌شود. */
$projects = [
    [
        'title'       => 'THE SAM — professional portfolio',
        'description' => 'A modern and professional developer portfolio designed to showcase skills and projects, featuring a clean UI, well-structured code. Built with a responsive layout focused on performance and usability.',
        'images'      => [
            './assets/images/portfolio/project-13.webp',
            './assets/images/portfolio/project-13(2).webp',
        ],
        'url'         => 'https://thesam912.github.io/',
    ],
    [
        'title'       => 'Ario Store — Beauty & Cosmetics E-commerce Website',
        'description' => 'Design and development of a luxury beauty and cosmetics e-commerce website, featuring elegant visuals, refined product categories, and a seamless shopping experience.',
        'images'      => [
            './assets/images/portfolio/project-15(2).webp',
            './assets/images/portfolio/project-15.webp',
        ],
        'url'         => 'https://froshgahario.ir',
    ],
    [
        'title'       => 'Venus Collection — Fashion E-commerce Website',
        'description' => 'Design and development of a responsive online store for clothing, bags, and shoes, focused on modern visuals and seamless shopping.',
        'images'      => [
            './assets/images/portfolio/project-12.webp',
        ],
        'url'         => 'https://venuscolection.ir',
    ],
    [
        'title'       => 'Lumira Beauty — UI/UX Design',
        'description' => 'UI/UX design for a luxury beauty and skincare e-commerce website, focused on elegant visuals, intuitive product discovery, and a seamless shopping experience.',
        'images'      => [
            './assets/images/portfolio/project-2.webp',
        ],
        'url'         => '',
    ],
    [
        'title'       => 'Red Luxe Cosmetics — UI/UX Design',
        'description' => 'UI/UX design for a luxury lipstick and cosmetics e-commerce website, focused on bold visuals, elegant product presentation, and a seamless shopping experience.',
        'images'      => [
            './assets/images/portfolio/project-3.webp',
        ],
        'url'         => '',
    ],
    [
        'title'       => 'Brew & Bean Café — UI/UX Design',
        'description' => 'UI/UX design for a café mobile app, featuring seamless coffee ordering, table reservations, secure payments, and a personalized experience wrapped in a warm, premium visual identity.',
        'images'      => [
            './assets/images/portfolio/project-1.webp',
        ],
        'url'         => '',
    ],
    [
        'title'       => 'ChicWove Fashion Store — UI/UX Design',
        'description' => 'UI/UX design for a fashion e-commerce website, combining elegant visuals, intuitive navigation, and a seamless shopping experience across desktop and mobile.',
        'images'      => [
            './assets/images/portfolio/project-8.webp',
        ],
        'url'         => '',
    ],
    [
        'title'       => 'YOGI Pet Shop — UI/UX Design',
        'description' => 'UI/UX design for a pet shop e-commerce website, combining a playful visual identity, intuitive product browsing, and a seamless shopping experience for pet owners.',
        'images'      => [
            './assets/images/portfolio/project-6.webp',
        ],
        'url'         => '',
    ],
    [
        'title'       => 'Luxeora Accessories Store — UI/UX Design',
        'description' => 'UI/UX design for a luxury accessories e-commerce website, focused on elegant visuals, intuitive navigation, and a seamless shopping experience across desktop and mobile.',
        'images'      => [
            './assets/images/portfolio/project-4.webp',
        ],
        'url'         => '',
    ],
    [
        'title'       => 'Zaferan Restaurant — Web Design',
        'description' => 'A modern restaurant website featuring bold visuals and a seamless user experience.UI/UX design for a luxury accessories e-commerce website, focused on elegant visuals, intuitive navigation, and a seamless shopping experience across desktop and mobile.',
        'images'      => [
            './assets/images/portfolio/project-7.webp',
        ],
        'url'         => '',
    ],
    [
        'title'       => 'Language Learning Platform — UI/UX Design',
        'description' => 'UI/UX design for a language learning platform, focused on intuitive navigation, engaging educational experiences, and a seamless journey across multiple languages and courses.',
        'images'      => [
            './assets/images/portfolio/project-10.webp',
        ],
        'url'         => '',
    ],
    [
        'title'       => 'Nestoria Real Estate — UI/UX Design',
        'description' => 'UI/UX design for a modern real estate platform, focused on premium property discovery, intuitive search experiences, and elegant, user-centered interfaces.',
        'images'      => [
            './assets/images/portfolio/project-5.webp',
        ],
        'url'         => '',
    ],
    [
        'title'       => 'Nafas Ara — Yoga Studio Website Design',
        'description' => 'UI/UX design for a yoga and wellness website, focused on a calming visual identity, elegant layouts, and an intuitive experience for discovering yoga classes, exploring programs, and connecting with instructors.20:11',
        'images'      => [
            './assets/images/portfolio/project-9.webp',
        ],
        'url'         => '',
    ],
    [
        'title'       => 'Digiseat — Luxury Watch E-commerce UI/UX',
        'description' => 'A premium e-commerce experience for luxury watches, featuring a sophisticated green-and-gold visual identity, elegant product showcases, and a responsive interface designed to enhance product discovery and online shopping.',
        'images'      => [
            './assets/images/portfolio/project-11.webp',
        ],
        'url'         => '',
    ],
];

?>

<style>
/* Fallback if style.css not loaded; primary styles are in style.css */
.project-viewer-zoom-hint { display: none !important; }
.project-viewer-album-counter { display: none !important; }
</style>

<section id="projects" class="projects-section">

    <!-- HEAD -->
    <div class="projects-head">

        <span class="section-tag">
            <span class="tag-dot"></span>
            <?= htmlspecialchars($content['projects']['tag']) ?>
        </span>

        <h2 class="projects-title">
            <?= htmlspecialchars($content['projects']['title']) ?>
            <span><?= htmlspecialchars($content['projects']['highlight']) ?></span>
        </h2>

        <!-- Swipe Hint (mobile only) — always visible -->
        <div class="projects-swipe-hint" id="projectsSwipeHint" aria-hidden="true">
            <span class="swipe-hint-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M8 13V7a2 2 0 1 1 4 0v6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 13V9a2 2 0 1 1 4 0v4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16 13v-1.5a2 2 0 1 1 4 0V16a5 5 0 0 1-5 5h-1.5a7.5 7.5 0 0 1-6.6-4L4 12.5a2 2 0 1 1 3-2.5L8 13" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
            <span class="swipe-hint-text">Swipe</span>
        </div>

    </div>

    <!-- TRACK / GRID -->
    <div class="projects-track" id="projectsTrack">

        <?php foreach ($projects as $i => $project):
            $thumb = $project['images'][0] ?? '';
            $imagesJson = htmlspecialchars(json_encode($project['images'], JSON_UNESCAPED_SLASHES), ENT_QUOTES);
            $imageCount = count($project['images']);
        ?>
        <article
            class="project-card"
            data-index="<?= (int) $i ?>"
            data-title="<?= htmlspecialchars($project['title'], ENT_QUOTES) ?>"
            data-description="<?= htmlspecialchars($project['description'], ENT_QUOTES) ?>"
            data-images="<?= $imagesJson ?>"
            data-url="<?= htmlspecialchars($project['url'], ENT_QUOTES) ?>"
        >
            <div class="project-card-media" data-open-project="<?= (int) $i ?>" role="button" tabindex="0" aria-label="Open <?= htmlspecialchars($project['title'], ENT_QUOTES) ?>">
                <div class="project-card-frame">
                    <img
                        src="<?= htmlspecialchars($thumb) ?>"
                        alt="<?= htmlspecialchars($project['title']) ?>"
                        width="1200"
                        height="900"
                        loading="lazy"
                        decoding="async"
                    >
                </div>

                <!-- Desktop hover overlay -->
                <div class="project-card-overlay">
                    <h3 class="project-overlay-title"><?= htmlspecialchars($project['title']) ?></h3>
                    <p class="project-overlay-desc"><?= htmlspecialchars($project['description']) ?></p>
                    <button type="button" class="project-preview-btn" data-open-project="<?= (int) $i ?>">
                        Preview
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>

                <?php if ($imageCount > 1): ?>
                <!-- Badge: multi-photo indicator (after overlay so it stays on top) -->
                <span class="project-album-badge" aria-label="<?= (int) $imageCount ?> photos">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <rect x="7" y="7" width="13" height="11" rx="2.2" stroke="currentColor" stroke-width="1.6"/>
                        <path d="M4.5 15.5V6.8A2.3 2.3 0 0 1 6.8 4.5h10.2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                    </svg>
                </span>
                <?php endif; ?>
            </div>

            <!-- Mobile info (always visible on mobile) -->
            <div class="project-card-body">
                <h3 class="project-card-title"><?= htmlspecialchars($project['title']) ?></h3>
                <p class="project-card-desc"><?= htmlspecialchars($project['description']) ?></p>
                <div class="project-card-actions">
                    <button type="button" class="project-preview-btn project-preview-btn--mobile" data-open-project="<?= (int) $i ?>">
                        Preview
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </article>
        <?php endforeach; ?>

    </div>

    <!-- Dot pagination (mobile only) -->
    <div class="projects-dots" id="projectsDots" aria-hidden="true" role="tablist">
        <?php foreach ($projects as $i => $project): ?>
        <button
            type="button"
            class="projects-dot<?= $i === 0 ? ' is-active' : '' ?>"
            data-dot-index="<?= (int) $i ?>"
            aria-label="Go to project <?= (int) ($i + 1) ?>"
        ></button>
        <?php endforeach; ?>
    </div>

</section>

<!-- Project Viewer Modal (desktop + mobile) -->
<div class="project-viewer" id="projectViewer" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Project viewer">
    <div class="project-viewer-backdrop" data-viewer-close></div>
    <div class="project-viewer-panel">
        <button type="button" class="project-viewer-close" data-viewer-close aria-label="Close viewer">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <button type="button" class="project-viewer-nav project-viewer-prev" id="projectViewerPrev" aria-label="Previous project">
            <i class="fa-solid fa-chevron-left"></i>
        </button>

        <div class="project-viewer-content">
            <div class="project-viewer-media" id="projectViewerMedia">
                <img src="" alt="" id="projectViewerImage" width="1200" height="900" draggable="false">
                <!-- Album thumbs (only when multi-image) — clickable, no arrows -->
                <div class="project-viewer-album-thumbs" id="projectViewerAlbumThumbs" hidden aria-hidden="true"></div>
            </div>
            <div class="project-viewer-info">
                <div class="project-viewer-info-top">
                    <div class="project-viewer-text">
                        <h3 class="project-viewer-title" id="projectViewerTitle"></h3>
                        <p class="project-viewer-desc" id="projectViewerDesc"></p>
                    </div>
                    <a href="#" class="project-viewer-link" id="projectViewerLink" target="_blank" rel="noopener noreferrer" hidden>
                        Visit Project
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
            </div>
        </div>

        <button type="button" class="project-viewer-nav project-viewer-next" id="projectViewerNext" aria-label="Next project">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>
</div>
