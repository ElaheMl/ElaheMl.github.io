<?php

$content = require __DIR__ . '/../config/content.php';

?>

<section id="about" class="about-section">

    <div class="about-wrapper">


        <!-- LEFT CONTENT -->

        <div class="about-left">

            <span class="section-tag">

                <span class="tag-dot"></span>

                <?= htmlspecialchars($content['about']['tag']) ?>

            </span>


            <h2 class="about-title">

                <?= htmlspecialchars($content['about']['title_before']) ?>

                <span>
                    <?= htmlspecialchars($content['about']['highlight_1']) ?>
                </span>

                <?= htmlspecialchars($content['about']['middle']) ?>

                <span>
                    <?= htmlspecialchars($content['about']['highlight_2']) ?>
                </span>

            </h2>


            <p class="about-text">

                <?= htmlspecialchars($content['about']['text']) ?>

            </p>

        </div>



        <!-- CENTER IMAGE -->

        <div class="about-image">

            <img
                src="assets/images/about-portrait.webp" loading="lazy" decoding="async"
                alt="About Image"
            >

        </div>



        <!-- RIGHT INFO -->

        <div class="about-info">


            <!-- NAME -->

            <div class="info-item">

                <i class="fa-solid fa-user"></i>

                <div>

                    <span>Name</span>

                    <h4>
                        <?= htmlspecialchars($content['about']['name']) ?>
                    </h4>

                </div>

            </div>



            <!-- LOCATION -->

            <div class="info-item">

                <i class="fa-solid fa-location-dot"></i>

                <div>

                    <span>Location</span>

                    <h4>
                        <?= htmlspecialchars($content['about']['location']) ?>
                    </h4>

                </div>

            </div>



            <!-- EMAIL -->

            <div class="info-item">

                <i class="fa-solid fa-envelope"></i>

                <div>

                    <span>Email</span>

                    <h4>
                        <?= htmlspecialchars($content['about']['email']) ?>
                    </h4>

                </div>

            </div>



            <!-- AVAILABILITY -->

            <div class="info-item">

                <i class="fa-solid fa-briefcase"></i>

                <div>

                    <span>Availability</span>

                    <h4>
                        <?= htmlspecialchars($content['about']['availability']) ?>
                    </h4>

                </div>

            </div>


        </div>


    </div>

</section>