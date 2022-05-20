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
        <link
            rel="icon"
            href="resto/logo-restaurant.png"
            type="image/icon type"
        />
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
                            <a class="nav-link"
                                >Accueil<span class="sr-only"
                                    >(current)</span
                                ></a
                            >
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="plats.php">Plats</a>
                        </li>
                        <li class="nav-item active">
                            <a onclick="smoothScroll()" class="nav-link"
                                >Réservation</a
                            >
                        </li>
                        <li class="nav-item active">
                            <a onclick="smoothScroll2()" class="nav-link"
                                >Contacts</a
                            >
                        </li>
                    </ul>
                </div>
            </nav>
            <!--NAV----------------------------------------------------------------------------------------------------------->

            <!--Accueil------------------------------------------------------------------------------------------------------->
            <div class="container-fluid accueil noPadding">
                <img src="resto/logo-restaurant.png" alt="Logo restaurant" />
                <h1>Bienvenue chez "Restau'GB"!</h1>
            </div>
            <!--Accueil------------------------------------------------------------------------------------------------------->

            <!--Restaurant---------------------------------------------------------------------------------------------------->
            <div
                class="container-fluid restaurant d-flex flex-column justify-content-center padTop"
            >
                <div class="container">
                    <h3 style="font-size: larger">NOTRE HISTOIRE</h3>
                    <h1>SINCE 2022</h1>
                    <br />
                    <p>
                        The place to eat(1) ! Pour un déjeuner en famille ou
                        entre collègues, un dîner avec des potes, un repas en
                        amoureux ou tout simplement pour faire plaisir aux
                        enfants, Restau'GB est depuis toujours le restaurant qui
                        vous ressemble.
                    </p>
                    <br />
                    <p>
                        Créée en 2022 par Dylan LEMAIRE, Maxime DE PRIESTER
                        ainsi que Sophiane ACHERAIOU, Restau'GB est une
                        enseigne de restauration spécialisée dans la
                        gastronomie, inspirée par la Russie. Au fil des ans,
                        l'enseigne se développe à l'échelle nationale pour
                        devenir leader de la restauration assise en France.
                        Restau'GB se dote de sa propre centrale d’achats et de
                        découpe de viande et continue son expansion en
                        développant ses activités à l’étranger (Russie, Canada).
                    </p>
                </div>
                <br />
                <p style="text-align: left; font-size: small">
                    (1) L’endroit où il faut manger
                </p>
                <p style="text-align: left; font-size: small">
                    PS: Nos pièces de viande sont découpées dans notre atelier
                    par des bouchers expérimentés et des professionnels
                    passionnés
                </p>
            </div>
            <!--Restaurant---------------------------------------------------------------------------------------------------->

            <!--Localisation-------------------------------------------------------------------------------------------------->

            <div class="container-fluid localisation padTop">
                <h1 class="souligner">Localisation</h1>
                <br />

                <div
                    class="container noPadding d-flex flex-row justify-content-center"
                    style="flex-wrap: wrap"
                >
                    <div class="container noPadding loc-cont-width">
                        <h3>Restau'GB</h3>
                        <p>
                            Av. Gaston Berger, 59000 Lille<br />
                            France Métropolitaine<br />
                        </p>

                        <p>Tél : +33 (0)1 23 45 67 89</p>
                    </div>

                    <div class="container noPadding loc-cont-width">
                        <img src="resto/loc-restau.png" alt="Localisation" />
                    </div>
                </div>
            </div>

            <!--Localisation-------------------------------------------------------------------------------------------------->

            <!--Horaires d'ouverture------------------------------------------------------------------------------------------>
            <div class="container-fluid horaires padTop">
                <h1 class="souligner">Horaires d'ouverture</h1>
                <div class="container">
                    <br />

                    <ul class="d-flex justify-content-around" style="flex-wrap: wrap;">
                        <div style="margin: 20px">
                            <p>MARDI :</p>
                            <li>Midi : 12h00 - 15h00</li>
                        </div>

                        <div style="margin: 20px">
                            <p>MERCREDI - JEUDI :</p>
                            <li>Midi : 12h00 - 15h00</li>
                            <li>Soir : 19h00 - 00h00</li>
                        </div>

                        <div style="margin: 20px">
                            <p>VENDREDI :</p>
                            <li>Midi : 12h00 - 15h00</li>
                        </div>
                    </ul>
                </div>
            </div>
            <!--Horaires d'ouverture------------------------------------------------------------------------------------------>

            <!--Salle--------------------------------------------------------------------------------------------------------->
            <div class="salle container-fluid padTop">
                <h1 class="souligner">Salle</h1>

                <div
                    class="salle-img container-fluid d-flex flex-row justify-content-center noPadding"
                >
                    <img class="img1" src="salle/1.jpg" alt="Salle 1" />
                    <img class="img2" src="salle/2.jpg" alt="Salle 2" />
                    <img class="img3" src="salle/3.jpg" alt="Salle 3" />
                </div>
            </div>
            <!--Salle--------------------------------------------------------------------------------------------------------->

            <!--Spécialité---------------------------------------------------------------------------------------------------->
            <div class="container-fluid specialite padTop">
                <h1 class="souligner">Plat du jour</h1>

                <div class="vignette container d-flex justify-content-center noPadding" style="flex-wrap: wrap">
                    <?php
                    include 'Panel_Gestion/database.php';

                    $dayNames = array(
                        1=>'Monday', 
                        2=>'Tuesday', 
                        3=>'Wednesday', 
                        4=>'Friday', 
                    );

                    $dateJ = date('l');
                    $dateM = intval(date('m'));
                    $req;
                    $index = 0;

                    foreach ($dayNames as $k => $v) {
                        if ($v == $dateJ){
                            $dateJ = $k;
                            $req = mysqli_query($db, "SELECT nomPlatJour FROM platdujour WHERE numJour = $dateJ AND numMois = $dateM");

                            $ligne;
                            
                            while ($ligne = mysqli_fetch_assoc($req)) {
                                $index++;
        
                                $img = mysqli_query($db, "SELECT * FROM liste_plats WHERE nomPlat = '" . $ligne['nomPlatJour'] . "'");
                                $img = mysqli_fetch_assoc($img);
                                echo "<img class='vignette-img' src='Panel_Gestion/IMG/" . $img['nomImage'] . "' alt='" . $ligne['nomPlatJour'] . "' />";
        
                                echo "<div class='libelle container noPadding'>
                                    <h3>" . $ligne['nomPlatJour'] . "</h3><br />
                                    <p>
                                        Prix : " . $img['prix'] . " €
                                    </p><br />
                                    <p>
                                        Aujourd'hui, le plat du jour que nous proposons est: " . $ligne['nomPlatJour'] . "!
                                    </p>
                                </div>";
                            }
                            break;
                        }
                    }

                    if ($index == 0){
                        echo "<div class='text-center container'>
                            <h3>Aucun plat du jour n'a encore été ajouté..</h3><br />
                        </div>";
                    }
                    ?>

                </div>
            </div>
            <!--Spécialité---------------------------------------------------------------------------------------------------->

            <!--FORM---------------------------------------------------------------------------------------------------------->

            <div id="RES" class="container-fluid fluidForm padTop">
                <h1 class="souligner">Réservation</h1>
                <br />
                <div class="container">
                    <fieldset class="border p-3">
                        <div class="row">
                            <div class="col-sm-offset-0 col-sm-12">
                                <form action="site_backend/reserv.php" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputNom">Nom</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="inputNom"
                                                placeholder="Votre nom"
                                                required
                                            />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputPrenom"
                                                >Prenom</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="inputPrenom"
                                                placeholder="Votre prénom"
                                                required
                                            />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputMail"
                                                >Email</label
                                            >
                                            <input
                                                type="email"
                                                class="form-control"
                                                name="inputMail"
                                                placeholder="Votre adresse mail"
                                                required
                                            />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputTel"
                                                >Numéro de téléphone</label
                                            >
                                            <input
                                                type="tel"
                                                class="form-control"
                                                name="inputTel"
                                                placeholder="Votre numéro de téléphone"
                                                required
                                            />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputDatetime"
                                                >Date et heure</label
                                            >
                                            <input
                                                type="datetime-local"
                                                class="form-control"
                                                name="inputDatetime"
                                                required
                                            />
                                        </div>

                                        <div class="form-group col-md-9">
                                            <label for="inputNb"
                                                >Nombre de personnes</label
                                            >
                                            <input
                                                type="number"
                                                class="form-control"
                                                name="inputNb"
                                                placeholder="Combien serez-vous ?"
                                                required
                                            />
                                        </div>
                                    </div>

                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Réserver
                                    </button>
                                </form>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <!--FORM---------------------------------------------------------------------------------------------------------->

            <!--Contacts------------------------------------------------------------------------------------------------------>
            <div id="CONT" class="container-fluid contacts padTop">
                <h1 class="souligner">Contacts</h1>

                <div class="container contact" style="margin-top: 40px; padding-bottom: 30px;">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="contact-info">
                                <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
                                <h2>Contactez nous!</h2>
                                <h4>Nous aimerions avoir votre avis!</h4><br>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="contact-form">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="lname">Nom:</label>
                                    <div class="col-sm-10">          
                                        <input type="text" class="form-control" id="lname" placeholder="Entrez votre nom" name="lname" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="fname">Prénom:</label>
                                    <div class="col-sm-10">          
                                        <input type="text" class="form-control" id="fname" placeholder="Entrez votre prénom" name="fname" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Email:</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="comment">Commentaire:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="5" id="comment" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">        
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Envoyer
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Contacts------------------------------------------------------------------------------------------------------>
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
