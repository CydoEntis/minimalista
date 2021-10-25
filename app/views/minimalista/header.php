<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $data['page_title'] . " | " . WEBSITE_TITLE ?></title>
  <link rel="stylesheet" href="<?= ASSETS ?>minimalista/css/components.css">
  <link rel="stylesheet" href="<?= ASSETS ?>minimalista/css/icons.css">
  <link rel="stylesheet" href="<?= ASSETS ?>minimalista/css/responsee.css">
  <link rel="stylesheet" href="<?= ASSETS ?>minimalista/owl-carousel/owl.carousel.css">
  <link rel="stylesheet" href="<?= ASSETS ?>minimalista/owl-carousel/owl.theme.css">
  <link rel="stylesheet" href="<?= ASSETS ?>minimalista/css/lightcase.css">
  <!-- CUSTOM STYLE -->
  <link rel="stylesheet" href="<?= ASSETS ?>minimalista/css/template-style.css">
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,400,600,900&subset=latin-ext" rel="stylesheet">
  <script type="text/javascript" src="<?= ASSETS ?>minimalista/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="<?= ASSETS ?>minimalista/js/jquery-ui.min.js"></script>
</head>

<body class="size-1140">
  <div id="page-wrapper">
    <!-- HEADER -->
    <header role="banner" class="position-absolute margin-top-30 margin-m-top-0 margin-s-top-0">
      <!-- Top Navigation -->
      <nav class="background-transparent background-transparent-hightlight full-width sticky">
        <div class="s-12 l-2">
          <a href="index.html" class="logo">
            <!-- Logo version before sticky nav -->
            <img class="logo-before" src="<?= ASSETS ?>minimalista/img/logo-dark.png" alt="">
            <!-- Logo version after sticky nav -->
            <img class="logo-after" src="<?= ASSETS ?>minimalista/img/logo-dark.png" alt="">
          </a>
        </div>
        <div class="s-12 l-10">
          <div class="top-nav right">
            <p class="nav-text"></p>
            <ul class="right chevron">
              <?php if (isset($_SESSION['username'])) : ?>
                <li><a href="#" style="cursor: default; font-weight: bold"><?= "Hello {$_SESSION['username']}" ?></a></li>
              <?php endif; ?>
              <li><a href="<?= ROOT ?>home">Home</a></li>
              <li><a href="<?= ROOT ?>about">About Us</a></li>
              <li><a href="<?= ROOT ?>contact">Contact</a></li>
              <?php if (!isset($_SESSION['username'])) : ?>
                <li><a href="<?= ROOT ?>login">Login</a></li>
                <li><a href="<?= ROOT ?>signup">Sign Up</a></li>
              <?php else : ?>
                <li><a href="<?= ROOT ?>upload">Upload</a></li>
                <li><a href="<?= ROOT ?>logout">Logout</a></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- MAIN -->
    <main role="main">