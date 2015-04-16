<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>MVC - test</title>

        <meta name="keywords" content="AMM esami docente" />
        <meta name="description" content="Una pagina per gestire le funzioni dei docenti" />
        <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />
        <link href="../css/responsive.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    <?php
    session_start();
    $peso = isset($_REQUEST['peso']) ? $_REQUEST['peso'] : null;
    $peso = filter_var($peso, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);

    $larghezza = isset($_REQUEST['larghezza']) ? $_REQUEST['larghezza'] : null;
    $larghezza = filter_var($larghezza, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);

    $altezza = isset($_REQUEST['altezza']) ? $_REQUEST['altezza'] : null;
    $altezza = filter_var($altezza, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);

    $profondita = isset($_REQUEST['profondita']) ? $_REQUEST['profondita'] : null;
    $profondita = filter_var($profondita, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);

    $messaggio = '';
    $errori = 0;

    if ($peso != null && $peso <= 15) {
        $_SESSION['peso'] = $peso;
    } else {
        $messaggio .= '<li>Specificare un peso minore di 15 kg</li>';
        $errori++;
    }

    if ($larghezza != null) {
        $_SESSION['larghezza'] = $larghezza;
    } else {
        $messaggio .= '<li>Specificare una larghezza inferiore ai 50 cm</li>';
        $errori++;
    }
    if ($altezza != null) {
        $_SESSION['altezza'] = $altezza;
    } else {
        $messaggio .= '<li>Specificare una altezza inferiore ai 50 cm</li>';
        $errori++;
    }

    if ($profondita != null) {
        $_SESSION['profondita'] = $profondita;
    } else {
        $messaggio .= '<li>Specificare una profondita inferiore ai 50 cm</li>';
        $errori++;
    }
    ?>
    <body>
        <div id="page">
            <header>
                <div class="social">

                    <ul>
                        <li id="facebook"><a href="www.facebook.com">facebook</a></li>
                        <li id="twitter"><a href="https://twitter.com/">twitter</a></li>
                        <li id="linkedin"><a href="http://www.linkedin.com/">linkedin</a></li>
                    </ul>
                </div>
                <!--  header -->
                <div id="header">
                    <div id="logo">
                        <h1>MVC Test</h1>
                    </div>

                    <!-- select per la versione del menu mobile -->
                    <select class="menu">
                        <ul>
                            <li><a class="current_page_item" href="#">Home</a></li>
                        </ul>
                    </select>
                    <!-- tabs -->
                    <div id="menu">
                        <ul>
                            <li><a class="current_page_item" href="#">Home</a></li>
                        </ul>                        </div>
                </div>
            </header>
            <!-- start page -->
            <!--  sidebar 1 -->
            <div id="sidebar1">
                <ul>
                    <li id="categories">
                        <h2 class="icon-title">Navigazione</h2>
                        <ul>
                            <li><a href="login">Home</a></li>
                        </ul>
                    </li>
                    <li id="external">
                        <h2 class="icon-title">Link esterni</h2>
                        <ul>
                            <li><a href="http://www.unica.it/">Universit&agrave; di Cagliari</a></li>
                            <li><a href="http://www.unica.it/">Facolt&agrave;</a></li>

                        </ul>
                    </li>

                </ul>
            </div>

            <div id="sidebar2">
                <h2  class="icon-title" id="help">Istruzioni</h2>
                <p>
                    Pagina per l'accesso al sistema.
                </p>
            </div>

            <!-- contenuto -->
            <div id="content">
                <?php
                if ($errori > 0) {
                    ?>
                    <div class="error">
                        Correggere i seguenti errori
                        <ul>
                            <?= $messaggio ?>
                        </ul>
                        <form method="get" action="dimensioni.php">
                            <button type="submit" value="indietro">Indietro</button>
                        </form>
                    </div>
                    <?php
                } else {
                    ?>

                    <h3>Destinatario</h3>
                    <ul>
                        <li><strong>Nome:</strong><?= $_SESSION['nome'] ?></li>
                        <li><strong>Cognome:</strong><?= $_SESSION['cognome'] ?></li>
                        <li><strong>Via:</strong><?= $_SESSION['via'] ?></li>
                        <li><strong>Numero Civico:</strong><?= $_SESSION['civico'] ?></li>
                        <li><strong>Citt&agrave;:</strong><?= $_SESSION['citta'] ?></li>
                        <li><strong>CAP:</strong><?= $_SESSION['cap'] ?></li>
                    </ul>
                    <h3>Pacco</h3>
                    <ul>
                        <li><strong>Altezza:</strong><?= $_SESSION['altezza'] ?></li>
                        <li><strong>Larghezza:</strong><?= $_SESSION['larghezza'] ?></li>
                        <li><strong>Profondit&agrave;:</strong><?= $_SESSION['profondita'] ?></li>
                        <li><strong>Peso:</strong><?= $_SESSION['peso'] ?></li>
                    </ul>


                    <?php
                }
                ?>

            </div>

            <div class="clear">
            </div>
            <!--  footer -->
            <footer>
                <div id="footer">
                    <p>
                        Applicazione d'esempio per l'esame di Amministrazione di Sistema
                    </p>


                </div>
                <div class="validator">
                    <p>
                        <a href="http://validator.w3.org/check/referer" class="xhtml" title="Questa pagina contiene HTML valido">
                            <abbr title="eXtensible HyperText Markup Language">HTML</abbr> Valido</a>
                        <a href="http://jigsaw.w3.org/css-validator/check/referer" class="css" title="Questa pagina ha CSS validi">
                            <abbr title="Cascading Style Sheets">CSS</abbr> Valido</a>
                    </p>
                </div>
            </footer>
        </div>
    </body>
</html>