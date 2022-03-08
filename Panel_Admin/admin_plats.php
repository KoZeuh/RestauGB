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

    <link rel="stylesheet" href="CSS/style_plats.css">
	<script src="JS/script.js"></script>

</head>

<body>
	<header>
		<div id="logo"><img src="IMG/logo.png">Restaurant GB - Administration</div>
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
		<h1 style="color:blue;text-align:center">Liste des Entrées</h1><br>

			<?php
				$choiceDate = isset($_POST['trip-start']) ? $_POST['trip-start'] : NULL;
				$choiceDate = strval($choiceDate);

				if (isset($_POST['reset_date'])){
					$choiceDate = NULL;
				}
			?>
			<div class="card">
				<p class="card__name">Entrée #1</p>
				<p class="card__name">Prix : 5.50$</p>
				<div class="check">
					<input id="check_" type="checkbox">
					<label for="check_"></label>
				</div>
			</div>
			<div class="card">
				<p class="card__name">Entrée #2</p>
				<p class="card__name">Prix : 1.50$</p>
				<div class="check">
					<input id="check__" type="checkbox">
					<label for="check__"></label>
				</div>
			</div>

			<div class="card">
				<p class="card__name">Entrée #3</p>
				<p class="card__name">Prix : 5.50$</p>
				<div class="check">
					<input id="check___" type="checkbox">
					<label for="check___"></label>
				</div>
			</div>
		
	</section>

	<section>
		<h1 style="color:blue;text-align:center">Liste des Plats</h1><br>
		<div class="card">
				<p class="card__name">Plat #1</p>
				<p class="card__name">Prix : 5.50$</p>
				<div class="check">
					<input id="check2_" type="checkbox">
					<label for="check2_"></label>
				</div>
			</div>
			<div class="card">
				<p class="card__name">Plat #2</p>
				<p class="card__name">Prix : 1.50$</p>
				<div class="check">
					<input id="check2__" type="checkbox">
					<label for="check2__"></label>
				</div>
			</div>

			<div class="card">
				<p class="card__name">Plat #3</p>
				<p class="card__name">Prix : 5.50$</p>
				<div class="check">
					<input id="check2___" type="checkbox">
					<label for="check2___"></label>
				</div>
			</div>
	</section>

	<section>
		<h1 style="color:blue;text-align:center">Liste des Desserts</h1><br>
		<div class="card">
				<p class="card__name">Dessert #1</p>
				<p class="card__name">Prix : 5.50$</p>
				<div class="check">
					<input id="check3_" type="checkbox">
					<label for="check3_"></label>
				</div>
			</div>
			<div class="card">
				<p class="card__name">Dessert #2</p>
				<p class="card__name">Prix : 1.50$</p>
				<div class="check">
					<input id="check3__" type="checkbox">
					<label for="check3__"></label>
				</div>
			</div>

			<div class="card">
				<p class="card__name">Dessert #3</p>
				<p class="card__name">Prix : 5.50$</p>
				<div class="check">
					<input id="check3___" type="checkbox">
					<label for="check3___"></label>
				</div>
			</div>
	</section>

	<section>
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
	

	<footer>
		<p>&copy; Restaurant GB - 2022</p>
	</footer>


</body>

</html>