<?php

include_once 'models/article_model.php';
$error = false;

// Si une URL a été envoyée par le formulaire ou en paramètre
if (isset($_POST['inputURL']) OR isset($_GET['url'])) {
    $url = (isset($_POST['inputURL'])) ? str_secur($_POST['inputURL']) : str_secur($_GET['url']);

    // Regex pour matcher une URL FTP
    $regex_ftp = '%^(?:(?:ftps?)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu';

    // Si URL http(s) saisie, on récupère l'article
    if (!preg_match($regex_ftp, $url)) {
        $article = new Article($url);

        // Si le titre et le contenu de l'article sont vides
        if ($article->title->length < 1 AND $article->content->length < 1) {
            $error = true;
        }
    } else {
        $error = true;
    }
} else {
    $error = true;
}

include_once 'views/article_view.php';