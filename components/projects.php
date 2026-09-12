<?php

$content = require __DIR__ . '/../config/content.php';

?>

<section id="projects" class="projects-section">


    <!-- HEAD -->

    <div class="projects-head">

        <span class="section-tag">

            <span class="tag-dot"></span>

            <?= htmlspecialchars($content['projects']['tag']) ?>

        </span>


        <h2 class="projects-title">

            <?= htmlspecialchars($content['projects']['title']) ?>

            <span>
                <?= htmlspecialchars($content['projects']['highlight']) ?>
            </span>

        </h2>

    </div>



    <!-- GRID -->

    <div class="projects-grid">


        <!-- ITEM -->

        <div class="project-card">

            <img src="./assets/images/project-1.webp">

        </div>



        <!-- ITEM -->

        <div class="project-card">

            <img src="./assets/images/project-2.webp">

        </div>



        <!-- ITEM -->

        <div class="project-card">

            <img src="./assets/images/project-3.webp">

        </div>


    </div>

</section>