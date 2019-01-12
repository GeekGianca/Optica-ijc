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
    include_once 'php/config.php';
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Realiza tus examenes y demas en optica IJC.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Optica IJC</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.min.css">-->
    <link rel="stylesheet" href="mdl/mdl.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="mdl/material.min.js"></script>
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
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
            <li class="mdl-menu__item">
              <a href="loginadmin.php" style="text-decoration: none">
                Acceso Administrativo
              </a>
            </li>
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
          <span class="mdl-navigation__link" href="">Administrativo</span>
          <a class="mdl-navigation__link" href="">Pago nomina</a>
          <a class="mdl-navigation__link" href="">Control de producto</a>
          <a class="mdl-navigation__link" href="">Pedido labroatorio</a>
          <a class="mdl-navigation__link" href="">Consentimiento informado</a>
          <div class="page-drawer-separator"></div>
          <span class="mdl-navigation__link" href="#">Clientes</span>
          <a class="mdl-navigation__link" href="">Formula lentes</a>
          <a class="mdl-navigation__link" href="">Examenes externos</a>
          <a class="mdl-navigation__link" href="">Diagnosticos</a>
          <div class="page-drawer-separator"></div>
          <span class="mdl-navigation__link" href="">Otros</span>
          <a class="mdl-navigation__link" href="">Procedimientos</a>
          <a class="mdl-navigation__link" href="">Recetario de examenes</a>
          <a class="mdl-navigation__link" href="register.php">Registro de usuario</a>
        </nav>
      </div>
      <div class="android-content mdl-layout__content">
        <a name="top"></a>
        <div class="optic-be-together-section mdl-typography--text-center">
          <div class="logo-font optic-slogan">Has de tu vida con mas claridad</div><!--Here info in the banner-->
          <div class="logo-font optic-sub-slogan">Agenda tu cita y ten el gusto de mejorar tu calidad de vidad visual, garantia de por vida</div><!--Here info in the banner-->
          <div class="logo-font optic-create-character">
            <a href=""><img src="images/icons8_Enter_24px.png">Registrate</a>
          </div>

          <a href="#screens">
            <button class="page-fab mdl-button mdl-button--colored mdl-js-button mdl-button--fab mdl-js-ripple-effect">
              <i class="material-icons">expand_more</i>
            </button>
          </a>
        </div>
        <div class="optic-screen-section mdl-typography--text-center">
          <a name="screens"></a>
          <div class="mdl-typography--display-1-color-contrast">Nuestros servicios nos posicionan como los mejores</div>
          <div class="optic-screens">
            <div class="optic-wear optic-screen">
              <a class="optic-image-link" href="">
                <img class="optic-screen-image" src="images/vpad-productos.jpg">
                <img class="optic-screen-image" src="images/vpad-productos.jpg">
              </a>
              <a class="optic-link mdl-typography--font-regular mdl-typography--text-uppercase" href="">Entrega de productos</a>
            </div>
            <div class="page-phone optic-screen">
              <a class="optic-image-link" href="">
                <img class="optic-screen-image" src="images/citas-online.png">
              </a>
              <a class="optic-link mdl-typography--font-regular mdl-typography--text-uppercase" href="">Citas</a>
            </div>
            <div class="optic-tablet optic-screen">
              <a class="optic-image-link" href="">
                <img class="optic-screen-image" src="images/examenes.png">
              </a>
              <a class="optic-link mdl-typography--font-regular mdl-typography--text-uppercase" href="">Examenes</a>
            </div>
            <div class="page-tv optic-screen">
              <a class="optic-image-link" href="">
                <img class="optic-screen-image" src="images/gafas_banner.png">
              </a>
              <a class="optic-link mdl-typography--font-regular mdl-typography--text-uppercase" href="">Productos</a>
            </div>
            <div class="page-auto optic-screen">
              <a class="optic-image-link" href="">
                <img class="optic-screen-image" src="images/ex-med-virt.png">
              </a>
              <a class="optic-link mdl-typography--font-regular mdl-typography--text-uppercase mdl-typography--text-left" href="">Muy pronto: atencion virtual</a>
            </div>
          </div>
        </div>
        <div class="optic-wear-section">
          <div class="optic-wear-band">
            <div class="optic-wear-band-text">
              <div class="mdl-typography--display-2 mdl-typography--font-thin">Cuide de usted y de los que ama</div>
              <p class="mdl-typography--headline mdl-typography--font-thin">
                Realizamos examenes de vista computarizados y toma de la presion ocular, sin contacto con el ojo, atendemos a todo tipo de pacientes.
              </p>
              <p>
                <a class="mdl-typography--font-regular mdl-typography--text-uppercase page-alt-link" href="">
                  Solicitar consulta&nbsp;<i class="material-icons">chevron_right</i>
                </a>
              </p>
            </div>
          </div>
        </div>
        <div class="page-more-section">
          <div class="android-section-title mdl-typography--display-1-color-contrast">Servicios</div>
          <div class="page-card-container mdl-grid">
            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__media">
                <img src="images/more-from-1.png">
              </div>
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text">Historia Clinica</h4>
              </div>
              <div class="mdl-card__supporting-text">
                <span class="mdl-typography--font-light mdl-typography--subhead">Descarga tu historia clinica con solo un paso, click aqui.</span>
              </div>
              <div class="mdl-card__actions">
                 <a class="optic-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
                   Solicitar historia
                   <i class="material-icons">chevron_right</i>
                 </a>
              </div>
            </div>

            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__media">
                <img src="images/more-from-4.png">
              </div>
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text">Hoja de evoluciones</h4>
              </div>
              <div class="mdl-card__supporting-text">
                <span class="mdl-typography--font-light mdl-typography--subhead">Checa tu hoja de evolucion medica para ver los resultados de las citas que has tenido.</span>
              </div>
              <div class="mdl-card__actions">
                 <a class="optic-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
                   Ver
                   <i class="material-icons">chevron_right</i>
                 </a>
              </div>
            </div>

            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__media">
                <img src="images/more-from-2.png">
              </div>
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text">Pago de nomina</h4>
              </div>
              <div class="mdl-card__supporting-text">
                <span class="mdl-typography--font-light mdl-typography--subhead">Si eres de nuestro equipo de trabajo, puedes solicitar tu pago de nomina solo ingresando tu documento y contraseña proporcionada.</span>
              </div>
              <div class="mdl-card__actions">
                 <a class="optic-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
                   Descargar comprobante
                   <i class="material-icons">chevron_right</i>
                 </a>
              </div>
            </div>

            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__media">
                <img src="images/more-from-3.png">
              </div>
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text">Forumla asignada</h4>
              </div>
              <div class="mdl-card__supporting-text">
                <span class="mdl-typography--font-light mdl-typography--subhead">Si tienes una formula medica asignada puedes revisar el estado de ella y saber donde puedes reclamarla y cuando, solo accede en este apartado.</span>
              </div>
              <div class="mdl-card__actions">
                 <a class="optic-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
                   Buscar
                   <i class="material-icons">chevron_right</i>
                 </a>
              </div>
            </div>
          </div>
        </div>
        <!--Snackbar For Sucess-->
          <div id="toast-request" class="mdl-js-snackbar mdl-snackbar">
              <div class="mdl-snackbar__text"></div>
              <button class="mdl-snackbar__action" type="button"></button>
          </div>
        <footer class="page-footer mdl-mega-footer">
          <div class="mdl-mega-footer--top-section">
            <div class="mdl-mega-footer--right-section">
              <a class="mdl-typography--font-light" href="#top">
                Volver arriba
                <i class="material-icons">expand_less</i>
              </a>
            </div>
          </div>
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
    <a  id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Agendar Cita</a>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="js/app.js"></script>
    <!--Dialog For Quote-->
    <dialog class="mdl-dialog" id="dialog">
        <h4 class="mdl-dialog__title">Solicita tu cita---</h4>
        <br>
        <div class="mdl-dialog__content">
            <div>Las solicitudes de cita de esta secion, seran revisadas en busca de disponibilidad, no se garantiza la hora y fecha de la cita solicitada, hasta revision</div>
            <br>
            <form method="POST" id="form_appointment">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="iduser">
                    <label class="mdl-textfield__label" for="iduser">Digite su cedula</label>
                    <span class="mdl-textfield__error">Debe contener caracteres validos</span>
                </div>
                <br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input required class="mdl-textfield__input" type="date" id="dateSelected">
                    <label class="mdl-textfield__label" for="dateSelected">Fecha de cita</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input required class="mdl-textfield__input" type="time" id="timeSelected">
                    <label class="mdl-textfield__label" for="timeSelected">Hora de cita</label>
                </div>
                <button type="submit" class="mdl-button">Agregar</button>
                <button type="reset" class="mdl-button close">Cancelar</button>
            </form>
            <br>
            <div id="progress" class="mdl-progress mdl-js-progress mdl-progress__indeterminate" style="display: none;"></div>
            <div id="error_mssg" style="color: red; display: none;">?</div>
        </div>
    </dialog>
    <script>
        var dialog = document.querySelector('dialog');
        var showDialogButton = document.querySelector('#view-source');
        if (! dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        showDialogButton.addEventListener('click', function() {
            dialog.showModal();
        });
        dialog.querySelector('.close').addEventListener('click', function() {
            dialog.close();
        });
    </script>
  </body>
</html>
