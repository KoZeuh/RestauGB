<?php
    session_start();

	include 'functions.php';
    include 'database.php';
  
  if(isset($_SESSION['auth'])){
    session_destroy();
    header('Location: connect.php');
  }
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Restau GB - Déconnexion</title>

    </head>

    <body>
    </body>
</html>
