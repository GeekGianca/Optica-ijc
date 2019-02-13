<?php
require_once 'php/adminsession.php';
$user = null;
$usrsess = new AdminSession();
if (isset($_SESSION['adminsession'])) {
    $user = $usrsess->getCurrentUser();
    if ($user['type_user'] == 0){
        header('Location: admin.php');
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Realiza tus examenes y demas en optica IJC.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Optica IJC</title>
    <!-- Page styles -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="mdl/mdl.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <!--<link rel="stylesheet" href="mdl/material.min.css">-->
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="mdl/material.min.js"></script>
    <style>
        .demo-card-wide.mdl-card{
            width: 512px;
        }
        .demo-card-wide > .mdl-card__title {
            color: #000;
            height: 176px;
            background: url("images/inicioadmin.png") center / cover;
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
                    <h2 class="mdl-card__title-text"><strong><?php echo $user; ?></strong></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <form action="POST" id="admin_form">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input required maxlength="10" minlength="10" class="mdl-textfield__input" type="text"
                                   pattern="-?[0-9]*(\.[0-9]+)?" id="username">
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
                        <div class="mdl-card__menu">
                            <button type="reset" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                <i class="material-icons">close</i>
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
