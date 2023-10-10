<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Projets</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <?php
    require_once('template_menu.php');
    renderMenuToHTML('projets');
    ?>


    <!-- Page Content-->

    <?php
    require_once('template_header.php');
    ?>
    <div class="container-fluid p-0">

        <!-- Experience-->
        <section class="resume-section" id="experience">
            <div class="resume-section-content">
                <h2 class="mb-5">Projets</h2>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">Etudiant ingénieur</h3>
                        <div class="subheading mb-3">IMT Nord Europe</div>
                        <p>En tant qu'étudiant en deuxième année d'ingénierie numérique, je me passionne pour la
                            création de solutions numériques innovantes qui repoussent les limites de la technologie.
                            Mon expertise se situe principalement dans deux domaines captivants : la conception de sites
                            web avancés et le développement de jeux de cartes élaborés.</p>

                        <p>La création de sites web ultra-développés est l'une de mes principales passions. Je
                            m'efforce de concevoir des plateformes en ligne qui allient à la fois une esthétique
                            exceptionnelle et une fonctionnalité remarquable. Mon objectif est de créer des expériences
                            utilisateur exceptionnelles en utilisant les dernières technologies du web, comme le
                            développement front-end et back-end, l'optimisation des performances, la sécurité renforcée
                            et l'accessibilité. Chaque site que je construis est conçu sur mesure pour répondre aux
                            besoins spécifiques de mes clients, en offrant une interface intuitive et une expérience
                            utilisateur fluide.</p>

                        <p>En parallèle de mon travail sur les sites web, j'ai également développé une passion pour la
                            création de jeux de cartes élaborés. Mon expertise en programmation me permet de concevoir
                            des jeux de cartes interactifs, aussi bien en ligne qu'en version physique, qui offrent une
                            expérience immersive et divertissante. J'ai travaillé sur des projets allant des jeux de
                            cartes classiques revisités aux jeux de stratégie complexes, en veillant à ce que chaque
                            détail, des règles du jeu à l'interface utilisateur, soit soigneusement élaboré pour
                            garantir une expérience de jeu exceptionnelle.</p>

                        <p>Mon parcours en ingénierie numérique m'a également permis de développer des compétences
                            essentielles telles que la résolution de problèmes complexes, la gestion de projets et la
                            collaboration au sein d'équipes multidisciplinaires. Je suis constamment à l'affût des
                            dernières tendances technologiques et des meilleures pratiques de l'industrie pour m'assurer
                            que mes projets restent à la pointe de l'innovation.</p>
                    </div>
                </div>
                <?php
                require_once('template_footer.php');
                ?>
        </section>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>