<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Index</title>
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

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="index.php">
            <span class="d-block d-lg-none">Tom Sowden</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2"
                    src="assets/img/profile.jpg" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" id="currentpage" href="index.php">Index</a>
                </li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="cv.html">CV</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="projets.html">Projets</a></li>
            </ul>
        </div>
    </nav>

    <!-- Page Content-->

    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="about">
            <div class="resume-section-content">
            <?php
            // Définit le fuseau horaire par défaut à utiliser.
            date_default_timezone_set('Europe/Paris');
            echo date("F j, Y, g:i a");
            

            ?>


                <h1 class="mb-0">
                    Tom
                    <span class="text-primary">Sowden</span>
                </h1>
                <div class="subheading mb-5">
                    263 Rue du Grand Bail - 59500 Douai
                    <a href="mailto:name@email.com">tsowden.sup@email.com</a>
                </div>
                <p class="lead mb-5">Bienvenue sur ma page d'accueil. Vous noterez que j'ai fait mon site tout seul sans
                    aucun template. </p>

            </div>

    </div>
    <div class="container-fluid p-0 mb-5">
        <p> Disponibilités : </p>
        <table>
        <?php
            $jours = array("Lundi : ", "Mardi : ", "Mercredi : ", "Jeudi : ", "Vendredi : ");

            $disponibilite = "9:00 - 12:00, 14:00 - 17:00";
                foreach ($jours as $jour) {
                    echo "<tr>";
                    echo "<td>$jour</td>";
                    echo "<td>$disponibilite</td>";
                    echo "</tr>";
            }
        ?>
            </table>

    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>