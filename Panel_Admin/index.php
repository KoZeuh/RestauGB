<?php
    session_start();

	include 'functions.php';
	include 'database.php';
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
  	<title>Restaurant GB</title>

  	<link rel="stylesheet" href="CSS/style_connexion.css">
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
	<main role="main">
		<form enctype="multipart/form-data" method="post">
			<div class="form">
      			<div class="title">Connexion</div>
      				<div class="input-container ic1">
        				<input id="identifiant" name="identifiant" class="input" type="text" placeholder=" " />
        				<div class="cut"></div>
        				<label for="identifiant" class="placeholder">Identifiant</label>
      				</div>
      			<div class="input-container ic2">
        			<input id="mot_de_passe" name="mot_de_passe" class="input" type="password" placeholder=" " />
        			<div class="cut"></div>
        			<label for="mot_de_passe" class="placeholder">Mot de passe</label>
      			</div>
      			<button type="text" class="submit">Se connecter</button>
				<button type="text" class="submit" name="deconnexion">Se déconnecter</button>
    		</div>
		</form>
	</main>

  	<footer>
		<p>&copy; Restaurant GB - 2022</p>
	</footer>


	<?php
        if (isset($_POST["deconnexion"])){
            session_destroy();
            header('Location: index.php');
		    };
		
		if (!empty($_POST["identifiant"]) && !empty($_POST["mot_de_passe"])){
			$arrayData = array("identifiant" => htmlspecialchars(stripslashes($_POST['identifiant'])),"mot_de_passe" => md5(htmlspecialchars(stripslashes($_POST['mot_de_passe']))));
			$data = $db->query("SELECT * FROM admin_comptes")->fetchAll();

			foreach ($data as $row) {
				if ($row['identifiant'] == $arrayData["identifiant"]){
					if ($row['mot_de_passe'] == $arrayData['mot_de_passe']){
						$_SESSION["identifiant"] = $row['identifiant'];
						$_SESSION['auth'] = "True";

						$_SESSION['perm_gest_admin'] = $row['perm_gest_admin'];
						$_SESSION['perm_gest_reserv'] = $row['perm_gest_reserv'];

						header('Location: index.php');
					}
				}
			}
    };
	?>
</body>

</html>