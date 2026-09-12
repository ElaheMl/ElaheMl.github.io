<?php

$content = require __DIR__ . '/../config/content.php';

?>

<section id="hero" class="hero-section">


    <!-- =========================
         DESKTOP HERO
    ========================== -->

    <div class="hero-desktop">


        <picture class="hero-background">

            <img
                src="assets/images/hero-desktop.webp"
                alt="Software Engineer Hero Background">

        </picture>



        <div class="hero-overlay">


            <div class="container">


                <div class="hero-content">


                    <!-- BADGE -->

                    <span class="hero-badge">

                        <?= htmlspecialchars($content['hero']['badge']) ?>

                    </span>



                    <!-- TITLE -->

                    <h1 class="hero-title">

                        <?= htmlspecialchars($content['hero']['title']) ?>

                        <span>
                            <?= htmlspecialchars($content['hero']['highlight']) ?>
                        </span>

                    </h1>



                    <!-- TEXT -->

                    <p class="hero-text">

                        <?= htmlspecialchars($content['hero']['text']) ?>

                    </p>



                    <!-- BUTTONS -->

                    <div class="hero-buttons">


                        <a href="#projects" class="custom-btn">

                            <?= htmlspecialchars($content['hero']['primary_button']) ?>

                        </a>



                        <a
                            href="./assets/files/Elahe-Maashi-CV.pdf"
                            class="hero-outline-btn"
                            download>

                            <?= htmlspecialchars($content['hero']['secondary_button']) ?>

                        </a>


                    </div>


                </div>


            </div>


        </div>


    </div>





    <!-- =========================
         MOBILE HERO
    ========================== -->

    <div class="hero-mobile">


        <div class="hero-mobile-image">


            <img
                src="assets/images/hero-mobile.webp"
                alt="Mobile Hero Image">


        </div>




        <div class="hero-mobile-content">



            <!-- BADGE -->

            <span class="hero-badge">

                <?= htmlspecialchars($content['hero']['badge']) ?>

            </span>




            <!-- TITLE -->

            <h1 class="hero-title">

                <?= htmlspecialchars($content['hero']['title']) ?>

                <span>
                    <?= htmlspecialchars($content['hero']['highlight']) ?>
                </span>

            </h1>




            <!-- TEXT -->

            <p class="hero-text">

                <?= htmlspecialchars($content['hero']['text']) ?>

            </p>




            <!-- BUTTONS -->

            <div class="hero-buttons">


                <a href="#projects" class="custom-btn">

                    <?= htmlspecialchars($content['hero']['primary_button']) ?>

                </a>



                <a
                    href="./assets/files/Elahe-Maashi-CV.pdf"
                    class="hero-outline-btn"
                    download>

                    <?= htmlspecialchars($content['hero']['secondary_button']) ?>

                </a>


            </div>


        </div>


    </div>



</section>