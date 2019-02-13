<!doctype html>
<?php
require_once 'php/UserSession.php';
$user = null;
$isLogin = false;
$usrsess = new UserSession();
if (isset($_SESSION['userSession'])) {
    $isLogin = true;
    $user = $usrsess->getCurrentUser();
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Realiza tus examenes y demas en optica IJC.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Optica IJC</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="mdl/mdl.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="mdl/material.min.js"></script>
    <style>
        .demo-card-wide.mdl-card{
            width: 512px;
        }
        .demo-card-wide > .mdl-card__title {
            color: #000;
            height: 176px;
        }
        .demo-card-wide > .mdl-card__menu {
            color: #fff;
        }
    </style>
</head>
<body onload="obtenercitas(<?php echo $user['users_idusers']; ?>)">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <?php require 'header.php'; ?>
    <div class="android-content mdl-layout__content">
        <div class="mdl-typography--text-center">
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--4dp" style="width: 500px; top: 0; margin: 80px auto 120px;">
                <thead>
                    <tr>
                        <th>Codigo Cita</th>
                        <th>Usuario</th>
                        <th class="mdl-data-table__cell--non-numeric">Fecha</th>
                        <th class="mdl-data-table__cell--non-numeric">Hora</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody id="bodytable">
                <tr>
                    <td>Numq</td>
                    <td>Numq</td>
                    <td>Numq</td>
                    <td>Numq</td>
                </tr>
                </tbody>
            </table>
            <br>
        </div>
        <?php require 'footer.php'; ?>
    </div>
</div>
<a id="view-source"
   class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--yellow mdl-color-text--accent">Agendar
    Cita</a>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
