<?php
	include 'functions.php';
	include 'database.php';

	VerifAuthentification();
<<<<<<< HEAD
=======
	RemoveAfter21Days();
>>>>>>> 153c6a096df4cadda24983f91e13ff94c75fa9df
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>Restaurant GB</title>

    <link rel="stylesheet" href="CSS/style_reservations.css">
	<script src="JS/script.js"></script>

<<<<<<< HEAD
=======
	<style>
	.test {
		display: grid;
		justify-content: center;
		align-content: center;
		

		gap: 10px;
		grid-auto-flow: column;
	}

	.item-center {
		background-color: #444;
  		color: #fff;
  		border-radius: 5px;
  		padding: 20px;
  		font-size: 150%;
	}
	</style>
>>>>>>> 153c6a096df4cadda24983f91e13ff94c75fa9df
</head>

<body>
	<header>
		<div id="logo"><img src="IMG/logo.png">Restaurant GB - Administration</div>
		<nav>  
			<ul>
				<?php
<<<<<<< HEAD
          			LoadPageAccess();
=======
					LoadPageAccess();
>>>>>>> 153c6a096df4cadda24983f91e13ff94c75fa9df
        		?>
			</ul>
		</nav>
	</header>
	<section>
        <?php
            if (isset($_SESSION['identifiant'])){
                echo '<strong style="color:white">Bonjour '.$_SESSION['identifiant'].' - Tu es actuellement authentifié sur le panel de gestion du restaurant de Gaston Berger.</strong>';
            };
        ?>
	</section>
	<section>
		<h1 style="color:blue;text-align:center">Liste des Réservations</h1><br>
		<div class="container">
  			<form action="./admin_reservations.php" enctype="multipart/form-data" method="post">
				<div class="row">
    				<div class="col-25">
      					<label for="start">Choix d'une date de réservation</label>
    				</div>
    				<div class="col-75">
						<input type="date" id="start" name="trip-start" value="2022-03-01" min="2018-01-01" max="2023-01-01" required>
    				</div>

					<div class="col-25">
      					<label for="service_lst">Choix du service</label>
    				</div>
    				<div class="col-75">
						<select id="service_lst" name="service_lst" size="3" required>
							<option value="Midi">Midi</option>
							<option value="Soir">Soir</option>
							<option value="Midi/Soir">Midi/Soir</option>
						</select>
    				</div>
 
  				</div>
  				<br>
  				<div class="row">
					<input type="submit" value="Valider">
					<input type="submit" value="Réinitialiser" name="reset_date">
  				</div>
  			</form>
		</div>
	
	
			<?php
				$choiceDate = isset($_POST['trip-start']) ? $_POST['trip-start'] : NULL;
				$choiceDate = strval($choiceDate);

				$choiceService = isset($_POST['service_lst']) ? $_POST['service_lst'] : NULL;

				if (isset($_POST['reset_date'])){
					$choiceDate = NULL;
					$choiceService = NULL;
				}


				if ($choiceDate != NULL && $choiceService != NULL){
<<<<<<< HEAD
					echo "<h1 style='color:blue;text-align:center'>Date choisi : <span style='color:white'>$choiceDate</span></h1><br>";
					echo "<h1 style='color:blue;text-align:center'>Service : <span style='color:white'>$choiceService</span></h1><br>";

					$dataReserv = CountAllReserv($choiceDate,$choiceService);

					echo "<h1 style='color:blue;text-align:center'>Total de couverts : <span style='color:white'>$dataReserv[0]</span></h1><br>";
					echo "<h1 style='color:blue;text-align:center'>Total de personne(s) : <span style='color:white'>$dataReserv[1]</span></h1><br>";
					echo "<h1 style='color:blue;text-align:center'>Total de réservation(s) : <span style='color:white'>$dataReserv[2]</span></h1><br>";
=======
					$dataReserv = CountAllReserv($choiceDate,$choiceService);

					echo '

					<br><div class="test">
					  <div class="item-center">Date choisi : '.$choiceDate.'</div>
					  <div class="item-center">Service : '.$choiceService.'</div>
					</div>
					
					';

					echo '

					<br><div class="test">
					  <div class="item-center">Total de couverts : '.$dataReserv[0].'</div>
					  <div class="item-center">Total de personne(s) : '.$dataReserv[1].'</div>
					  <div class="item-center">Total de réservation(s) : '.$dataReserv[2].'</div>
					</div>
					
					';
				}else {
					$dataReserv = CountAllReserv("","All");

					echo '

					<br><div class="test">
					  <div class="item-center">Total de couverts : '.$dataReserv[0].'</div>
					  <div class="item-center">Total de personne(s) : '.$dataReserv[1].'</div>
					  <div class="item-center">Total de réservation(s) : '.$dataReserv[2].'</div>
					</div>
					
					';
>>>>>>> 153c6a096df4cadda24983f91e13ff94c75fa9df
				}
				
				

				echo '</section><main role="main">		
						<div class="container2">';

				if ($choiceDate != NULL && $choiceService != NULL){
					$requete;
					if ($choiceService == "Midi/Soir"){
						$requete = mysqli_query($db,"SELECT * FROM reservations WHERE date_Reservation = '". $choiceDate ."'");
					}else {
						$requete = mysqli_query($db,"SELECT * FROM reservations WHERE date_Reservation = '". $choiceDate ."' AND service = '". $choiceService ."'");
					}
					
					$ligne;

					
					while ($ligne = mysqli_fetch_assoc($requete)){
						if (isset($_SESSION['perm_gest_reserv'])){
							if ($_SESSION['perm_gest_reserv'] == 1){
<<<<<<< HEAD
								echo '<div class="card"><h1>'.$ligne['prenom'].' '.$ligne['nom'].'</h1>
									<p class="card__name">Date de réservation : '.date('d-m-Y', strtotime($ligne['date_Reservation'])).'</p>
									<p class="card__name">Téléphone : 0'.$ligne['telephone'].'</p>
									<p class="card__name">E-mail : '.$ligne['mail'].'</p>
									<p class="card__name">Nombre de personne(s) : '.$ligne['nbr_Personnes'].'</p>
									<p class="card__name">Service : '.$ligne['service'].'</p>
=======
								$nbrCouverts = 0;
								if ($ligne['nbr_Personnes']%2 != 0){
									$nbrCouverts = $nbrCouverts+($ligne['nbr_Personnes']+1);
								}else {
									$nbrCouverts = $nbrCouverts+$ligne['nbr_Personnes'];
								}
								echo '<div class="card"><h1>'.$ligne['prenom'].' '.$ligne['nom'].'</h1>
									<p class="card__name">Date de réservation : '.date('d-m-Y', strtotime($ligne['date_Reservation'])).'</p>
									<p class="card__name">Heure de réservation : '.date('H:i:s', strtotime($ligne['date_Reservation'])).'</p>
									<p class="card__name">Téléphone : 0'.$ligne['telephone'].'</p>
									<p class="card__name">E-mail : '.$ligne['mail'].'</p>
									<p class="card__name">Nombre de personne(s) : '.$ligne['nbr_Personnes'].'</p>
									<p class="card__name">Nombre de couvert(s) : '.$nbrCouverts.'</p>
									<button class="btn draw-border"><a href="./admin_reservations.php?action=modif?id_Reservation='.$ligne['id_Reservation'].'">Modifier</a></button>
>>>>>>> 153c6a096df4cadda24983f91e13ff94c75fa9df
									<button class="btn draw-border"><a href="./admin_reservations.php?id_Reservation='.$ligne['id_Reservation'].'">Annuler</a></button>
									</div>';
							}else {
								echo '<div class="card"><p class="card__name">'.$ligne['prenom'].' - '.$ligne['nom'].'</p></div>';
							}
						}
					}
				}else {
					$requete = mysqli_query($db,"SELECT * FROM reservations");
					$ligne;

					while ($ligne = mysqli_fetch_assoc($requete)){
						if (isset($_SESSION['perm_gest_reserv'])){
							if ($_SESSION['perm_gest_reserv'] == 1){
<<<<<<< HEAD
								echo '<div class="card"><h1>'.$ligne['prenom'].' '.$ligne['nom'].'</h1>
									<p class="card__name">Date de réservation : '.date('d-m-Y', strtotime($ligne['date_Reservation'])).'</p>
									<p class="card__name">Téléphone : '.$ligne['telephone'].'</p>
									<p class="card__name">E-mail : '.$ligne['mail'].'</p>
									<p class="card__name">Nombre de personne(s) : '.$ligne['nbr_Personnes'].'</p>
									<p class="card__name">Service : '.$ligne['service'].'</p>
=======
								$nbrCouverts = 0;
								if ($ligne['nbr_Personnes']%2 != 0){
									$nbrCouverts = $nbrCouverts+($ligne['nbr_Personnes']+1);
								}else {
									$nbrCouverts = $nbrCouverts+$ligne['nbr_Personnes'];
								}
								echo '<div class="card"><h1>'.$ligne['prenom'].' '.$ligne['nom'].'</h1>
									<p class="card__name">Date de réservation : '.date('d-m-Y', strtotime($ligne['date_Reservation'])).'</p>
									<p class="card__name">Heure de réservation : '.date('H:i:s', strtotime($ligne['date_Reservation'])).'</p>
									<p class="card__name">Téléphone : 0'.$ligne['telephone'].'</p>
									<p class="card__name">E-mail : '.$ligne['mail'].'</p>
									<p class="card__name">Nombre de personne(s) : '.$ligne['nbr_Personnes'].'</p>
									<p class="card__name">Nombre de couvert(s) : '.$nbrCouverts.'</p>
									<p class="card__name">Service : '.$ligne['service'].'</p>
									<button class="btn draw-border"><a href="./admin_reservations.php?action=modif?id_Reservation='.$ligne['id_Reservation'].'">Modifier</a></button>
>>>>>>> 153c6a096df4cadda24983f91e13ff94c75fa9df
									<button class="btn draw-border"><a href="./admin_reservations.php?id_Reservation='.$ligne['id_Reservation'].'">Annuler</a></button>
									</div>';
							}else {
								echo '<div class="card"><p class="card__name">'.$ligne['prenom'].' - '.$ligne['nom'].'</p></div>';
							}
						}
					}

				}


				if (!empty($_GET["id_Reservation"])){
					$dataId = intval($_GET['id_Reservation']);
					$requete = mysqli_query($db,"DELETE FROM reservations WHERE id_Reservation = $dataId");

					header('Location: admin_reservations.php');
				};
      		?>
		</div>
	</main>

	<footer>
		<p>&copy; Restaurant GB - 2022</p>
	</footer>


</body>

</html>