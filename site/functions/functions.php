<?php

/**
 * Debug plus lisible des différentes variables
 * @param $var
 */
function debug($var)
{
    echo '<pre>';
        var_dump($var);
    echo '</pre>';
}

/**
 * Permet de sécuriser une chaine de caractères
 * @param $string
 * @return string
 */
function str_secur($string)
{
    $string = trim($string);				// Suprime les espaces superflues en début et fin de chaine
	$string = stripslashes($string);		// Supprime les antislashs d'une chaîne
	$string = strip_tags($string);		    // Supprime les balises html et php
	$string = htmlspecialchars($string);    // Convertit les caractères spéciaux en entités HTML
	return $string;
}