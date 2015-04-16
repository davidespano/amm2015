<?php
include_once './model/Destinatario.php';
?>

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
    $destinatario = new Destinatario();


    if (isset($_SESSION['destinatario'])) {
        $destinatario = $_SESSION['destinatario'];
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
                <div class="input-form">
                    <h3>Inserisci l'indirizzo del destinatario</h3>

                    <form method="post" action="dimensioni.php">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" value="<?= $destinatario->getNome() ?>"/>
                        <br>
                        <label for="cognome">Cognome</label>
                        <input type="text" name="cognome" id="cognome" value="<?= $destinatario->getCognome() ?>"/> 
                        <label for="via">Via</label>
                        <input type="text" name="via" id="via" value="<?= $destinatario->getVia() ?>"/> 
                        <label for="civico">Numero Civico</label>
                        <input type="text" name="civico" id="civico" value="<?= $destinatario->getNumeroCivico() ?>"/> 
                        <label for="citta">Citt&agrave;</label>
                        <input type="text" name="citta" id="citta" value="<?= $destinatario->getCitta() ?>"/> 
                        <label for="cap">CAP</label>
                        <input type="text" name="cap" id="cap" value="<?= $destinatario->getCap() ?>"/> 
                        <br/>
                        <button type="submit" value="destinatario">Salva</button>
                    </form>
                </div>


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