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
                echo '<strong>Bonjour '.$_SESSION['identifiant'].' - Tu es actuellement authentifié sur le panel de gestion du restaurant de Gaston Berger.</strong>';
            };
        ?>
	</section>
	<section id="pageContent">
		<main role="main">
			<div class="form_center">
				<center><h1>Connexion</h1></center>
				<form enctype="multipart/form-data" method="post">
            		<fieldset>
                		Identifiant : <input type="text" id="identifiant" name="identifiant"><br>
						Mot de passe : <input type="password" id="mot_de_passe" name="mot_de_passe"><br>
						<input type="submit" name="submit" value="Valider" />
                		<table>
                			<tr>
                    			<td>
                        			<?php
                            			if (isset($_SESSION['error'])){
                                			echo "<br><span style='color:#FF0000;'>".$_SESSION['error']."</span></p>";
                                			unset($_SESSION['error']);
                            			};
									?>  
									
									<input type="submit" name="deconnexion" value="Déconnexion" />
                    			</td>
                			</tr>
					   </table>
					</fieldset>
					
        		</form> 
			</div>
		</main>
	</section>

	<?php
        if (!empty($_POST["deconnexion"])){
            session_destroy();
            header('Location: index.php');
		};
		
		if (!empty($_POST["identifiant"]) && !empty($_POST["mot_de_passe"])){
			$arrayData = array("identifiant" => htmlspecialchars(stripslashes($_POST['identifiant'])),"mot_de_passe" => md5(htmlspecialchars(stripslashes($_POST['mot_de_passe']))));
			$data = $db->query("SELECT * FROM admin_comptes")->fetchAll();
			$identifiantExist = False;

			foreach ($data as $row) {
				if ($row['identifiant'] == $arrayData["identifiant"]){
					if ($row['mot_de_passe'] == $arrayData['mot_de_passe']){
						$_SESSION["identifiant"] = $row['identifiant'];
						$_SESSION['auth'] = "True";

						header('Location: index.php');
					}else {
						echo "<script>alert(\"Le mot de passe ne correspond pas.\")</script>";
					}

					$identifiantExist = True;
				}
			}

			if (!$identifiantExist){
				echo "<script>alert(\"Ce identifiant n'existe pas.\")</script>";
				$identifiantExist = False;
			}
        };
	?>
	<footer>
		<p>&copy; RGB</p>
		<address>
			Contact: <a href="mailto:me@example.com">Mail me</a>
		</address>
	</footer>


</body>

</html>