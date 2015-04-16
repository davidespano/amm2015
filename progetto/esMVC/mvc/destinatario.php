<?php
include_once './model/Destinatario.php';
include_once './view/ViewDescriptor.php';

session_start();
$destinatario = new Destinatario();


if (isset($_SESSION['destinatario'])) {
    $destinatario = $_SESSION['destinatario'];
}

$vd = new ViewDescriptor();
$vd->setTitolo("MVC - Test ");
$vd->setMenuFile('view/menu.php');
$vd->setLogoFile('view/logo.php');
$vd->setLeftBarFile('view/leftBar.php');
$vd->setRightBarFile('view/rightBar.php');
$vd->setContentFile('view/contentDestinatario.php');

// richiamo la vista
require  'view/master.php';
?>
