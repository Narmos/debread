<?php

/**
 * Point d'entrée du site
 */

include_once 'config/config.php';
include_once 'functions/functions.php';

/** Définition de la page courante */
if (isset($_GET['page']) AND !empty($_GET['page'])) {
    $page = strtolower(str_secur($_GET['page']));
} else {
    $page = 'home';
}

/** Tableau contenant toutes les pages */
$allPages = scandir('controllers/');

/** Vérification de l'existence de la page */
if (in_array($page . '_controller.php', $allPages)) {
    include_once 'controllers/' . $page . '_controller.php';
} else {
    include_once 'controllers/error_controller.php';
}