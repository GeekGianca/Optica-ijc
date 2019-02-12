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
    <link rel="stylesheet" href="cssbootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/cardstyles.css">
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="mdl/material.min.js"></script>
</head>
<body onload="loadinfo(<?php echo $user['users_idusers']; ?>)">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <?php require 'header.php'; ?>
    <div class="android-content mdl-layout__content">
        <div class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
            <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
                <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
                    <main class="mdl-layout__content">
                        <div class="mdl-typography--text-center">
                            <h4 style="margin-left: auto; color: #0d47a1;">Registro de Consultas</h4>
                        </div>
                        <div class="mdl-grid" style="margin-left: 70px;">
                            <div class="mdl-cell mdl-cell--4-col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Formulario de registro</h5>
                                        <form id="consultaform">
                                            <div class="form-group">
                                                <label for="idusuario">Identificacion</label>
                                                <input type="text" class="form-control" id="idusuario" placeholder="100********" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="fechacita">Fecha Consulta</label>
                                                <input type="date" class="form-control" id="fechacita" placeholder="Año-Mes-Dia" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="horacita">Fecha Consulta</label>
                                                <input type="time" class="form-control" id="horacita" placeholder="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="razon">Razon</label>
                                                <textarea class="form-control" id="razon" rows="4" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="sintomas">Sintomas</label>
                                                <textarea class="form-control" id="sintomas" rows="4" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="tconsulta">Tipo Consulta</label>
                                                <select class="form-control" id="tconsulta">
                                                    <option>---</option>
                                                    <option>General</option>
                                                    <option>Especializada</option>
                                                    <option>Otra</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    Solicitar
                                                </button>
                                                <button type="reset" class="btn btn-sm btn-danger">
                                                    Cancelar
                                                </button>
                                            </div>
                                        </form>
                                        <div id="info" class="alert" role="alert">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--6-col">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Codigo</th>
                                        <th scope="col">Codigo examen</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Tipo</th>
                                    </tr>
                                    </thead>
                                    <tbody id="consultastabla">
                                    </tbody>
                                </table>
                            </div>
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
