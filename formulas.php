<!doctype html>
<!--
  Optica IJC
  Copyright 2018 Universidad de Cordoba All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
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
    <link rel="stylesheet" href="css/formulasstyles.css">
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="mdl/material.min.js"></script>
</head>
<body onload="obtenerdatosformulas(<?php echo $user['users_idusers']?>)">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <div class="page-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="page-title mdl-layout-title">
            <img id="imageHome" class="optic-logo-image" src="images/optica-logo.png" alt="">
          </span>
            <!-- Add spacer, to align navigation to the right in desktop -->
            <div class="page-header-spacer mdl-layout-spacer"></div>
            <!-- Navigation -->
            <div class="page-navigation-container">
                <nav class="page-navigation mdl-navigation">
                    <a class="mdl-navigation__link mdl-typography--text-uppercase mdl-navigation__link--current"
                       href="formulas.php">Formulas</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Examenes</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Diagnosticos</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Procedimientos</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Recetario</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Garantias</a>
                    <?php
                    if ($isLogin) {
                        echo '
                        <span class="mdl-chip mdl-chip--contact">
                            <span class="mdl-chip__contact mdl-color--amber mdl-color-text--white">' . $user['name'][0] . '</span>
                            <span class="mdl-chip__text">' . $user['name'] . ' </span>
                        </span>';
                    }
                    ?>
                </nav>
            </div>
            <span class="page-mobile-title mdl-layout-title">
                <img class="optic-logo-image" src="images/optica-logo.png" alt="">
            </span>
            <button class="page-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"
                    id="more-button">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
                <?php
                if ($isLogin) {
                    ?>
                    <li onclick="logout()" class="mdl-menu__item">
                        Cerrar sesion
                    </li>
                    <?php
                } else {
                    ?>
                    <li onclick="adminlogin()" class="mdl-menu__item">
                        Acceso Administrativo
                    </li>
                    <li onclick="userlogin()" class="mdl-menu__item">
                        Acceso Usuarios
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <?php
    if ($isLogin) {
        ?>
        <div class="page-drawer mdl-layout__drawer">
                    <span class="mdl-layout-title">
                      <img class="optic-logo-image" src="images/optica-logo-white.png" alt="">
                    </span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="">
                        <span>
                          <img class="icon-logo-nav" src="images/hclinicasv.png" alt="">
                          Historias Clinicas
                        </span>
                </a>
                <a class="mdl-navigation__link" href="">
                        <span>
                          <img class="icon-logo-nav" src="images/hevoluciones.png" alt="">
                          Hoja de evoluciones
                        </span>
                </a>
                <a class="mdl-navigation__link" href="">
                        <span>
                          <img class="icon-logo-nav" src="images/citasv.png" alt="">
                          Citas
                        </span>
                </a>
                <a class="mdl-navigation__link" href="">
                        <span>
                          <img class="icon-logo-nav" src="images/fcompra.png" alt="">
                          Facturas de compra
                        </span>
                </a>
                <a class="mdl-navigation__link" href="">
                        <span>
                          <img class="icon-logo-nav" src="images/formulas.png" alt="">
                          Formulas
                        </span>
                </a>
                <a class="mdl-navigation__link" href="">
                        <span>
                          <img class="icon-logo-nav" src="images/citas.png" alt="">
                          Pedidos cliente
                        </span>
                </a>
                <?php
                if ($user['type'] == 2) {
                    ?>
                    <div class="page-drawer-separator"></div>
                    <span class="mdl-navigation__link">Administrativo</span>
                    <a class="mdl-navigation__link" href="">Pago nomina</a>
                    <a class="mdl-navigation__link" href="">Control de producto</a>
                    <a class="mdl-navigation__link" href="">Pedido labroatorio</a>
                    <a class="mdl-navigation__link" href="">Consentimiento informado</a>
                    <?php
                }
                ?>
                <div class="page-drawer-separator"></div>
                <span class="mdl-navigation__link">Clientes</span>
                <a class="mdl-navigation__link" href="">Formula lentes</a>
                <a class="mdl-navigation__link" href="">Examenes externos</a>
                <a class="mdl-navigation__link" href="">Diagnosticos</a>
                <div class="page-drawer-separator"></div>
                <span class="mdl-navigation__link">Otros</span>
                <a class="mdl-navigation__link" href="">Procedimientos</a>
                <a class="mdl-navigation__link" href="">Recetario de examenes</a>
                <a class="mdl-navigation__link" href="register.php">Registro de usuario</a>
            </nav>
        </div>
        <?php
    }
    ?>
    <div class="android-content mdl-layout__content">
        <!--View Info-->
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
                                <i class="material-icons">play_circle_filled</i>
                            </header>
                            <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                                <div class="mdl-card__supporting-text">
                                    <h4>Disponibilidad de formula</h4>
                                    Si ya solicitaste tu formula, entonces puedes proceder a descargarla, debes tener la sesion iniciada para poder acceder a la descarga, y automaticamente si tiene disponibilidad se descargara.
                                </div>
                                <div class="mdl-card__actions">
                                    <a href="#" class="mdl-button">Descargar</a>
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
                                        Detalle o descripcion <a href="#">Descargar</a>.
                                    </div>
                                </div>
                                <div class="mdl-card__actions">
                                    <a href="#" class="mdl-button">Ver diagnosticos</a>
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
                                <ul class="toc">
                                    <h4>Disponibles.</h4>
                                    <a href="#lorem1">Lorem ipsum</a>
                                    <a href="#lorem2">Lorem ipsum</a>
                                    <a href="#lorem3">Lorem ipsum</a>
                                    <a href="#lorem4">Lorem ipsum</a>
                                    <a href="#lorem5">Lorem ipsum</a>
                                </ul>

                                <h5 id="lorem1">Lorem ipsum dolor sit amet</h5>
                                Excepteur et pariatur officia veniam anim culpa cupidatat consequat ad velit culpa est
                                non.
                                <ul>
                                    <li>Nisi qui nisi duis commodo duis reprehenderit consequat velit aliquip.</li>
                                    <li>Dolor consectetur incididunt in ipsum laborum non et irure pariatur excepteur
                                        anim occaecat officia sint.
                                    </li>
                                    <li>Lorem labore proident officia excepteur do.</li>
                                </ul>

                                <p>
                                    Sit qui est voluptate proident minim cillum in aliquip cupidatat labore pariatur id
                                    tempor id. Proident occaecat occaecat sint mollit tempor duis dolor cillum anim.
                                    Dolore sunt ea mollit fugiat in aliqua consequat nostrud aliqua ut irure in dolore.
                                    Proident aliqua culpa sint sint exercitation. Non proident occaecat reprehenderit
                                    veniam et proident dolor id culpa ea tempor do dolor. Nulla adipisicing qui fugiat
                                    id dolor. Nostrud magna voluptate irure veniam veniam labore ipsum deserunt
                                    adipisicing laboris amet eu irure. Sunt dolore nisi velit sit id. Nostrud voluptate
                                    labore proident cupidatat enim amet Lorem officia magna excepteur occaecat eu qui.
                                    Exercitation culpa deserunt non et tempor et non.
                                </p>
                                <p>
                                    Do dolor eiusmod eu mollit dolore nostrud deserunt cillum irure esse sint irure
                                    fugiat exercitation. Magna sit voluptate id in tempor elit veniam enim cupidatat ea
                                    labore elit. Aliqua pariatur eu nulla labore magna dolore mollit occaecat sint
                                    commodo culpa. Eu non minim duis pariatur Lorem quis exercitation. Sunt qui ex
                                    incididunt sit anim incididunt sit elit ad officia id.
                                </p>
                                <p id="lorem2">
                                    Tempor voluptate ex consequat fugiat aliqua. Do sit et reprehenderit culpa deserunt
                                    culpa. Excepteur quis minim mollit irure nulla excepteur enim quis in laborum.
                                    Aliqua elit voluptate ad deserunt nulla reprehenderit adipisicing sint. Est in
                                    eiusmod exercitation esse commodo. Ea reprehenderit exercitation veniam adipisicing
                                    minim nostrud. Veniam dolore ex ea occaecat non enim minim id ut aliqua adipisicing
                                    ad. Occaecat excepteur aliqua tempor cupidatat aute dolore deserunt ipsum qui
                                    incididunt aliqua occaecat sit quis. Culpa sint aliqua aliqua reprehenderit veniam
                                    irure fugiat ea ad.
                                </p>
                                <p>
                                    Eu minim fugiat laborum irure veniam Lorem aliqua enim. Aliqua veniam incididunt
                                    consequat irure consequat tempor do nisi deserunt. Elit dolore ad quis consectetur
                                    sint laborum anim magna do nostrud amet. Ea nulla sit consequat quis qui irure
                                    dolor. Sint deserunt excepteur consectetur magna irure. Dolor tempor exercitation
                                    dolore pariatur incididunt ut laboris fugiat ipsum sunt veniam aute sunt labore. Non
                                    dolore sit nostrud eu ad excepteur cillum eu ex Lorem duis.
                                </p>
                                <p>
                                    Id occaecat velit non ipsum occaecat aliqua quis ut. Eiusmod est magna non esse est
                                    ex incididunt aute ullamco. Cillum excepteur sint ipsum qui quis velit incididunt
                                    amet. Qui deserunt anim enim laborum cillum reprehenderit duis mollit amet ad
                                    officia enim. Minim sint et quis aliqua aliqua do minim officia dolor deserunt ipsum
                                    laboris. Nulla nisi voluptate consectetur est voluptate et amet. Occaecat ut quis
                                    adipisicing ad enim. Magna est magna sit duis proident veniam reprehenderit fugiat
                                    reprehenderit enim velit ex. Ullamco laboris culpa irure aliquip ad Lorem consequat
                                    veniam ad ipsum eu. Ipsum culpa dolore sunt officia laborum quis.
                                </p>

                                <h5 id="lorem3">Lorem ipsum dolor sit amet</h5>

                                <p id="lorem4">
                                    Eiusmod nulla aliquip ipsum reprehenderit nostrud non excepteur mollit amet esse est
                                    est dolor. Dolore quis pariatur sit consectetur veniam esse ullamco duis Lorem qui
                                    enim ut veniam. Officia deserunt minim duis laborum dolor in velit pariatur commodo
                                    ullamco eu. Aute adipisicing ad duis labore laboris do mollit dolor cillum sunt
                                    aliqua ullamco. Esse tempor quis cillum consequat reprehenderit. Adipisicing
                                    proident anim eu sint elit aliqua anim dolore cupidatat fugiat aliquip qui.
                                </p>
                                <p id="lorem5">
                                    Nisi eiusmod esse cupidatat excepteur exercitation ipsum reprehenderit nostrud
                                    deserunt aliqua ullamco. Anim est irure commodo eiusmod pariatur officia. Est dolor
                                    ipsum excepteur magna aliqua ad veniam irure qui occaecat eiusmod aute fugiat
                                    commodo. Quis mollit incididunt amet sit minim velit eu fugiat voluptate excepteur.
                                    Sit minim id pariatur ex cupidatat cupidatat nostrud nostrud ipsum.
                                </p>
                                <p>
                                    Enim ea officia excepteur ad veniam id reprehenderit eiusmod esse mollit consequat.
                                    Esse non aute ullamco Lorem aliqua qui dolore irure eiusmod aute aliqua proident
                                    labore aliqua. Ipsum voluptate voluptate exercitation laborum deserunt nulla elit
                                    aliquip et minim ex veniam. Duis cupidatat aute sunt officia mollit dolor ad elit ad
                                    aute labore nostrud duis pariatur. In est sint voluptate consectetur velit ea non
                                    labore. Ut duis ea aliqua consequat nulla laboris fugiat aute id culpa proident.
                                    Minim eiusmod laboris enim Lorem nisi excepteur mollit voluptate enim labore
                                    reprehenderit officia mollit.
                                </p>
                                <p>
                                    Cupidatat labore nisi ut sunt voluptate quis sunt qui ad Lorem esse nisi. Ex esse
                                    velit ullamco incididunt occaecat dolore veniam tempor minim adipisicing amet.
                                    Consequat in exercitation est elit anim consequat cillum sint labore cillum. Aliquip
                                    mollit laboris ad labore anim.
                                </p>
                            </div>
                        </section>
                    </div>
                    <footer class="page-footer mdl-mega-footer">
                        <div class="mdl-mega-footer--middle-section">
                            <p class="mdl-typography--font-light">Ingenieria de Software: © 2018, Universidad de
                                Cordoba</p>
                        </div>
                        <div class="mdl-mega-footer--bottom-section">
                            <a class="optic-link page-link-menu mdl-typography--font-light" id="version-dropdown">
                                Usuarios
                                <i class="material-icons">arrow_drop_up</i>
                            </a>
                            <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect"
                                for="version-dropdown">
                                <li class="mdl-menu__item">Notificarme</li>
                                <li class="mdl-menu__item">Cancelar cita</li>
                                <li class="mdl-menu__item">Retiro de productos</li>
                            </ul>
                            <a class="optic-link page-link-menu mdl-typography--font-light" id="developers-dropdown">
                                Otras opciones
                                <i class="material-icons">arrow_drop_up</i>
                            </a>
                            <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect"
                                for="developers-dropdown">
                                <li class="mdl-menu__item">Administrativo</li>
                                <li class="mdl-menu__item">Control de producto</li>
                                <li class="mdl-menu__item">Control de inventario</li>
                                <li class="mdl-menu__item">Cartera</li>
                            </ul>
                            <a class="optic-link mdl-typography--font-light" href="LICENSE-2.0.txt">Licencia</a>
                        </div>
                    </footer>
                </main>
            </div>
        </div>
    </div>
</div>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
