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
    <link rel="stylesheet" href="css/cardstyles.css">
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="mdl/material.min.js"></script>
    <style>
        .demo-list-three {
            width: 650px;
        }
    </style>
</head>
<body onload="hcdisponible(<?php echo $user['users_idusers']; ?>)">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <?php require 'header.php'; ?>
    <div class="android-content mdl-layout__content">
        <div class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
            <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
                <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
                    <main class="mdl-layout__content">
                        <div class="mdl-typography--text-center">
                            <h4 style="margin-left: auto; color: #0d47a1;">Historial Clinico</h4>
                        </div>
                        <div class="mdl-layout__tab-panel is-active" id="hclinico" style="margin-bottom: 80px; padding-top: 0px;">
                            <ul class="demo-list-three mdl-list" id="listahistoriales" style="margin-left: 230px;"></ul>
                            <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
                                <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white">
                                    <i class="material-icons">get_app</i>
                                </header>
                                <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                                    <div class="mdl-card__supporting-text">
                                        <h4>Des. Historial clinico</h4>
                                        Si dispone o solicito un historial clinico, puede descargarlo aqui.
                                    </div>
                                    <div class="mdl-card__actions">
                                        <a href="<?php echo $user != null ? "http://192.168.1.7/Optica-ijc/reportes/hclinica.php" : "loginuser.php" ?>"
                                           class="mdl-button"><?php echo $user != null ? "Descargar" : "Inicie Sesion" ?></a>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <?php require 'footer.php'; ?>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>
