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

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Realiza tus examenes y demas en optica IJC.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Optica IJC</title>

    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="mdl/mdl.min.css">
    <link rel="stylesheet" href="styles.css">
    <!--<link rel="stylesheet" href="mdl/material.min.css">-->
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="mdl/material.min.js"></script>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

    <div class="page-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="page-title mdl-layout-title">
            <img id="imageHome" class="optic-logo-image" src="images/optica-logo.png">
          </span>
            <!-- Add spacer, to align navigation to the right in desktop -->
            <div class="page-header-spacer mdl-layout-spacer"></div>
            <div class="page-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search-field">
                </div>
            </div>
            <!-- Navigation -->
            <div class="page-navigation-container">
                <nav class="page-navigation mdl-navigation">
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Formulas</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Examenes</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Diagnosticos</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Procedimientos</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Recetario</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Garantias</a>
                </nav>
            </div>
            <span class="page-mobile-title mdl-layout-title">
            <img class="optic-logo-image" src="images/optica-logo.png">
          </span>
            <button class="page-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
                <li class="mdl-menu__item">Acceso Administrativo</li>
                <li class="mdl-menu__item">Historias Clinicas</li>
                <li disabled class="mdl-menu__item">Hoja de evoluciones</li>
                <li class="mdl-menu__item">Control inventario</li>
            </ul>
        </div>
    </div>

    <div class="page-drawer mdl-layout__drawer">
        <span class="mdl-layout-title">
          <img class="optic-logo-image" src="images/optica-logo-white.png">
        </span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="">
            <span>
              <img class="icon-logo-nav" src="images/hclinicasv.png">
              Historias Clinicas
            </span>
            </a>
            <a class="mdl-navigation__link" href="">
            <span>
              <img class="icon-logo-nav" src="images/hevoluciones.png">
              Hoja de evoluciones
            </span>
            </a>
            <a class="mdl-navigation__link" href="">
            <span>
              <img class="icon-logo-nav" src="images/citasv.png">
              Citas
            </span>
            </a>
            <a class="mdl-navigation__link" href="">
            <span>
              <img class="icon-logo-nav" src="images/fcompra.png">
              Facturas de compra
            </span>
            </a>
            <a class="mdl-navigation__link" href="">
            <span>
              <img class="icon-logo-nav" src="images/formulas.png">
              Formulas
            </span>
            </a>
            <a class="mdl-navigation__link" href="">
            <span>
              <img class="icon-logo-nav" src="images/citas.png">
              Pedidos cliente
            </span>
            </a>
            <div class="page-drawer-separator"></div>
            <span class="mdl-navigation__link" >Administrativo</span>
            <a class="mdl-navigation__link" href="">Pago nomina</a>
            <a class="mdl-navigation__link" href="">Control de producto</a>
            <a class="mdl-navigation__link" href="">Pedido labroatorio</a>
            <a class="mdl-navigation__link" href="">Consentimiento informado</a>
            <div class="page-drawer-separator"></div>
            <span class="mdl-navigation__link" >Clientes</span>
            <a class="mdl-navigation__link" href="">Formula lente</a>
            <a class="mdl-navigation__link" href="">Examenes externos</a>
            <a class="mdl-navigation__link" href="">Diagnosticos</a>
            <div class="page-drawer-separator"></div>
            <span class="mdl-navigation__link" >Otros</span>
            <a class="mdl-navigation__link" href="">Procedimientos</a>
            <a class="mdl-navigation__link" href="">Recetario de examenes</a>
            <a class="mdl-navigation__link" href="register.php">Registro de usuario</a>
        </nav>
    </div>
    <div class="android-content mdl-layout__content">
        <a name="top"></a>
        <div class="mdl-typography--text-center">
            <!--Login Form-->
            <!-- Simple Textfield -->
            <div class="mdl-card mdl-shadow--2dp" style="margin-left: 550px; margin-top: 80px; margin-bottom: 100px;">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text"><strong>Inicio Administrador</strong></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <form action="POST" id="admin_form">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input required maxlength="10" minlength="10" class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="username">
                            <label class="mdl-textfield__label" for="username">Usuario o Identificacion</label>
                            <span class="mdl-textfield__error">Esto no parece ser correcto</span>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input required class="mdl-textfield__input" type="password" minlength="10" id="password">
                            <label class="mdl-textfield__label" for="password">Contraseña</label>
                            <span class="mdl-textfield__error">Algo anda mal</span>
                        </div>
                        <br>
                        <br>
                        <div class="mdl-card__actions mdl-card--border">
                            <button id="login" type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect">
                                Iniciar Sesion
                            </button>
                        </div>
                    </form>
                    <br>
                    <div id="progress" class="mdl-progress mdl-js-progress mdl-progress__indeterminate" style="display: none;"></div>
                    <div id="error_mssg" style="color: red; display: none;">?</div>
                </div>
            </div>
        </div>
        <footer class="page-footer mdl-mega-footer">
            <div class="mdl-mega-footer--middle-section">
                <p class="mdl-typography--font-light">Ingenieria de Software: © 2018, Universidad de Cordoba</p>
                <!--<p class="mdl-typography--font-light">Other resoruces</p>-->
            </div>

            <div class="mdl-mega-footer--bottom-section">
                <a class="optic-link page-link-menu mdl-typography--font-light" id="version-dropdown">
                    Usuarios
                    <i class="material-icons">arrow_drop_up</i>
                </a>
                <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect" for="version-dropdown">
                    <li class="mdl-menu__item">Notificarme</li>
                    <li class="mdl-menu__item">Cancelar cita</li>
                    <li class="mdl-menu__item">Retiro de productos</li>
                    <li class="mdl-menu__item">Mis diagnosticos</li>
                </ul>
                <a class="optic-link page-link-menu mdl-typography--font-light" id="developers-dropdown">
                    Otras opciones
                    <i class="material-icons">arrow_drop_up</i>
                </a>
                <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect" for="developers-dropdown">
                    <li class="mdl-menu__item">Administrativo</li>
                    <li class="mdl-menu__item">Control de producto</li>
                    <li class="mdl-menu__item">Control de inventario</li>
                    <li class="mdl-menu__item">Cartera</li>
                </ul>
                <a class="optic-link mdl-typography--font-light" href="LICENSE-2.0.txt">Licencia</a>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
