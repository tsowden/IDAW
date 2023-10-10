<!doctype html>
<html>
<?php
function renderMenuToHTML($currentPageId)
{
    // un tableau qui d\'efinit la structure du site

    $mymenu = array(
        // idPage titre
        'index' => array('Index'),
        'cv' => array('CV'),
        'projets' => array('Projets'),
        'infos_pratiques' => array('Infos Pratiques')
    );
    echo '
    <head>
    <title>Tom Sowden</title>
    <link rel="stylesheet" href="style1.css" type="text/css" media="screen" title="default" charset="utf-8" />
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="projets.php">
            <span class="d-block d-lg-none">Tom Sowden</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/profile.jpg" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">';
    foreach ($mymenu as $pageId => $pageParameters) {
        if ($pageId == $pageParameters) {
            echo '<li class="nav-item"><a class="nav-link js-scroll-trigger"id=currentpage href="index.php">' . $pageParameters . '</a></li>';
        } else {
            echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">' . $pageParameters . '</a></li>';
        }
        // echo '
        // <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Index</a></li>
        //         <li class="nav-item"><a class="nav-link js-scroll-trigger" href="cv.php">CV</a></li>
        //         <li class="nav-item"><a class="nav-link js-scroll-trigger" href="projets.php">Projets</a></li>
        //         <li class="nav-item"><a class="nav-link js-scroll-trigger" href="infos-pratiques.php">Infos Pratiques</a></li>';
    }
    echo '
        </ul>
                </div>
            </nav>
            </head>';
}

?>