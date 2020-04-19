$(document).ready(function() {

    // Suppression des certains éléments dans le contenu de l'article
    $('.article-content > p > script').remove();
    $('.article-content > p > iframe').parent().remove();

    // Initialisation des Tooltips de Bootstrap
    $("[data-toggle='tooltip']").tooltip();

    // Retour en haut de page
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $("#back-to-top").fadeIn();
        } else {
            $("#back-to-top").fadeOut();
        }
    });

    $("#back-to-top").click(function () {
        $("#back-to-top").tooltip("hide");
        $("body,html").animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    // Copie d'URL dans le presse papier    
    $("#copyShareURL").click(function () {
        var url = $("input#shareURL").val();
        navigator.clipboard.writeText(url);
        $(".copy-check").show();
        return false;
    });

    $(".dropdown").on("hide.bs.dropdown", function () {
        $(".copy-check").hide();
    });

});