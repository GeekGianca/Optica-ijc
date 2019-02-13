<?php
include "pdfhistoriaclinica.php";
require '../php/functions.php';
require_once '../php/UserSession.php';
$database = new Functions();
$user = null;
$isLogin = false;
$usrsess = new UserSession();
if (isset($_SESSION['userSession'])) {
    $antecedentes = array("Antecedentes personales","Antecedentes alergicos","Antecedentes familiares","Antecedentes especificos");
    $isLogin = true;
    $user = $usrsess->getCurrentUser();
    $result = $database->getchistories($user['users_idusers']);
    $pdf = new PDFHistoriaClinica();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(190, 6, 'DATOS DEL PACIENTE', 1, 1, 'B', 0);
    $pdf->Ln(7);
    $pdf->SetFont('Arial', 'I', 10);
    $pdf->Cell(100, 6, 'NOMBRE:' . $user['name'], 1, 0, 'B', 1);
    $pdf->Cell(90, 6, 'IDENTIFICACION:'. $user['users_idusers'], 1, 0, 'B', 1);
    $pdf->Ln(6);
    $pdf->Cell(100, 6, 'EPS:'. $user['eps'], 1, 0, 'B', 1);
    $pdf->Cell(90, 6, 'TELEFONO:'. $user['contact_phone'], 1, 0, 'B', 1);
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(190, 6, chr(127).' ANTECEDENTES MEDICOS DEL PACIENTE', 0, 0, 'B', 0);
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 12);
    foreach ($antecedentes as $indi => $value){
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(100, 6, '    '.$value, 0, 0, 'I', 0);
        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(100, 6, '        N/A', 0, 0, 'I', 0);
        $pdf->Ln(7);
    }
    $pdf->Cell(100, 6, '        *'. $result[0]['current_illness'], 0, 0, 'I', 0);
    $pdf->Output();
} else {
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
        <link rel="stylesheet" href="../mdl/mdl.min.css">
        <link rel="stylesheet" href="../css/styles.css">
        <script src="../jquery/jquery-3.3.1.js"></script>
        <script src="../mdl/material.min.js"></script>
    </head>
    <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <?php require '../header.php'; ?>
        <div class="android-content mdl-layout__content">
            <div class="mdl-typography--text-center">
                <div class="optic-be-together-section-none mdl-typography--text-center" style="margin-top: 150px; margin-bottom: 150px;">
                    <h1 class="logo-font-none optic-slogan-none">404</h1><!--Here info in the banner-->
                    <div class="logo-font-none optic-sub-slogan">Recurso no encontrado</div>
                </div>
            </div>
            <?php require '../footer.php'; ?>
        </div>
    </div>
    <a id="view-source"
       class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color-text--yellow mdl-color-text--accent">Agendar
        Cita</a>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="../js/app.js"></script>
    </body>
    </html>
<?php } ?>
