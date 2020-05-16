<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article", methods="GET|POST")
     */
    public function index(Request $request)
    {
        $article = null;
        $shareUrl = null;
        $existError = false;
        $existPicture = false;

        // On récupère l'url de l'article
        if ($request->get('url') !== null) {
            $url = $request->get('url');

            // Regex pour matcher une URL FTP
            $regex_ftp = '%^(?:(?:ftps?)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu';

            // Si URL http(s) saisie, on récupère l'article
            if (!preg_match($regex_ftp, $url))
            {
                $article = new Article($url);

                // Si il y a du contenu dans le titre et l'article
                if ($article->getTitle() !== null AND $article->getContent() !== null) {

                    // Si l'article contient une image
                    if ($article->getPicture() !== null) {
                        $existPicture = true;
                    }
                    
                    // On génère l'url complète de l'article débridé
                    $shareUrl = $this->generateUrl('article', array('url' => $url), UrlGeneratorInterface::ABSOLUTE_URL);
                } else {
                    $existError = true;
                }
            } else {
                $existError = true;
            }
        } else {
            $existError = true;
        }

        /* return $this->render('article/article.html.twig', [
            "article" => $article,
            "shareUrl" => $shareUrl,
            "existError" => $existError,
            "existPicture" => $existPicture
        ]); */
        return $this->render('close/close.html.twig');
    }
}
