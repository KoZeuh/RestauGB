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

            echo '<li><a href="./admin_plats.php">Gestion des plats</a>';
            
        };
    };

    function CountAllReserv($date,$service){
        include 'database.php';

        $requete;
        
        if ($service == "Midi/Soir"){
            $requete = mysqli_query($db,"SELECT * FROM reservations WHERE date_Reservation = '". $date ."'");
        }elseif ($service == "All"){
            $requete = mysqli_query($db,"SELECT * FROM reservations");
        }else {
            $requete = mysqli_query($db,"SELECT * FROM reservations WHERE date_Reservation = '". $date ."' AND service = '". $service ."'");
        }

        $ligne;

        $NbrCouverts = 0;
        $NbrPersonnes = 0;
        $NbrReserv = 0;

        while ($ligne = mysqli_fetch_assoc($requete)){
            $nbrPers = intval($ligne['nbr_Personnes']);

            if ($nbrPers%2 != 0){
                $NbrCouverts = $NbrCouverts+($nbrPers+1);
            }else {
                $NbrCouverts = $NbrCouverts+$nbrPers;
            }
            

            $NbrPersonnes = $NbrPersonnes+$nbrPers;
            $NbrReserv++;
        };


        return [$NbrCouverts,$NbrPersonnes,$NbrReserv];
    }

    function RemoveAfter21Days(){
        include 'database.php';

        $date = date("Y-m-d", strtotime('-21 day'));
        $requete = mysqli_query($db, "DELETE FROM reservations WHERE date_Reservation <= '".$date."'");
    }

?>

