<?php
	include 'functions.php';
	include 'database.php';

	VerifAuthentification();
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

</head>

<body>
	<header>
		<div id="logo"><img src="/logo.png">Restaurant GB - Administration</div>
		<nav>  
			<ul>
				<?php
          			LoadPageAccess();
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
						<input type="date" id="start" name="trip-start" value="2022-01-01" min="2018-01-01" max="2023-01-01">
    				</div>
  				</div>
  				<br>
  				<div class="row">
					<input type="submit" value="Valider">
					<input type="submit" value="Réinitialiser" name="reset_date">
  				</div>
  			</form>
		</div>
	</section>
	<main role="main">
		<div class="container2">
			<?php
				$choiceDate = isset($_POST['trip-start']) ? $_POST['trip-start'] : NULL;

				if (isset($_POST['reset_date'])){
					$choiceDate = NULL;
				}

				if ($choiceDate != NULL){
					$data = $db->prepare("SELECT * FROM reservations WHERE date_Reservation = :date_reserv");
					$data->bindParam(':date_reserv', $choiceDate);
					$data->execute();

					foreach ($data as $row) {
						if (isset($_SESSION['perm_gest_reserv'])){
							if ($_SESSION['perm_gest_reserv'] == 1){
								echo '<div class="card"><h1>'.$row['prenom'].' '.$row['nom'].'</h1>
									<p class="card__name">Date de réservation : '.date('d-m-Y', strtotime($row['date_Reservation'])).'</p>
									<p class="card__name">Téléphone : '.$row['telephone'].'</p>
									<p class="card__name">E-mail : '.$row['mail'].'</p>
									<p class="card__name">Nombre de personne(s) : '.$row['nbr_Personnes'].'</p>
									<button class="btn draw-border"><a href="./admin_reservations.php?id='.$row['id_Reservation'].'">Annuler</a></button>
									</div>';
							}else {
								echo '<div class="card"><p class="card__name">'.$row['prenom'].' - '.$row['nom'].'</p></div>';
							}
						}
					}
				}else {
					$data = $db->prepare("SELECT * FROM reservations");
					$data->execute();
					foreach ($data as $row) {
						if (isset($_SESSION['perm_gest_reserv'])){
							if ($_SESSION['perm_gest_reserv'] == 1){
								echo '<div class="card"><h1>'.$row['prenom'].' '.$row['nom'].'</h1>
									<p class="card__name">Date de réservation : '.date('d-m-Y', strtotime($row['date_Reservation'])).'</p>
									<p class="card__name">Téléphone : '.$row['telephone'].'</p>
									<p class="card__name">E-mail : '.$row['mail'].'</p>
									<p class="card__name">Nombre de personne(s) : '.$row['nbr_Personnes'].'</p>
									<button class="btn draw-border"><a href="./admin_reservations.php?id='.$row['id_Reservation'].'">Annuler</a></button>
									</div>';
							}else {
								echo '<div class="card"><p class="card__name">'.$row['prenom'].' - '.$row['nom'].'</p></div>';
							}
						}
					}
				}


				if (!empty($_GET["id_Reservation"])){
					$dataId = $_GET['id_Reservation'];

					$req = $db->prepare("DELETE FROM admin_reservations WHERE id_Reservation = :reserv_id");
					$req->bindParam(':reserv_id', $dataId);
					$req->execute();
            		$req = null;

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