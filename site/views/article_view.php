<!doctype html>
<html lang="fr">
<head>
    <?php include_once 'views/includes/head.php'?>
</head>

<body>

    <nav class="navbar navbar-dark bg-primary">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="./"><i class="fas fa-arrow-left"></i> Retour</a>
            </li>
        </ul>
        <?php if (isset($error) AND $error == false): ?>
            <span class="dropdown">
                <a class="nav-link dropdown-toggle navbar-text" href="#" title="Actions" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#" id="copyShareURL"><i class="far fa-clipboard"></i> Copier l'URL de l'article débridé<i class="fas fa-check copy-check text-success ml-2"></i></a>
                    <a class="dropdown-item" href="<?= $url ?>" target="_blank"><i class="far fa-eye"></i> Voir l'article original</a>
                </div>
            </span>
        <?php endif; ?>
    </nav>

    <div class="container mt-5">

        <?php if (!isset($error) OR $error == true): ?>

            <div class="alert alert-primary" role="alert">
                <h4 class="alert-heading"><i class="fas fa-grin-beam-sweat"></i> Ouups! je n'ai pas trouvé l'article</h4>
                L'URL de l'article est invalide ou ne provient pas d'un site supporté.
            </div>
            <div class="alert alert-warning mt-3" role="alert">
                <small><i class="fas fa-exclamation-triangle"></i> La version "mobile" des articles n'est pas encore supportée. (par ex. https://<strong>m</strong>.24heures.ch/xxx)</small>
            </div>

        <?php else: ?>

            <article>

                <header>
                    <h1 class="mb-4"><?= $article->title[0]->nodeValue ?></h1>
                    <h4 class="mb-4"><?= $article->subtitle[0]->nodeValue ?></h4>
                </header>

                <div class="article-content">

                    <?php if ($article->picture->length > 0): ?>
                        <figure class="figure mb-4">
                            <img src="<?= $article->picture[0]->nodeValue ?>" class="figure-img img-fluid rounded" alt="image de l\'article">
                            <figcaption class="figure-caption"><?= $article->picture_caption[0]->nodeValue ?></figcaption>
                        </figure>
                    <?php endif; ?>

                    <?php foreach ($article->content as $paragraphe): ?>
                        <p class="mb-4"><?= $paragraphe->nodeValue ?></p>
                    <?php endforeach; ?>

                </div>

                <input type="url" id="shareURL" class="share-url" value="<?= BASE_PATH ?>article?url=<?= $url ?>">

            </article>

        <?php endif; ?>

    </div>

    <?php  include_once 'views/includes/footer.php' ?>

    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Retour en haut de la page" data-toggle="tooltip" data-placement="left"><i class="fas fa-chevron-up"></i></a>

</body>
</html>