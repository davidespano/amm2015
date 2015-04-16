<?php

include_once './model/Destinatario.php';
include_once './view/ViewDescriptor.php';
session_start();
$nome = isset($_REQUEST['nome']) ? $_REQUEST['nome'] : null;
$cognome = isset($_REQUEST['cognome']) ? $_REQUEST['cognome'] : null;
$via = isset($_REQUEST['via']) ? $_REQUEST['via'] : null;
$civico = isset($_REQUEST['civico']) ? $_REQUEST['civico'] : null;
$cap = isset($_REQUEST['cap']) ? $_REQUEST['cap'] : null;
$citta = isset($_REQUEST['citta']) ? $_REQUEST['citta'] : null;

$messaggio = '<ul>';
$errori = 0;

$destinatario = new Destinatario();


if (!$destinatario->setNome($nome)) {
    $messaggio .= '<li>Specificare il nome del destinatario</li>';
    $errori++;
}

if (!$destinatario->setCognome($cognome)) {
    $messaggio .= '<li>Specificare il cognome del destinatario</li>';
    $errori++;
}
if (!$destinatario->setVia($via)) {
    $messaggio .= '<li>Specificare la via del destinatario</li>';
    $errori++;
}

if (!$destinatario->setNumeroCivico($civico)) {
    $messaggio .= '<li>Specificare un numero civico valido</li>';
    $errori++;
}

if (!$destinatario->setCitta($citta)) {
    $messaggio .= '<li>Specificare la citt&agrave; del destinatario</li>';
    $errori++;
}
if (!$destinatario->setCap($cap)) {
    $messaggio .= '<li>Specificare un CAP valido</li>';
    $errori++;
}

$messaggio .= '</ul>';

$_SESSION['destinatario'] = $destinatario;

$vd = new ViewDescriptor();
if ($errori > 0) {
    $vd->setMessaggioErrore($messaggio);
}
$vd->setTitolo("MVC - Test ");
$vd->setMenuFile('view/menu.php');
$vd->setLogoFile('view/logo.php');
$vd->setLeftBarFile('view/leftBar.php');
$vd->setRightBarFile('view/rightBar.php');
$vd->setContentFile('view/contentDimensioni.php');

// richiamo la vista
require 'view/master.php';

