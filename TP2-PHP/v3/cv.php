<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CV</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
<?php
require_once('template_header.php');
?>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="cv.php">
            <span class="d-block d-lg-none">Tom Sowden</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2"
                    src="assets/img/profile.jpg" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Index</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" id="currentpage" href="cv.php">CV</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="projets.php">Projets</a></li>
            </ul>
        </div>
    </nav>

    <!-- Page Content-->
    <div class="container-fluid p-0">

        <!-- CV-->
        <section class="resume-section" id="education">
            <div class="resume-section-content">
                <h2 class="mb-5">CV</h2>
                <h3 class="mb-0-perso">Education</h3>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-0">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">Ecole d'ingénieurs IMT Nord-Europe</h3>
                        <div class="subheading mb-3">Douai 59500</div>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">Septembre 2022 - Now</span></div>
                </div>
                <div class="d-flex flex-column flex-md-row justify-content-between">
                    <div class="flex-grow-">
                        <h3 class="mb-0">Université de Paris Cité, Licence de Physique</h3>
                        <div class="subheading mb-0">Paris 75013</div>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">Septembre 2019 - Juillet 2022</span></div>
                </div>
                <div class="mb-4"></div>
                <h3 class="mb-0-perso">Experience</h3>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-0">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">Stage de 3 mois au CERI Energie et Environnement de l'IMT Nord-Europe</h3>
                        <div class="subheading mb-0">Douai 59500</div>
                        <p>Traitement numérique des données de pollution atmosphérique (développement de programmes
                            Python). </p>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">Mai 2023 - Août 2023</span></div>
                </div>


            </div>
        </section>

    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>