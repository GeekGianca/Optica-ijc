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
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/cardstyles.css">
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="mdl/material.min.js"></script>
</head>
<body onload="obtenerdatosformulas(<?php echo $user['users_idusers'] ?>)">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <?php require 'header.php'; ?>
    <div class="android-content mdl-layout__content">
        <div class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
            <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
                <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
                    <div class="mdl-layout--large-screen-only mdl-layout__header-row">
                    </div>
                    <div class="mdl-layout--large-screen-only mdl-layout__header-row">
                        <h3>Formulas</h3>
                    </div>
                    <div class="mdl-layout--large-screen-only mdl-layout__header-row">
                    </div>
                    <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
                        <a href="#overview" class="mdl-layout__tab is-active">Formula</a>
                        <a href="#features" class="mdl-layout__tab">Solicitar</a>
                    </div>
                </header>
                <main class="mdl-layout__content">
                    <div class="mdl-layout__tab-panel is-active" id="overview">
                        <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
                            <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white">
                                <i class="material-icons">get_app</i>
                            </header>
                            <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                                <div class="mdl-card__supporting-text">
                                    <h4>Disponibilidad de formula</h4>
                                    Si ya solicitaste tu formula, entonces puedes proceder a descargarla, debes tener la sesion iniciada para poder acceder a la descarga, y automaticamente si tiene disponibilidad se descargara.
                                </div>
                                <div class="mdl-card__actions">
                                    <a href="<?php echo $user != null ? "#" : "loginuser.php" ?>" class="mdl-button"><?php echo $user != null ? "Descargar" : "Inicie Sesion" ?></a>
                                </div>
                            </div>
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="btn1">
                                <i class="material-icons">more_vert</i>
                            </button>
                            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="btn1">
                                <li class="mdl-menu__item" disabled>Descargar</li>
                                <li class="mdl-menu__item" disabled>Solicitar</li>
                                <li class="mdl-menu__item" disabled>Eliminar</li>
                            </ul>
                        </section>
                        <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
                            <div class="mdl-card mdl-cell mdl-cell--12-col">
                                <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing" id="formulas">
                                    <h4 class="mdl-cell mdl-cell--12-col">Detalles de formulas</h4>
                                    <div class="section__circle-container mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                                        <div class="section__circle-container__circle mdl-color--primary"></div>
                                    </div>
                                    <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                                        <h5>Titulo</h5>
                                        Detalle o descripcion <a href="#"><?php echo $user != null ? "Descargar" : "Inicie Sesion" ?></a>.
                                    </div>
                                </div>
                                <div class="mdl-card__actions">
                                    <a href="#" class="mdl-button"><?php echo $user != null ? "Ver Diagnosticos" : "Inicie Sesion" ?></a>
                                </div>
                            </div>
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="btn2">
                                <i class="material-icons">more_vert</i>
                            </button>
                            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="btn2">
                                <li class="mdl-menu__item" disabled>Descargar todo</li>
                                <li class="mdl-menu__item" disabled>Ver todo</li>
                            </ul>
                        </section>
                    </div>
                    <div class="mdl-layout__tab-panel" id="features">
                        <section class="section--center mdl-grid mdl-grid--no-spacing">
                            <div class="mdl-cell mdl-cell--12-col">
                                <h4>Solicitud</h4>
                                Las solicitudes varian de acuerdo a las prescripciones tratadas por el medico,
                                debe tener en cuenta que al seleccionar una prescripcion medica o formula debe hacerlo
                                con el doctor correspondiente.
                                <ul class="toc" id="medicosdisp">
                                    <h4>Disponibles.</h4>
                                    <a href="#disp1">Juan Guillermo</a>
                                </ul>

                                <h5 id="disp1">Medicos disponibles</h5>
                                Los medicos disponibles no son del todo seguros, a ellos les quedara la notificacion
                                para realizar el seguimiento de la formula y en dado caso que se solicite se le notificara.
                                Tener en cuenta que se necesita a la mano.
                                <ul>
                                    <li>Historial clinico.</li>
                                    <li>Ultima cita realizada.</li>
                                    <li>Documento de identidad del paciente.</li>
                                </ul>

                                <p>
                                    Sin descripcion.
                                </p>
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
