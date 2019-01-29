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
    <?php
        include_once('header.php');
    ?>
    <div class="android-content mdl-layout__content">
        <a name="top"></a>
        <div class="mdl-typography--text-center">
            <!--Login Form-->
            <!-- Simple Textfield -->
            <div class="mdl-card mdl-shadow--2dp" style="margin-left: 550px; margin-top: 80px; margin-bottom: 100px;">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text"><strong>Inicio Usuario</strong></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <form action="POST" id="user_form">
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
        <?php
        include_once('footer.php');
        ?>
    </div>
</div>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
