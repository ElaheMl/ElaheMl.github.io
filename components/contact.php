<?php

$content = require __DIR__ . '/../config/content.php';

?>

<section id="contact" class="contact-section">

    <div class="contact-grid">

        <!-- LEFT -->

        <form class="contact-form-card"
              id="contactForm">

            <input
                type="hidden"
                name="access_key"
                value="ee2c2649-ab64-436f-b14e-e2e64496e216"
            >

            <span class="section-tag">

                <span class="tag-dot"></span>

                <?= htmlspecialchars($content['contact']['tag']) ?>

            </span>

            <h2 class="contact-title">

                <?= htmlspecialchars($content['contact']['title']) ?>

            </h2>

            <div class="input-box">

                <i class="fa-regular fa-user"></i>

                <input
                    type="text"
                    name="name"
                    placeholder="Your Name"
                    required
                >

            </div>

            <div class="input-box">

                <i class="fa-regular fa-envelope"></i>

                <input
                    type="email"
                    name="email"
                    placeholder="Your Email"
                    required
                >

            </div>

            <div class="input-box textarea-box">

                <i class="fa-regular fa-message"></i>

                <textarea
                    name="message"
                    placeholder="Your Message"
                    required
                ></textarea>

            </div>

            <button
                type="submit"
                class="contact-btn"
            >

                Send Message

                <i class="fa-solid fa-arrow-right"></i>

            </button>

        </form>


        <!-- RIGHT -->

        <div class="contact-info-card">

            <span class="section-tag">

                <span class="tag-dot"></span>

                <?= htmlspecialchars($content['contact']['info_tag']) ?>

            </span>

            <a href="https://github.com/ElaheMl"
               target="_blank"
               class="contact-info-item">

                <i class="fa-brands fa-github"></i>

                <span>
                    <?= htmlspecialchars($content['contact']['github']) ?>
                </span>

            </a>

            <a href="https://t.me/elahedev"
               target="_blank"
               class="contact-info-item">

                <i class="fa-brands fa-telegram"></i>

                <span>
                    <?= htmlspecialchars($content['contact']['telegram']) ?>
                </span>

            </a>

            <a href="mailto:elmaashiasl@gmail.com"
               class="contact-info-item">

                <i class="fa-regular fa-envelope"></i>

                <span>
                    <?= htmlspecialchars($content['contact']['email']) ?>
                </span>

            </a>

            <div class="contact-info-item phone-copy"
                 onclick="copyPhoneNumber()">

                <i class="fa-solid fa-phone"></i>

                <span>
                    <?= htmlspecialchars($content['contact']['phone']) ?>
                </span>

            </div>

            <div class="contact-info-item">

                <i class="fa-solid fa-location-dot"></i>

                <span>
                    <?= htmlspecialchars($content['contact']['location']) ?>
                </span>

            </div>

            <p class="contact-note">

                <?= htmlspecialchars($content['contact']['note']) ?>

            </p>

        </div>

    </div>

</section>