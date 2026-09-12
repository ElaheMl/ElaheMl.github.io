<?php

$content = require __DIR__ . '/../config/content.php';

?>

<nav class="navbar">

    <div class="navbar-container">

        <!-- Logo -->

        <a href="#hero" class="logo">

            <img src="./assets/images/elix7.png"
                 alt="ElaheDev Logo">

        </a>


        <!-- Desktop Navigation -->

        <ul class="nav-links">

            <li>
                <a href="#hero" class="nav-link active">
                    <?= htmlspecialchars($content['navbar']['home']) ?>
                </a>
            </li>

            <li>
                <a href="#about" class="nav-link">
                    <?= htmlspecialchars($content['navbar']['about']) ?>
                </a>
            </li>

            <li>
                <a href="#services" class="nav-link">
                    <?= htmlspecialchars($content['navbar']['services']) ?>
                </a>
            </li>

            <li>
                <a href="#projects" class="nav-link">
                    <?= htmlspecialchars($content['navbar']['projects']) ?>
                </a>
            </li>

            <li>
                <a href="#skills" class="nav-link">
                    <?= htmlspecialchars($content['navbar']['skills']) ?>
                </a>
            </li>

            <li>
                <a href="#contact" class="nav-link">
                    <?= htmlspecialchars($content['navbar']['contact']) ?>
                </a>
            </li>

        </ul>


        <!-- Right Side -->

        <div class="nav-actions">

            <a href="#contact"
               class="talk-btn">

                <span>
                    <?= htmlspecialchars($content['navbar']['cta']) ?>
                </span>

            </a>


            <button class="menu-toggle"
                    aria-label="Open Menu">

                <span></span>
                <span></span>
                <span></span>

            </button>

        </div>

    </div>

</nav>


<div class="nav-overlay"></div>



<!-- MOBILE MENU -->

<aside class="mobile-menu">


    <div class="mobile-menu-header">

        <button class="menu-close"
                aria-label="Close Menu">

            <i class="fa-solid fa-xmark"></i>

        </button>

    </div>


    <nav class="mobile-links">

        <a href="#hero">

            <i class="fa-solid fa-house"></i>

            <span>
                <?= htmlspecialchars($content['navbar']['home']) ?>
            </span>

        </a>


        <a href="#about">

            <i class="fa-solid fa-user"></i>

            <span>
                <?= htmlspecialchars($content['navbar']['about']) ?>
            </span>

        </a>


        <a href="#services">

            <i class="fa-solid fa-layer-group"></i>

            <span>
                <?= htmlspecialchars($content['navbar']['services']) ?>
            </span>

        </a>


        <a href="#projects">

            <i class="fa-solid fa-briefcase"></i>

            <span>
                <?= htmlspecialchars($content['navbar']['projects']) ?>
            </span>

        </a>


        <a href="#skills">

            <i class="fa-solid fa-code"></i>

            <span>
                <?= htmlspecialchars($content['navbar']['skills']) ?>
            </span>

        </a>


        <a href="#contact">

            <i class="fa-solid fa-envelope"></i>

            <span>
                <?= htmlspecialchars($content['navbar']['contact']) ?>
            </span>

        </a>

    </nav>


    <a href="#contact"
       class="mobile-talk-btn">

        <?= htmlspecialchars($content['navbar']['cta']) ?>

    </a>

</aside>