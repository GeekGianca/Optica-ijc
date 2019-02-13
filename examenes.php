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
    <link rel="stylesheet" href="cssbootstrap/bootstrap.css">
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
                            <h4 style="margin-left: auto; color: #0d47a1;">Examenes</h4>
                        </div>
                        <div class="container">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Codigo Cita</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Tipo Examen</th>
                                </tr>
                                </thead>
                                <tbody id="bodytable">
                                </tbody>
                            </table>
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
