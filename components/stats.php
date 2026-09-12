<?php

$content = require __DIR__ . '/../config/content.php';

?>

<section class="stats-section">

    <div class="stats-wrapper">


        <!-- ITEM 1 -->

        <div class="stats-item">

            <div class="stats-icon">
                <i class="fa-solid fa-code"></i>
            </div>

            <div class="stats-content">

                <h3>
                    <?= htmlspecialchars($content['stats']['projects_value']) ?>
                </h3>

                <p>
                    <?= htmlspecialchars($content['stats']['projects_label']) ?>
                </p>

            </div>

        </div>


        <!-- ITEM 2 -->

        <div class="stats-item">

            <div class="stats-icon">
                <i class="fa-solid fa-star"></i>
            </div>

            <div class="stats-content">

                <h3>
                    <?= htmlspecialchars($content['stats']['satisfaction_value']) ?>
                </h3>

                <p>
                    <?= htmlspecialchars($content['stats']['satisfaction_label']) ?>
                </p>

            </div>

        </div>


        <!-- ITEM 3 -->

        <div class="stats-item">

            <div class="stats-icon">
                <i class="fa-solid fa-users"></i>
            </div>

            <div class="stats-content">

                <h3>
                    <?= htmlspecialchars($content['stats']['clients_value']) ?>
                </h3>

                <p>
                    <?= htmlspecialchars($content['stats']['clients_label']) ?>
                </p>

            </div>

        </div>


        <!-- ITEM 4 -->

        <div class="stats-item">

            <div class="stats-icon">
                <i class="fa-solid fa-briefcase"></i>
            </div>

            <div class="stats-content">

                <h3>
                    <?= htmlspecialchars($content['stats']['experience_value']) ?>
                </h3>

                <p>
                    <?= htmlspecialchars($content['stats']['experience_label']) ?>
                </p>

            </div>

        </div>


    </div>

</section>