<?php
	include 'functions.php';
    include 'database.php';
  
    VerifAuthentification();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Restau GB - Gestion Admin</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="CSS/style_admin.css">



    
  </head>

    <body class="d-flex flex-column min-vh-100">
      <div class="container-fluid rgba-gradient">
        <!-- example 5 left and center only with empty space right -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark flex-nowrap fixed">
            <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#navbar5">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class="navbar-brand">Restau' GB</span>
            <div class="navbar-collapse collapse w-100 justify-content-center" id="navbar5">
                <ul class="navbar-nav mx-auto">
                  <?php
                    LoadPageAccess();
                  ?>
                </ul>
            </div>
            <span class="navbar-text active btn btn-success"><a href="deconnexion.php">Deconnexion</a></span>
            
        </nav>

        <br>
        <h3 class="text-center">Ajout d'un Administrateur</h3>
        <section id="about" class="about">
              <div class="container">
                <div class="row">
                  <div class="col-sm-12 content justify-content-start" data-aos="fade-left">
                    <form action="./admin_comptes.php" enctype="multipart/form-data" method="post">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="txt_prenom">Prénom</label>
                                <input type="text" class="form-control" id="txt_prenom" value="Mark" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="txt_nom">Nom de famille</label>
                                <input type="text" class="form-control" id="txt_nom" value="Otto" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="txt_mdp">Mot de passe</label>
                                <input type="password" class="form-control" id="txt_mdp" required>
                            </div>
                            <div class="col-md-3 mb-3">
                            <label for="check_gest_admin">Gestion des administrateurs</label>
                                <select class="custom-select" id="check_gest_admin" required>
                                    <option selected disabled value="">Choisir</option>
                                    <option value="Oui">Oui</option>
    						        <option value="Non">Non</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                            <label for="check_reserv_admin">Gestion des réservations</label>
                                <select class="custom-select" id="check_reserv_admin" required>
                                    <option selected disabled value="">Choisir</option>
                                    <option value="Oui">Oui</option>
    						        <option value="Non">Non</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary" type="submit">Valider la création du compte</button>
                        </div>
                    </form>

                    <?php
                        $utilisateurExist = False;

                        if (!empty($_POST["txt_prenom"]) && !empty($_POST["txt_nom"]) && !empty($_POST["txt_mdp"])){
                            if (isset($_SESSION['perm_gest_admin'])){
                                if ($_SESSION['perm_gest_admin'] == 1){
                                    $txt_prenom = htmlspecialchars(stripslashes($_POST['txt_prenom']));
                                    $txt_nom = htmlspecialchars(stripslashes($_POST['txt_nom']));
                                    $txt_mdp = md5(htmlspecialchars(stripslashes($_POST['txt_mdp'])));
                    
                                    $check_reserv_admin = $_POST['check_reserv_admin'];
                                    $check_gest_admin = $_POST['check_gest_admin'];
                    
                                    if ($check_reserv_admin == "Oui"){
                                        $check_reserv_admin = 1;
                                    }else {
                                        $check_reserv_admin = 0;
                                    }
                    
                                    if ($check_gest_admin == "Oui"){
                                        $check_gest_admin = 1;
                                    }else {
                                        $check_gest_admin = 0;
                                    }
                    
                                    $txt_identifiant = strtolower(htmlspecialchars(stripslashes($txt_prenom)).'.'.htmlspecialchars(stripslashes($txt_nom)));
                                    $userExist = False;
                                    $requete = mysqli_query($db,"SELECT * FROM admin_comptes");
                                    $ligne;
                        
                                    while ($ligne = mysqli_fetch_assoc($requete)){
                                        if ($ligne['identifiant'] == $txt_identifiant){
                                            $userExist = True;
                                        };
                                    }		
                    
                                    if ($userExist){
                                        echo '<span class="btn btn-danger">Cet utilisateur existe déjà !</span>';
                                    }else {
                                        $requete = mysqli_query($db, "INSERT INTO admin_comptes (prenom,nom,identifiant,mot_de_passe,perm_gest_admin,perm_gest_reserv) VALUES ('". $txt_prenom ."','". $txt_nom ."','". $txt_identifiant ."','". $txt_mdp ."','". $check_gest_admin ."','". $check_reserv_admin ."')");

                                        if ($requete){
                                            echo '<span class="btn btn-success">L\'utilisateur '.$txt_identifiant.' a bien été ajouté.</span>';
                                        }else {
                                            echo '<span class="btn btn-danger">Une erreur est surevnue lors de l\'ajout !</span>';
                                        }
                                    
                                    }
                                }else {
                                    echo "<p style='color:red;text-align:center;'>Tu n'as pas cette permission !</p>";
                                }
                            }
                        }
                    ?>
                  </div>
                </div>
        
              </div>
        </section><!-- Fin A Propos Section -->

        <hr>
        <h3 class="text-center">Liste des Administrateurs</h3>
        <br>
        <section>
            <div class="container">
                <div class="row">
                
                <?php
                    $requete = mysqli_query($db,"SELECT * FROM admin_comptes");
                    $ligne;

                    while ($ligne = mysqli_fetch_assoc($requete)){
                        if (isset($_SESSION['perm_gest_admin'])){
                            if ($_SESSION['perm_gest_admin'] == 1){
                                echo '<div class="col-lg-4">
                                <div class="card card-margin">
                                    <div class="card-body pt-0">
                                        <div class="widget-49">
                                            <div class="widget-49-title-wrapper">
                                                <div class="widget-49-date-primary">
                                                    <span class="widget-49-date-day"><i class="bi bi-person-square"></i></span>
                                                    
                                                </div>
                                                <div class="widget-49-meeting-info">
                                                    <span class="widget-49-pro-title">'.$ligne['prenom'].' '.$ligne['nom'].'</span>
                                                    <span class="widget-49-meeting-time">Administrateur</span>
                                                </div>
                                            </div>
                                            <div class="widget-49-meeting-action text-center">
                                                <a class="btn btn-info" href="./admin_comptes.php?id='.$ligne['identifiant'].'">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            }else {
                                echo '<div class="card"><p class="card__name">'.$ligne['prenom'].' - '.$ligne['nom'].'</p></div>';
                            }
                        }
                    }

                    if (!empty($_GET["id"])){
                        $dataId = $_GET['id'];

                        $requete = mysqli_query($db,"DELETE FROM admin_comptes WHERE identifiant = $dataId");

                        header('Location: admin_comptes.php');
                    };
      		    ?>

                </div>
           </div>
        </section>
      </div>

      <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50 mt-auto">
        <div class="container text-center">
            <small>Copyright &copy; Restau' GB</small>
        </div>
      </footer>

      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  </body>

  
</html>
