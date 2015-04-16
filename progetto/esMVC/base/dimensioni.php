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
    $nome = isset($_REQUEST['nome']) ? $_REQUEST['nome'] : null;
    $cognome = isset($_REQUEST['cognome']) ? $_REQUEST['cognome'] : null;
    $via = isset($_REQUEST['via']) ? $_REQUEST['via'] : null;
    $civico = isset($_REQUEST['civico']) ? $_REQUEST['civico'] : null;
    $civico = filter_var($civico, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
    $cap = isset($_REQUEST['cap']) ? $_REQUEST['cap'] : null;
    $cap = filter_var($cap, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/[0-9]{5}/'), FILTER_NULL_ON_FAILURE));
    $citta = isset($_REQUEST['citta']) ? $_REQUEST['citta'] : null;

    $messaggio = '';
    $errori = 0;

    if ($nome != null) {
        $_SESSION['nome'] = $nome;
    } else {
        $messaggio .= '<li>Specificare il nome del destinatario</li>';
        $errori++;
    }

    if ($cognome != null) {
        $_SESSION['cognome'] = $cognome;
    } else {
        $messaggio .= '<li>Specificare il cognome del destinatario</li>';
        $errori++;
    }
    if ($via != null) {
        $_SESSION['via'] = $via;
    } else {
        $messaggio .= '<li>Specificare la via del destinatario</li>';
        $errori++;
    }
    
     if ($civico != null) {
        $_SESSION['civico'] = $via;
    } else {
        $messaggio .= '<li>Specificare un numero civico valido</li>';
        $errori++;
    }
    
     if ($citta != null) {
        $_SESSION['citta'] = $citta;
    } else {
        $messaggio .= '<li>Specificare la citt&agrave; del destinatario</li>';
        $errori++;
    }
    
     if ($cap != null) {
        $_SESSION['cap'] = $cap;
    } else {
        $messaggio .= '<li>Specificare un CAP valido</li>';
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
                    if($errori > 0){
                ?>
                <div class="error">
                    Correggere i seguenti errori
                    <ul>
                          <?= $messaggio ?>
                    </ul>
                    <form method="get" action="destinatario.php">
                        <button type="submit" value="indietro">Indietro</button>
                    </form>
                </div>
                <?php 
                    } else {
                        
                    
                ?>
                <div class="input-form">
                    <h3>Inserisci l'indirizzo del destinatario</h3>

                    <form method="post" action="riassunto.php">
                        <label for="larghezza">Larghezza</label>
                        <input type="text" name="larghezza" id="larghezza"/>
                        <br>
                        <label for="altezza">Altezza</label>
                        <input type="text" name="altezza" id="altezza"/> 
                        <label for="via">Profondit&agrave;</label>
                        <input type="text" name="profondita" id="profondita"/> 
                        <label for="via">Peso;</label>
                        <input type="text" name="peso" id="peso"/> 
                        <br/>
                        <button type="submit" value="destinatario">Spedisci</button>
                    </form>
                </div>
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