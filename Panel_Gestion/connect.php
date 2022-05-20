<?php
  session_start();

	include 'functions.php';
  include 'database.php';
  
  if(isset($_SESSION['auth'])){
    header('Location: index.php');
    exit();
  }
?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Restau GB - Gestion Connexion</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style_connexion.css">



    
  </head>

  <body class="d-flex flex-column min-vh-100">
      <div class="container-fluid rgba-gradient">
        <!-- example 5 left and center only with empty space right -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark flex-nowrap fixed-top">
            <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#navbar5">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class="navbar-brand w-100">Restau' GB</span>
            <div class="navbar-collapse collapse w-100 justify-content-center" id="navbar5">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Gestion - Connexion</a>
                    </li>
                </ul>
            </div>
            <div class="w-100"><!--spacer--></div>
        </nav>

        <section>
              <div class="container">
                  <div class="text-center mt-5">
                    <div class="loginBox"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
                    <h3>Veuillez entrer vos informations</h3>
                      <form enctype="multipart/form-data" method="post">
                        <div class="inputBox"> <input id="identifiant" type="text" name="identifiant" placeholder="Identifiant"> <input id="mot_de_passe" type="password" name="mot_de_passe" placeholder="Mot de passe"> </div> <input type="submit" name="" value="Se connecter">
                      </form>

                        <?php
                          if (!empty($_POST["identifiant"]) && !empty($_POST["mot_de_passe"])){
                            $arrayData = array("identifiant" => htmlspecialchars(stripslashes($_POST['identifiant'])),"mot_de_passe" => md5(htmlspecialchars(stripslashes($_POST['mot_de_passe']))));

                            $requete = mysqli_query($db,"SELECT * FROM admin_comptes");
                            $ligne;

                            while ($ligne = mysqli_fetch_assoc($requete)){
                              if ($ligne['identifiant'] == $arrayData["identifiant"]){
                                if ($ligne['mot_de_passe'] == $arrayData['mot_de_passe']){
                                  $_SESSION["identifiant"] = $ligne['identifiant'];
                                  $_SESSION['auth'] = "True";

                                  $_SESSION['perm_gest_admin'] = $ligne['perm_gest_admin'];
                                  $_SESSION['perm_gest_reserv'] = $ligne['perm_gest_reserv'];

                                  $_SESSION["save_date"] = NULL;

                                  header('Location: connect.php');
                                }
                              }
                            };

                            echo '<span class="btn btn-danger">Votre identifiant ou mot de passe ne correspondent pas..</span>';
                          };
                        ?>
                    
                    </div>
                  </div>
              </div>
        </section><!-- Fin A Propos Section -->

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
      </div>

      <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50 mt-auto">
        <div class="container text-center">
            <small>Copyright &copy; Restau' GB</small>
        </div>
      </footer>
  </body>
</html>
