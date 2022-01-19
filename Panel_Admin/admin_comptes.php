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

    <link rel="stylesheet" href="style_admin_comptes.css">
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
                echo '<strong>Bonjour '.$_SESSION['identifiant'].' - Tu es actuellement authentifié sur le panel de gestion du restaurant de Gaston Berger.</strong>';
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
  				<br>
  				<div class="row">
    				<input type="submit" value="Valider la création du compte">
  				</div>
  			</form>

        <?php
            $utilisateurExist = False;

            if (!empty($_POST["txt_prenom"]) && !empty($_POST["txt_nom"]) && !empty($_POST["txt_mdp"])){
                $txt_prenom = htmlspecialchars(stripslashes($_POST['txt_prenom']));
                $txt_nom = htmlspecialchars(stripslashes($_POST['txt_nom']));
                $txt_mdp = md5(htmlspecialchars(stripslashes($_POST['txt_mdp'])));

                $txt_identifiant = strtolower(htmlspecialchars(stripslashes($txt_prenom)).'.'.htmlspecialchars(stripslashes($txt_nom)));

                $data = $db->prepare("SELECT * FROM admin_comptes");
                $data->execute();
        
                $userExist = False;
                foreach ($data as $row) {
                    if ($row['identifiant'] == $txt_identifiant){
                        $userExist = True;
                    };
                }

                if ($userExist){
                  echo '<center><p style="color:red">Cet utilisateur existe déjà !</p></center>';
                }else {
                  $sql = "INSERT INTO admin_comptes (prenom,nom,identifiant,mot_de_passe) VALUES (?,?,?,?)";
                  $db->prepare($sql)->execute([$txt_prenom,$txt_nom,$txt_identifiant,$txt_mdp]);
                  $sql = null;
                  echo '<center><p style="color:green">L\'utilisateur '.$txt_identifiant.' a bien été ajouté.</p></center>';
                }
            }
        ?>
		</div>

	</section>
	<section id="pageContent">
		<main role="main">
		<h1 style="color:blue;text-align:center">Liste des comptes Administrateurs</h1>
			<div class="container2">
			<?php
				  $data = $db->prepare("SELECT * FROM admin_comptes");
				  $data->execute();

          foreach ($data as $row) {
					  echo '<div class="card"><p class="card__name">'.$row['prenom'].' - '.$row['nom'].'</p>
    				      <button class="btn draw-border"><a href="./admin_comptes.php?id='.$row['identifiant'].'">Supprimer</a></button>
  			      	</div>';
          }

				  if (!empty($_GET["id"])){
					  $dataId = $_GET['id'];

					  $req = $db->prepare("DELETE FROM admin_comptes WHERE identifiant = :user_id");
					  $req->bindParam(':user_id', $dataId);
					  $req->execute();
            $req = null;
				  };
      ?>
		</main>
	</section>
	<footer>
		<p>&copy; RGB</p>
		<address>
			Contact: <a href="mailto:me@example.com">Mail me</a>
		</address>
	</footer>


</body>

</html>