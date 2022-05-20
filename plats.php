<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Restau'GB</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="CSS/bootstrap.css" />
        <link rel="stylesheet" href="CSS/index.css" />
        <title>Document</title>
        <link rel="icon" href="logo-restaurant.png" type="image/icon type" />
    </head>
    <body class="d-flex flex-column min-vh-100">
        <div id="page">
            <div id="filtre"></div>
        </div>

        <main>
            <!--NAV----------------------------------------------------------------------------------------------------------->
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand">Restau'GB</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="collapse navbar-collapse justify-content-center"
                    id="navbarNavAltMarkup"
                >
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php"
                                >Accueil<span class="sr-only"
                                    >(current)</span
                                ></a
                            >
                        </li>
                    </ul>
                </div>
            </nav>
            <!--NAV----------------------------------------------------------------------------------------------------------->

            <!--Plats--------------------------------------------------------------------------------------------------------->
            <div class="container-fluid plats">
                <h1 class="souligner padTop">Plats:</h1>

                <div class="plats-c padTop d-flex justify-content-center" style="flex-wrap: wrap; margin-top: 20px; margin-bottom: 20px;">
                    <?php
                        include 'Panel_Gestion/database.php';

                        $img = mysqli_query($db, "SELECT * FROM liste_plats");
                        $nb = mysqli_num_rows($img);
                        $img = mysqli_fetch_assoc($img);

                        
                        for ($i = 1; $i <= $nb; $i++) {
                            $plat = mysqli_query($db, "SELECT * FROM liste_plats WHERE id = $i");
                            $plat = mysqli_fetch_assoc($plat);
                            echo '<div class="plats-c-img">
                                    <img src="Panel_Gestion/IMG/'.$plat['nomImage'].'" alt="'.$plat['nomPlat'].'" />
                                    <div class="plats-c-img-text">
                                        <h2>'.$plat['nomPlat'].'</h2>
                                        <p>'.$plat['prix'].'€</p>
                                    </div>
                                </div>';
                        }
                    ?>
                </div>
            </div>
            <!--Plats--------------------------------------------------------------------------------------------------------->
        </main>

        <footer class="text-center text-lg-start mt-auto">
            <!-- Copyright -->
            <div class="text-center p-3">
                Copyright &copy 2022 Restau'GB - Tous droits réservés
            </div>
            <!-- Copyright -->
        </footer>

        <script src="JS/jquery.js"></script>
        <script src="JS/bootstrap.bundle.js"></script>
        <script src="JS/index.js"></script>
    </body>
</html>
