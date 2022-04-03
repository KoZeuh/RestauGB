<?php
	include 'functions.php';
    include 'database.php';
  
    VerifAuthentification();
    RemoveAfter21Days();
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
    <link rel="stylesheet" href="CSS/style_reserv.css">



    
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
        <h3 class="text-center">Filtre des Réservations</h3>
        <section id="about" class="about">
              <div class="container">
                <div class="row">
                  <div class="col-sm-12 content justify-content-start" data-aos="fade-left">
                    <form action="./admin_reserv.php" enctype="multipart/form-data" method="post">
                      <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="start">Choix d'une date de réservation :</label>
                            <input type="date" id="start" name="trip-start" class="form-control" min="2018-01-01" max="2023-01-01" required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="service_lst">Choix du Service</label>
                            <select class="custom-select" name="service_lst" required>
                              <option value="Midi">Midi</option>
                              <option value="Soir">Soir</option>
    						              <option value="Midi/Soir">Midi/Soir</option>
                            </select>
                          </div>
                      </div>
                      <div class="d-flex justify-content-center">
                        <button class="btn btn-primary" type="submit">Valider</button>
                        <a class="btn btn-primary ml-2" href="./admin_reserv.php?action=reset_date">Réinitialiser</a>
                      </div>
                    </form>
                  </div>
                </div>
        
              </div>
        </section><!-- Fin A Propos Section -->

        <hr>
        <h3 class="text-center">Liste des Réservations</h3>
        <br>
        <section>
            <div class="container">
                <div class="row justify-content-center">
                  <?php    
                  
                    if (isset($_GET['action'])){
                      $choiceDate = NULL;
                      $choiceService = NULL;
                      $lenDate = 0;
                    }

                    if (isset($_POST['trip-start']) || $choiceDate == NULL){
                      $choiceDate = $_POST['trip-start'];
                      $choiceService = $_POST['service_lst'];
                      $lenDate = strlen($choiceDate);
  
                      
  
                      if ($_SESSION["save_date"] == NULL && $lenDate > 0){
                        $_SESSION["save_date"] = $choiceDate;
                      }else if ($_SESSION["save_date"] != NULL && $lenDate > 0) {
                        $_SESSION["save_date"] = $choiceDate;
                      }else if ($_SESSION["save_date"] != NULL && $lenDate == 0){
                        $choiceDate = $_SESSION["save_date"];
                      }
  
                      $dataReserv;
  
  
                      if ($lenDate > 0){
                        $dataReserv = CountAllReserv($choiceDate,$choiceService);
  
                        echo '
                          <br><div class="col-xs-6 btn btn-light mr-5">Date choisi : '.$choiceDate.'</div>
                          <div class="col-xs-6 btn btn-light mr-5">Service : '.$choiceService.'</div>
                        ';
    
                      }else {
                        $dataReserv = CountAllReserv("","All");
                      }
  
                        echo '
  
                        <br><div class="col-xs-4 btn btn-light mr-5">Total de couverts : '.$dataReserv[0].'</div>
                        <div class="col-xs-4 btn btn-light mr-5">Total de personne(s) : '.$dataReserv[1].'</div>
                        <div class="col-xs-4 btn btn-light">Total de réservation(s) : '.$dataReserv[2].'</div>
                        </div>
                        
                        ';
  
                        echo '</div><br>
                        
                        <div class="row">';
  
                        if ($lenDate > 0){
                          $requete;
                          if ($choiceService == "Midi/Soir"){
                            $requete = mysqli_query($db,"SELECT * FROM reservations WHERE date_Reservation = '". $choiceDate ."'");
                          }else {
                            $requete = mysqli_query($db,"SELECT * FROM reservations WHERE date_Reservation = '". $choiceDate ."' AND service = '". $choiceService ."'");
                          }
                        }else {
                          $requete = mysqli_query($db,"SELECT * FROM reservations");
                        } 
                        $ligne;
  
                        while ($ligne = mysqli_fetch_assoc($requete)){
                          if (isset($_SESSION['perm_gest_reserv'])){
                            if ($_SESSION['perm_gest_reserv'] == 1){
                              $nbrCouverts = 0;
                              if ($ligne['nbr_Personnes']%2 != 0){
                                $nbrCouverts = $nbrCouverts+($ligne['nbr_Personnes']+1);
                              }else {
                                $nbrCouverts = $nbrCouverts+$ligne['nbr_Personnes'];
                              }
                              echo '<div class="col-lg-4">
                              <div class="card card-margin">
                                  <div class="card-body pt-0">
                                      <div class="widget-49">
                                        <div class="widget-49-title-wrapper">
                                            <div class="widget-49-date-primary">
                                                <span class="widget-49-date-day">'.date('d', strtotime($ligne['date_Reservation'])).'/</span>
                                                <span class="widget-49-date-month">'.date('m', strtotime($ligne['date_Reservation'])).'</span>
                                            </div>
                                            <div class="widget-49-meeting-info">
                                                <span class="widget-49-pro-title">'.$ligne['prenom'].' '.$ligne['nom'].'</span>
                                                <span class="widget-49-meeting-time">'.date('H:i:s', strtotime($ligne['date_Reservation'])).'</span>
                                            </div>
                                        </div>
                                        <ol class="widget-49-meeting-points">
                                            <li class="widget-49-meeting-item"><span>Téléphone : 0'.$ligne['telephone'].'</span></li>
                                            <li class="widget-49-meeting-item"><span>E-mail : '.$ligne['mail'].'</span></li>
                                            <li class="widget-49-meeting-item"><span>Nombre de personne(s) : '.$ligne['nbr_Personnes'].'</span></li>
                                            <li class="widget-49-meeting-item"><span>Nombre de couvert(s) : '.$nbrCouverts.'</span></li>
                                        </ol>
                                        <h5 class="text-center">Modification</h5>
  
                                        
                                        <div class="widget-49-meeting-action text-center">
                                          <form action="./admin_reserv.php" enctype="multipart/form-data" method="post">                                        
                                            <div class="form-group">
                                              <label for="start">Choix d\'une date de réservation :</label>
                                              <input type="date" id="start" name="trip-start2" class="form-control"  value="jj/mm/aaaa" min="2018-01-01" max="2023-01-01">
                                            </div>
                                            <div class="form-group">
                                              <label for="nbr_personne">Changement nombre de personne(s)</label>
                                              <input type="number" name="nbr_personne" value="0" >
                                              <input id="id_Reserv" name="id_Reserv" type="hidden" value="'.$ligne['id_Reservation'].'">
                                              
                                            </div>
                                            <input type="submit" class="btn btn-primary" value="Valider" name="Valider">
                                            <input type="submit" class="btn btn-warning" value="Annuler" name="Annuler">
                                          </form>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                              </div>';
                            }else {
                              echo '<div class="col-lg-4">
                              <div class="card card-margin">
                                  <div class="card-body pt-0">
                                      <div class="widget-49">
                                        <div class="widget-49-title-wrapper">
                                            <div class="widget-49-date-primary">
                                                <span class="widget-49-date-day">'.date('d', strtotime($ligne['date_Reservation'])).'/</span>
                                                <span class="widget-49-date-month">'.date('m', strtotime($ligne['date_Reservation'])).'</span>
                                            </div>
                                            <div class="widget-49-meeting-info">
                                                <span class="widget-49-pro-title">'.$ligne['prenom'].' '.$ligne['nom'].'</span>
                                                <span class="widget-49-meeting-time">'.date('H:i:s', strtotime($ligne['date_Reservation'])).'</span>
                                            </div>
                                        </div>
                                        <ol class="widget-49-meeting-points">
                                            <li class="widget-49-meeting-item"><span>Téléphone : 0'.$ligne['telephone'].'</span></li>
                                            <li class="widget-49-meeting-item"><span>E-mail : '.$ligne['mail'].'</span></li>
                                            <li class="widget-49-meeting-item"><span>Nombre de personne(s) : '.$ligne['nbr_Personnes'].'</span></li>
                                            <li class="widget-49-meeting-item"><span>Nombre de couvert(s) : '.$nbrCouverts.'</span></li>
                                        </ol>
                                      </div>
                                  </div>
                              </div>
                              </div>';
                            }
                          }
                        }
                        
  
                        if (!empty($_POST["Annuler"])){
                          $dataId = intval($_POST['id_Reserv']);
                          $requete = mysqli_query($db,"DELETE FROM reservations WHERE id_Reservation = $dataId");
  
                          header('Location: admin_reserv.php');
                          exit;
                        };
  
                        if (!empty($_POST["Valider"])){
                          $dataId = intval($_POST['id_Reserv']);
                          $datanbrPersonnes = intval($_POST['nbr_personne']);
  
                          $choiceDate = $_POST['trip-start2'];
                          $lenDate = strlen($choiceDate);
  
                          $newService = "Midi";
                          $heure;
  
                          if ($lenDate != 0){
                            $heure = date('H',strtotime($choiceDate));
  
                            if ($heure >= 12 && $heure <= 18){
                              $newService = "Midi";
                            }else {
                              $newService = "Soir";
                            }
                          }
  
                          if ($datanbrPersonnes > 0 && $lenDate != 0){									
                            $requete = mysqli_query($db,"UPDATE reservations SET nbr_Personnes=$datanbrPersonnes,date_Reservation = '". $choiceDate ."' WHERE id_Reservation = $dataId");				
                          }elseif ($datanbrPersonnes > 0 && $choiceDate == NULL){
                            $requete = mysqli_query($db,"UPDATE reservations SET nbr_Personnes=$datanbrPersonnes WHERE id_Reservation = $dataId");
                          }elseif ($datanbrPersonnes == 0 && $lenDate != 0){
                            $requete = mysqli_query($db,"UPDATE reservations SET service = '". $newService ."',date_Reservation = '". $choiceDate ."' WHERE id_Reservation = $dataId");
                          }
  
                          exit;
                          header('Location: admin_reserv.php');
                          
  
                        }
                      
                    }

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
