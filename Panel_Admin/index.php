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
    <title>Restau GB - Gestion Accueil</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style_connexion.css">



    
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

        <section id="about" class="about">
              <div class="container">
                <div class="row">
                  <div class="col-sm-12 content justify-content-start" data-aos="fade-left">
                    <br><h3 class="text-center">Bienvenue sur le Panel de gestion du Restau' GB !</h3>
                    <p class="font-italic mt-5 text-center">
                        Tu es actuellement connecté en tant que <b><strong><?php echo ''.$_SESSION['identifiant'].'';  ?></b></strong>
                    </p>
                  </div>
                </div>
        
              </div>
        </section><!-- Fin A Propos Section -->

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
