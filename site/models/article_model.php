<?php

/**
 * Classe Article
 * 
 * Pour créer un objet qui contient les éléments d'un article
 * dont l'URL a été passée en paramètre
 */

class Article
{
    public $title;
    public $subtitle;
    public $picture;
    public $picture_caption;
    public $content;

    function __construct($url)
    {
        // On initialise cURL
        $ch = curl_init();
        // On lui transmet la variable qui contient l'URL
        curl_setopt($ch, CURLOPT_URL, $url);
        // On lui demande de nous retourner la page (html)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // On envoie un user-agent pour ne pas être considéré comme un bot malicieux
        curl_setopt($ch, CURLOPT_USERAGENT, 'Un visiteur de Debread (debread.ch');
        // On exécute notre requête et met le résultat dans une variable
        $page = curl_exec($ch);
        // On ferme la connexion cURL
        curl_close($ch);

        // On crée un nouvel objet DOMDocument
        $html = new DOMDocument();
        // On y charge le contenu html de la page qu'on a récupéré avec cURL
        @$html->loadHTML($page);
        // On crée un nouvel objet DOMXPath
        $xpath = new DOMXPath($html);

        // On récupère le titre
        $title = $xpath->query("//div[@id='article']/h1");
        // On récupère le sous-titre
        $subtitle = $xpath->query("//div[@id='article']/h3");
        // On récupère le keyword du sous-titre
        $subtitle_keyword = $xpath->query("//div[@id='article']/h3/span");

        // Si il y a un keyword, on le supprime du sous-titre
        if ($subtitle_keyword->length > 0) {
            $keyword = $subtitle_keyword->item(0);
            $subtitle[0]->removeChild($keyword);
        }

        // On récupère l'image
        $picture = $xpath->query("//img[@id='articlefeature']/@src");
        // On récupère la légende de l'image
        $picture_caption = $xpath->query("//div[@id='topElement']/p");
        // On récupère le contenu
        $content = $xpath->query("//div[@id='mainContent']/p");
        // On récupère le bout de javascript dans le premier paragraphe
        $javascript_content = $xpath->query("//div[@id='mainContent']/p/script");

        // Si il y a du javascript, on le supprime du premier paragraphe
        if ($javascript_content->length > 0) {
            $javascript = $javascript_content->item(0);
            $content[0]->removeChild($javascript);
        }

        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->picture = $picture;
        $this->picture_caption = $picture_caption;
        $this->content = $content;
    }
}