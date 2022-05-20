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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="CSS/style_plats.css">

    
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

        


        <form action="./admin_plats.php" enctype="multipart/form-data" method="post">
        <section><hr>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12 content justify-content-start" data-aos="fade-left">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                              <select class="custom-select" name="select_jour" required>
                                  <option selected disabled value="">Choix du jour</option>
                                  <option value="1">Mardi</option>
                      <option value="2">Mercredi</option>
                                  <option value="3">Jeudi</option>
                                  <option value="4">Vendredi</option>
                              </select>
                            </div>
                            <div class="col-md-6 mb-3">
                              <select class="custom-select" name="select_mois" required>
                                  <option selected disabled value="">Choix du mois</option>
                                  <option value="1">Janvier</option>
                      <option value="2">Février</option>
                                  <option value="3">Mars</option>
                                  <option value="4">Avril</option>
                                  <option value="5">Mai</option>
                                  <option value="6">Juin</option>
                                  <option value="7">Juillet</option>
                                  <option value="8">Août</option>
                                  <option value="9">Septembre</option>
                                  <option value="10">Octobre</option>
                                  <option value="11">Novembre</option>
                                  <option value="12">Décembre</option>
                              </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                          <button class="btn btn-primary" type="submit" name="valid_plat" >Valider</button>
                        </div>
                      
                    </div>
                  </div>
          
                </div>

                  <?php
                      if (isset($_POST['plat'])){
                          $nomPlat = $_POST['plat'];
                          $prixPlat = intval($_POST['prixPlat']);
                          $choixJour = intval($_POST['select_jour']);
                          $choixMois = intval($_POST['select_mois']);

                          $sql_result = mysqli_query($db,"SELECT `numJour`,`numMois` FROM `platdujour` WHERE `numJour` =  $choixJour AND `numMois` = $choixMois");

                          if(mysqli_num_rows($sql_result) > 0 ){
                              $requete = mysqli_query($db,"UPDATE platdujour SET nomPlatJour='". $nomPlat ."',prixHT = '". $prixPlat ."' WHERE numJour = '". $choixJour ."' AND numMois = '". $choixMois ."'");	
                          }
                          else{
                              $requete = mysqli_query($db, "INSERT INTO platdujour (numJour,numMois,nomPlatJour,prixHT) VALUES ('". $choixJour ."','". $choixMois ."','". $nomPlat ."','". $prixPlat ."')");
                          }
                      }
                  ?>
            </section>
            <section><h3 class="text-center">Liste des Plats</h3>

            <div class="row clearfix">
                <?php
                    $requete = mysqli_query($db,"SELECT * FROM liste_plats");
                    $ligne;

                    while ($ligne = mysqli_fetch_assoc($requete)){
                        echo '<div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card product_item">
                            <div class="body">
                                <div class="cp_img">
                                    <img src="IMG/'.$ligne['nomImage'].'" class="img-fluid">
                                </div>
                                <div class="product_details">
                                    <h5><a href="ec-product-detail.html">'.$ligne['nomPlat'].'</a></h5>
                                    <ul class="product_price list-unstyled">
                                        <li class="new_price">'.$ligne['prix'].' $</li>
                                    </ul>
                                    <input type="checkbox" class="radio" value="'.$ligne['nomPlat'].'" name="plat" />
                                    <input name="prixPlat" type="hidden" value="'.$ligne['prix'].'">
                                </div>
                            </div>
                        </div>
                    </div>';
                    }
                ?>
            </div>
        </section><br>

        </form>

        
      </div>

      <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50 mt-auto">
        <div class="container text-center">
            <small>Copyright &copy; Restau' GB</small>
        </div>
      </footer>

      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
      <script>
        $("input:checkbox").on('click', function() {
        var $box = $(this);
        if ($box.is(":checked")) {
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
        });
    </script>

  
    </body>

  
</html>
