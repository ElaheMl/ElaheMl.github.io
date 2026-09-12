<?php

$content = require __DIR__ . '/../config/content.php';

?>

<section id="services" class="services-section">

    <!-- SECTION HEAD -->

    <div class="services-head">

        <span class="section-tag">

            <span class="tag-dot"></span>

            <?= htmlspecialchars($content['services']['tag']) ?>

        </span>


        <h2 class="services-title">

            <?= htmlspecialchars($content['services']['title']) ?>

            <span>
                <?= htmlspecialchars($content['services']['highlight']) ?>
            </span>

        </h2>

    </div>



    <!-- SERVICES GRID -->

    <div class="services-grid">


        <!-- CARD 1 -->

        <div class="service-card">

            <div class="service-icon">

                <i class="fa-solid fa-code"></i>

            </div>


            <div class="service-content">

                <h3>
                    <?= htmlspecialchars($content['services']['items'][0]['title']) ?>
                </h3>

                <p>
                    <?= htmlspecialchars($content['services']['items'][0]['text']) ?>
                </p>

            </div>

        </div>



        <!-- CARD 2 -->

        <div class="service-card">

            <div class="service-icon">

                <i class="fa-solid fa-pen-ruler"></i>

            </div>


            <div class="service-content">

                <h3>
                    <?= htmlspecialchars($content['services']['items'][1]['title']) ?>
                </h3>

                <p>
                    <?= htmlspecialchars($content['services']['items'][1]['text']) ?>
                </p>

            </div>

        </div>



        <!-- CARD 3 -->

        <div class="service-card">

            <div class="service-icon">

                <i class="fa-solid fa-mobile-screen"></i>

            </div>


            <div class="service-content">

                <h3>
                    <?= htmlspecialchars($content['services']['items'][2]['title']) ?>
                </h3>

                <p>
                    <?= htmlspecialchars($content['services']['items'][2]['text']) ?>
                </p>

            </div>

        </div>



        <!-- CARD 4 -->

        <div class="service-card">

            <div class="service-icon">

                <i class="fa-solid fa-headset"></i>

            </div>


            <div class="service-content">

                <h3>
                    <?= htmlspecialchars($content['services']['items'][3]['title']) ?>
                </h3>

                <p>
                    <?= htmlspecialchars($content['services']['items'][3]['text']) ?>
                </p>

            </div>

        </div>


    </div>

</section>