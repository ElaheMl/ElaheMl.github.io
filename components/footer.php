<?php

$content = require __DIR__ . '/../config/content.php';

?>

<footer class="footer-section">

    <div class="footer-wrapper">


        <!-- LOGO -->

        <a href="#hero" class="footer-logo">

            <img
                src="./assets/images/elix8.png"
                alt="ElaheDev Logo"
            >

        </a>



        <!-- COPYRIGHT -->

        <div class="footer-copy">

            <?= htmlspecialchars($content['footer']['copyright']) ?>

        </div>



        <!-- SOCIALS -->

        <div class="footer-socials">


            <!-- GITHUB -->

            <a
                href="<?= htmlspecialchars($content['footer']['github']) ?>"
                target="_blank"
                aria-label="GitHub"
            >

                <i class="fa-brands fa-github"></i>

            </a>



            <!-- LINKEDIN -->

            <a
                href="<?= htmlspecialchars($content['footer']['linkedin']) ?>"
                target="_blank"
                aria-label="LinkedIn"
            >

                <i class="fa-brands fa-linkedin-in"></i>

            </a>



            <!-- TELEGRAM -->

            <a
                href="<?= htmlspecialchars($content['footer']['telegram']) ?>"
                target="_blank"
                aria-label="Telegram"
            >

                <i class="fa-brands fa-telegram"></i>

            </a>



            <!-- EMAIL -->

            <a
                href="mailto:<?= htmlspecialchars($content['footer']['email']) ?>"
                aria-label="Email"
            >

                <i class="fa-solid fa-envelope"></i>

            </a>


        </div>


    </div>

</footer>