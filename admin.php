<?php
require_once 'php/adminsession.php';
require_once 'php/controladoradmin.php';
$user = null;
$usrsess = new AdminSession();
$admincont = new AdminController();
$isLoginAdmin = false;
$quotescount = 0;
if (isset($_SESSION['adminsession'])) {
    $user = $usrsess->getCurrentUser();
    $isLoginAdmin = true;
    $quotescount = $admincont->gettotalquotes();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Administrador Optica IJC</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Optica ijc">

    <!-- Tile icon for Win8 (144x144 + tile color)
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">-->
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="css/stylesadmin.css">
    <link rel="stylesheet" href="cssbootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/nstyles.css">
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="mdl/material.min.js"></script>
    <style>
        .demo-card-wide.mdl-card {
            width: 600px;
        }
        .demo-card-wide > .mdl-card__title {
            color: #000;
        }
        .demo-card-wide > .mdl-card__menu {
            color: #fff;
        }
    </style>
</head>
<body onload="cargarconsultas()">
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <?php require 'navadmin.php'; ?>
    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
            <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
                <div class="container" id="infohome">

                </div>
            </div>
            <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
                <div class="demo-separator mdl-cell--1-col"></div>
                <div class="demo-options mdl-card mdl-color--deep-purple-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
                    <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50">
                        <h3>Pedidos de laboratorio</h3>
                        <ul id="pending">

                        </ul>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <!--<a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">Aceptar</a>
                        <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">Cancelar</a>-->
                        <div class="mdl-color-text--blue-grey-50">Disponible</div>
                        <div class="mdl-layout-spacer"></div>
                        <i class="material-icons">check_circle</i>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
