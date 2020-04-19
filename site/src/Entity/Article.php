<?php

namespace App\Entity;

use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

class Article
{

    private $title;
    private $subtitle;
    private $picture;
    private $pictureCaption;
    private $content;
    private $url;

    public function __construct($url)
    {
        // On prépare la requête HTTP
        $httpClient = HttpClient::create(['headers' => [
            'User-Agent' => 'Un visiteur de debread.ch',
        ]]);
        // On exécute la requête HTTP
        $response = $httpClient->request('GET', $url); 
        // On récupère le contenu de la page
        $html = new Crawler($response->getContent());

        // On récupère le titre
        $title = $html->filterXPath('//div[@id="article"]/h1');
        $title = ($title->count() > 0) ? $title->text() : null;

        // On récupère le sous-titre
        $subtitle = $html->filterXPath("//div[@id='article']/h3");
        $subtitle = ($subtitle->count() > 0) ? $subtitle->html() : null;

        // On récupère l'image
        $picture = $html->filterXPath("//img[@id='articlefeature']/@src");
        $picture = ($picture->count() > 0) ? $picture->text() : null;

        // On récupère la légende de l'image
        $pictureCaption = $html->filterXPath("//div[@id='topElement']/p");
        $pictureCaption = ($pictureCaption->count() > 0) ? $pictureCaption->text() : null;

        // On récupère le contenu
        $content = $html->filterXPath("//div[@id='mainContent']/p")->each(function (Crawler $paragraph, $i) {
            return $paragraph->html();
        });
        $content = (!empty($content)) ? $content : null;

        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->picture = $picture;
        $this->pictureCaption = $pictureCaption;
        $this->content = $content;
        $this->url = $url;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }

    public function setSubtitle($subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getPictureCaption()
    {
        return $this->pictureCaption;
    }

    public function setPictureCaption($pictureCaption): self
    {
        $this->pictureCaption = $pictureCaption;

        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url): self
    {
        $this->url = $url;

        return $this;
    }
}
