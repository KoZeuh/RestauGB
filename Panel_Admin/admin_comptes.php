<?php
    session_start();

	include 'functions.php';
	include 'database.php';
?>

<!doctype html>
<html lang="fr" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>Restaurant GB</title>

    <link rel="stylesheet" href="CSS/style_admin_comptes.css">
	<script src="JS/script.js"></script>

	<style>
		
* {
    box-sizing: border-box;
  }
  
  input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
  }
  
  label {
    padding: 12px 12px 12px 0;
    display: inline-block;
  }
  
  input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	float:right;
  }
  
  input[type=submit]:hover {
    background-color: #45a049;
  }
  
  .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }
  
  .col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
  }
  
  .col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
  }
  
  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  
  /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
      width: 100%;
      margin-top: 0;
    }
  }

  .container2 {
  display: grid;
  grid-template-columns: 300px 300px 300px;
  grid-gap: 50px;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f5f5f5;
  font-family: 'Baloo Paaji 2', cursive;
}

  .card {
  background-color: #222831;
  height: 37rem;
  border-radius: 5px;
  display: flex;
  flex-direction: column;
  align-items: center;
  box-shadow: rgba(0, 0, 0, 0.7);
  color: white;
}

.card__name {
  margin-top: 15px;
  font-size: 1.5em;
}

.card__image {
  height: 160px;
  width: 160px;
  border-radius: 50%;
  border: 5px solid #272133;
  margin-top: 20px;
  box-shadow: 0 10px 50px rgba(235, 25, 110, 1);
}


.draw-border {
  box-shadow: inset 0 0 0 4px #58cdd1;
  color: #58afd1;
  -webkit-transition: color 0.25s 0.0833333333s;
  transition: color 0.25s 0.0833333333s;
  position: relative;
}

.draw-border::before,
.draw-border::after {
  border: 0 solid transparent;
  box-sizing: border-box;
  content: '';
  pointer-events: none;
  position: absolute;
  width: 0rem;
  height: 0;
  bottom: 0;
  right: 0;
}

.draw-border::before {
  border-bottom-width: 4px;
  border-left-width: 4px;
}

.draw-border::after {
  border-top-width: 4px;
  border-right-width: 4px;
}

.draw-border:hover {
  color: #ffe593;
}

.draw-border:hover::before,
.draw-border:hover::after {
  border-color: #eb196e;
  -webkit-transition: border-color 0s, width 0.25s, height 0.25s;
  transition: border-color 0s, width 0.25s, height 0.25s;
  width: 100%;
  height: 100%;
}

.draw-border:hover::before {
  -webkit-transition-delay: 0s, 0s, 0.25s;
  transition-delay: 0s, 0s, 0.25s;
}

.draw-border:hover::after {
  -webkit-transition-delay: 0s, 0.25s, 0s;
  transition-delay: 0s, 0.25s, 0s;
}

.btn {
  background: none;
  border: none;
  cursor: pointer;
  line-height: 1.5;
  font: 700 1.2rem 'Roboto Slab', sans-serif;
  padding: 0.75em 2em;
  letter-spacing: 0.05rem;
  margin: 1em;
  width: 13rem;
}

.btn:focus {
  outline: 2px dotted #55d7dc;
}

.grid-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: 20px;
  font-size: 1.2em;
}

	</style>

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
  			<form action="/admin_comptes.php" enctype="multipart/form-data" method="post">
				<div class="row">
    				<div class="col-25">
      					<label for="prenom_admin">Prénom</label>
    				</div>
    				<div class="col-75">
      					<input type="text" id="prenom_admin" name="prenom_admin" required>
    				</div>
  				</div>
  				<div class="row">
    				<div class="col-25">
      					<label for="nom_admin">Nom</label>
    				</div>
    				<div class="col-75">
      					<input type="text" id="nom_admin" name="nom_admin" required>
    				</div>
  				</div>
				<div class="row">
    				<div class="col-25">
      					<label for="mdp_admin">Mot de passe</label>
    				</div>
    				<div class="col-75">
      					<input type="text" id="mdp_admin" name="mdp_admin" minlength="8" required>
    				</div>
  				</div>
  				<br>
  				<div class="row">
    				<input type="submit" value="Valider la création du compte">
  				</div>
  			</form>
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
					echo '<div class="card">
    				<p class="card__name">'.$row['prenom'].' - '.$row['nom'].'</p>

    				<button class="btn draw-border"><a href="./admin_comptes.php?id='.$row['identifiant'].'">Supprimer</a></button>
  				</div>';
                }

				if (!empty($_GET["id"])){
					$dataId = $_GET['id'];

					$req = $db->prepare("DELETE FROM admin_comptes WHERE identifiant >= :user_id");
					$req->bindParam(':user_id', $dataId);
					$req->execute();
					header('Location: admin_comptes.php');
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