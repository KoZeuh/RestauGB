<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
<?php  
    function VerifAuthentification(){
        session_start();
            
        if(!isset($_SESSION['auth'])){
            header('Location: index.php');
            exit();
        }
    };

    function LoadPageAccess(){
        if(!isset($_SESSION['auth'])){
            echo '<li><a href="./index.php">Connexion</a></li>';
        }else {
            echo '<li><a href="./admin_reservations.php">Gestion des réservations</a>';
            echo '<li><a href="./admin_comptes.php">Gestion des administrateurs</a>';
        };
    };

?>
</body>
</html>

