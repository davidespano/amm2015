<?php

include_once './model/Destinatario.php';
include_once './model/Pacco.php';
include_once './view/ViewDescriptor.php';

session_start();
$peso = isset($_REQUEST['peso']) ? $_REQUEST['peso'] : null;
$larghezza = isset($_REQUEST['larghezza']) ? $_REQUEST['larghezza'] : null;
$altezza = isset($_REQUEST['altezza']) ? $_REQUEST['altezza'] : null;
$profondita = isset($_REQUEST['profondita']) ? $_REQUEST['profondita'] : null;


if (isset($_SESSION['destinatario'])) {
    $destinatario = $_SESSION['destinatario'];
} else {
    $destinatario = new Destinatario();
}

if (isset($_SESSION['pacco'])) {
    $pacco = $_SESSION['pacco'];
} else {
    $pacco = new Pacco();
}

$messaggio = '<ul>';
$errori = 0;

if (!$pacco->setPeso($peso)) {
    $messaggio .= '<li>Specificare un peso minore di 15 kg</li>';
    $errori++;
}

if (!$pacco->setLarghezza($larghezza)) {
    $messaggio .= '<li>Specificare una larghezza inferiore ai 50 cm</li>';
    $errori++;
}

if (!$pacco->setAltezza($altezza)) {
    $messaggio .= '<li>Specificare una altezza inferiore ai 50 cm</li>';
    $errori++;
}

if (!$pacco->setProfondita($profondita)) {
    $messaggio .= '<li>Specificare una profondita inferiore ai 50 cm</li>';
    $errori++;
}

$_SESSION['pacco'] = $pacco;
$messaggio .= '</ul>';

$vd = new ViewDescriptor();
if ($errori > 0) {
    $vd->setMessaggioErrore($messaggio);
}
$vd->setTitolo("MVC - Test ");
$vd->setMenuFile('view/menu.php');
$vd->setLogoFile('view/logo.php');
$vd->setLeftBarFile('view/leftBar.php');
$vd->setRightBarFile('view/rightBar.php');
$vd->setContentFile('view/contentRiassunto.php');

// richiamo la vista
require 'view/master.php';
