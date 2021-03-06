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
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Optica ijc">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="css/stylesadmin.css">
    <link rel="stylesheet" href="cssbootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/nstyles.css">
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="mdl/material.min.js"></script>
</head>
<body onload="cargaradmin()">
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <?php require 'navadmin.php'; ?>
    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
            <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
                <div class="container">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody id="bodycitas">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
                <div class="demo-separator mdl-cell--1-col"></div>
                <div class="demo-options mdl-card mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
                    <form action="">
                        <div class="mdl-card__supporting-text mdl-color-text--black">
                            <h3>Notificar Usuario</h3>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input required maxlength="10" minlength="10" class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="usercommon">
                                <label class="mdl-textfield__label" for="usercommon">Usuario o Identificacion</label>
                                <span class="mdl-textfield__error">Esto no parece ser correcto</span>
                            </div>
                            <br>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input required class="mdl-textfield__input" type="password" minlength="10" id="passcommon">
                                <label class="mdl-textfield__label" for="passcommon">Contraseña</label>
                                <span class="mdl-textfield__error">Algo anda mal</span>
                            </div>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--black">Aceptar</button>
                            <div class="mdl-layout-spacer"></div>
                        </div>
                        <div class="mdl-card__menu">
                            <button type="reset" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--black">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
