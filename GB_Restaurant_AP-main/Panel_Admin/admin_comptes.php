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

    <link rel="stylesheet" href="CSS/admin_comptes.css">
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
		<h1 style="color:green;text-align:center">Création d'un nouveau compte Administrateur</h1>
		<div class="container">
  			<form action="./admin_comptes.php" enctype="multipart/form-data" method="post">
				<div class="row">
    				<div class="col-25">
      					<label for="txt_prenom">Prénom</label>
    				</div>
    				<div class="col-75">
      					<input type="text" id="txt_prenom" name="txt_prenom" required>
    				</div>
  				</div>
  				<div class="row">
    				<div class="col-25">
      					<label for="txt_nom">Nom</label>
    				</div>
    				<div class="col-75">
      					<input type="text" id="txt_nom" name="txt_nom" required>
    				</div>
  				</div>
				<div class="row">
    				<div class="col-25">
      					<label for="txt_mdp">Mot de passe</label>
    				</div>
    				<div class="col-75">
      					<input type="password" id="txt_mdp" name="txt_mdp" minlength="8" required>
    				</div>
  				</div>
				<div class="row">
    				<div class="col-25">
						<label for="check_gest_admin">Gestion des administrateurs</label>
    				</div>
    				<div class="col-75">
						<select name="check_gest_admin">
    						<option value="Oui">Oui</option>
    						<option value="Non">Non</option>
						</select>
    				</div>
  				</div>
				<div class="row">
    				<div class="col-25">
						<label for="check_reserv_admin">Gestion des réservations</label>
    				</div>
    				<div class="col-75">
						<select name="check_reserv_admin">
    						<option value="Oui">Oui</option>
    						<option value="Non">Non</option>
						</select>
    				</div>
  				</div>
  				<br>
  				<div class="row">
    				<input type="submit" value="Valider la création du compte">
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
						  echo '<center><p style="color:red">Cet utilisateur existe déjà !</p></center>';
						}else {
							$requete = mysqli_query($db, "INSERT INTO admin_comptes (prenom,nom,identifiant,mot_de_passe,perm_gest_admin,perm_gest_reserv) VALUES ('". $txt_prenom ."','". $txt_nom ."','". $txt_identifiant ."','". $txt_mdp ."','". $check_gest_admin ."','". $check_reserv_admin ."')");

                            if ($requete){
                                echo '<center><p style="color:green">L\'utilisateur '.$txt_identifiant.' a bien été ajouté.</p></center>';
                            }else {
                                echo '<center><p style="color:red">Une erreur est survenu lors de l\'ajout ! </p></center>';
                            }
						  
						}
					}else {
						echo "<p style='color:red;text-align:center;'>Tu n'as pas cette permission !</p>";
					}
				}
            }
        ?>
		</div>

	</section>
	<h1 style="color:blue;text-align:center">Liste des comptes Administrateurs</h1><br>
	<main role="main">
		<div class="container2">
			<?php
				$requete = mysqli_query($db,"SELECT * FROM admin_comptes");
				$ligne;

				while ($ligne = mysqli_fetch_assoc($requete)){
					if (isset($_SESSION['perm_gest_admin'])){
						if ($_SESSION['perm_gest_admin'] == 1){
							echo '<div class="card"><p class="card__name">'.$ligne['prenom'].' '.$ligne['nom'].'</p>
    				    		<button class="btn draw-border"><a href="./admin_comptes.php?id='.$ligne['identifiant'].'">Supprimer</a></button>
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
	</main>
	
	<footer>
		<p>&copy; Restaurant GB - 2022</p>
	</footer>

</body>

</html>