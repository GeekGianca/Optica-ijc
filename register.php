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
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Optica IJC</title>

    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.css">
    <link rel="stylesheet" href="styles.css">
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="mdl/material.min.js"></script>
    <style>
        .demo-card-wide.mdl-card{
            width: 550px;
        }
        .demo-card-wide > .mdl-card__title {
            color: #fff;
            height: 176px;
            background: url("images/register.jpg") center / cover;
        }
        .demo-card-wide > .mdl-card__menu {
            color: #fff;
        }
    </style>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <?php
        include_once('header.php');
    ?>
    <div class="android-content mdl-layout__content">
        <a name="top"></a>
        <div class="mdl-typography--text-center">
            <!--Login Form-->
            <!-- Simple Textfield -->
            <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="width: 500px; margin: 14px auto 5px;">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text mdl-typography--text-center">
                        <strong>Registro de usuarios</strong>
                    </h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <form id="formRegister" class="register" method="POST">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input maxlength="10" minlength="10" class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="iduser">
                            <label class="mdl-textfield__label" for="iduser">Identificacion</label>
                            <span id="error_iduser" class="mdl-textfield__error">Verifique los datos de la <strong>Identificacion</strong></span>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="name">
                            <label class="mdl-textfield__label" for="name">Nombre</label>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="phone" pattern="-?[0-9]*(\.[0-9]+)?">
                            <label class="mdl-textfield__label" for="phone">Telefono</label>
                            <span id="error_phone" class="mdl-textfield__error">El formato del numero de telefono es incorrecto</span>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="date" id="birthdate" minlength="10">
                            <label class="mdl-textfield__label" for="birthdate">Fecha de nacimiento</label>
                            <span id="error_birthdate" class="mdl-textfield__error">No coincide con el formato de fecha</span>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="address" minlength="10">
                            <label class="mdl-textfield__label" for="address">Direccion</label>
                            <span id="error_address" class="mdl-textfield__error">Debe ingresar una direccion</span>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="eps" minlength="8">
                            <label class="mdl-textfield__label" for="eps">Eps de Afiliacion</label>
                            <span id="error_eps" class="mdl-textfield__error">Debe ingresar una Eps</span>
                        </div>
                        <br>
                        <div class="mdl-card__actions mdl-card--border">
                            <button id="accepted_register" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="background-color: #28d500;">
                                Registrar
                            </button>
                            <button type="reset" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="background-color: #d50000;">
                                Limpiar
                            </button>
                        </div>
                        <div class="mdl-card__menu">
                            <button type="reset" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Dialog-->
        <dialog class="mdl-dialog">
            <h4 class="mdl-dialog__title" id="title_message">?</h4>
            <div class="mdl-dialog__content">
                <p id="message">
                    ?
                </p>
            </div>
            <div class="mdl-dialog__actions">
                <button type="button" class="mdl-button close" style="background-color: #00c853">Aceptar</button>
            </div>
        </dialog>
        <?php
            include_once('footer.php');
        ?>
    </div>
</div>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
