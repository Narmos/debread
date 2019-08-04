<?php

/**
 * Déclaration des constantes
 */

// Chemins
define('BASE_PATH', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . substr($_SERVER["PHP_SELF"], 0, -9));

// Information du site
define('WEBSITE_TITLE', 'Debread - Débrideur de quotidiens suisses');
define('WEBSITE_NAME', 'Debread');
define('WEBSITE_URL', 'https://debread.ch');
define('WEBSITE_DESCRIPTION', 'Lire entièrement les articles réservés aux abonnés de certains quotidiens suisses (p. ex., www.24heures.ch, www.tdg.ch)');