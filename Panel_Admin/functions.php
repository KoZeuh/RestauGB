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
            echo '<li><a href="./index.php">Accueil</a></li>';
        }else {
            echo '<li><a href="./index.php">Accueil</a></li>';
            if (isset($_SESSION['perm_gest_reserv'])){
                if ($_SESSION['perm_gest_reserv'] == 1){
                    echo '<li><a href="./admin_reservations.php">Gestion des réservations</a>';
                }
            }
            

            if (isset($_SESSION['perm_gest_admin'])){
                if ($_SESSION['perm_gest_admin'] == 1){
                    echo '<li><a href="./admin_comptes.php">Gestion des administrateurs</a>';
                }
            }
            
        };
    };

?>

