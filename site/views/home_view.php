<!doctype html>
<html lang="fr">
<head>
    <?php include_once 'views/includes/head.php'?>
</head>

<body class="vertical-center-body">

    <?php include_once 'views/includes/github-corner.php'?>

    <div class="container">

        <?php include_once 'views/includes/header.php'?>

        <form method="post" action="article" class="m-auto">
            <div class="form-group">
                <input type="url" name="inputURL" id="inputURL" class="form-control form-control-lg" placeholder="https://url_de_l'article" required autofocus>
            </div>
            <div class="btn-group w-100">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Fais-moi voir !</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" title="Quotidiens supportés" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <h6 class="dropdown-header text-primary">Quotidiens supportés</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-muted small" href="https://www.24heures.ch" target="_blank"><img src="assets/images/24h_favicon.png" alt="icône 24heures.ch"> 24 heures</a>
                    <a class="dropdown-item text-muted small" href="https://www.tdg.ch" target="_blank"><img src="assets/images/tdg_favicon.png" alt="icône tdg.ch"> Tribune de Genève</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-muted small" href="https://www.landbote.ch" target="_blank"><img src="assets/images/landbote_favicon.png" alt="icône landbote.ch"> Der Landbote</a>
                    <a class="dropdown-item text-muted small" href="https://www.tagesanzeiger.ch" target="_blank"><img src="assets/images/tagesanzeiger_favicon.png" alt="icône tagesanzeiger.ch"> Tages-Anzeiger</a>
                    <a class="dropdown-item text-muted small" href="https://www.zuonline.ch" target="_blank"><img src="assets/images/zuonline_favicon.png" alt="icône zuonline.ch"> Zürcher Unterländer</a>
                    <a class="dropdown-item text-muted small" href="https://www.zsz.ch" target="_blank"><img src="assets/images/zsz_favicon.png" alt="icône zsz.ch"> Zürichsee-Zeitung</a>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header text-primary">Prochainement</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-muted small disabled" href="https://www.bilan.ch" target="_blank"><img src="assets/images/bilan_favicon.png" alt="icône bilan.ch"> Bilan</a>
                </div>
            </div>
        </form>

        <p class="mt-5 text-center text-muted">
            <a class="text-primary" role="button" data-toggle="tooltip" data-placement="left" title="Une fois l'extension installée, vous pouvez consulter les articles sur le site d'origine comme si vous aviez un abonnement, sans passer par debread.ch"><i class="fas fa-info-circle"></i></a>
            Extensions pour
            <a href="https://addons.mozilla.org/fr/firefox/addon/debread" target="_blank"><i class="fab fa-firefox"></i> Mozilla Firefox</a> | <a href="https://chrome.google.com/webstore/detail/debread/gmikgfcepemhnmidnhdmfclohkjlialb?hl=fr" target="_blank"><i class="fab fa-chrome"></i> Google Chrome</a>
        </p>

    </div>

    <?php include_once 'views/includes/footer.php'?>

</body>
</html>