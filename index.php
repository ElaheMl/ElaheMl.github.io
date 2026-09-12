<?php

$content = require __DIR__ . '/config/content.php';

?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Elahe Portfolio</title>

    <meta name="description" content="Elahe Maashi — Software Engineer & UI/UX Designer portfolio.">
    <meta name="theme-color" content="#010416">

    <link rel="preload" href="assets/fonts/poppins-400.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/fonts/poppins-600.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="assets/images/hero-desktop.webp" as="image" type="image/webp" media="(min-width: 769px)">
    <link rel="preload" href="assets/images/hero-mobile.webp" as="image" type="image/webp" media="(max-width: 768px)">

    <link rel="stylesheet" href="assets/css/fonts.css?v=1">
    <link rel="stylesheet" href="assets/css/icons.css?v=1">
    <link rel="stylesheet" href="assets/css/style.css?v=102">
    <link rel="stylesheet" href="assets/css/responsive.css?v=4">
    <link rel="stylesheet" href="assets/css/animition.css?v=4">

</head>



<body>


    <!-- ========================================
         COMPONENTS
    ========================================= -->


    <?php include './components/navbar.php'; ?>


    <?php include './components/hero.php'; ?>


    <?php include './components/stats.php'; ?>


    <?php include './components/about.php'; ?>


    <?php include './components/services.php'; ?>


    <?php include './components/banner.php'; ?>


    <?php include './components/skills.php'; ?>


    <?php include './components/projects.php'; ?>


    <?php include './components/contact.php'; ?>


    <?php include './components/footer.php'; ?>



    <!-- ========================================
     SUCCESS MODAL
========================================= -->

<div
    class="success-modal"
    id="successModal"
    aria-hidden="true"
>

    <div class="success-modal-content">


        <div class="success-icon">

            <i class="fa-solid fa-check"></i>

        </div>


        <h3>

            <?= htmlspecialchars($content['modal']['title']) ?>

        </h3>


        <p>

            <?= htmlspecialchars($content['modal']['text']) ?>

        </p>


        <button
            type="button"
            id="successModalClose"
        >

            <?= htmlspecialchars($content['modal']['button']) ?>

        </button>


    </div>

</div>



    <script src="assets/js/main.js?v=11" defer></script>


</body>

</html>