<?php  
    function VerifAuthentification(){
        session_start();
            
        if(!isset($_SESSION['auth'])){
            header('Location: connect.php');
            exit();
        }
    };

    function LoadPageAccess(){
        if(!isset($_SESSION['auth'])){
            echo '<li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>';
        }else {
            echo '<li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>';
            if (isset($_SESSION['perm_gest_reserv'])){
                if ($_SESSION['perm_gest_reserv'] == 1){
                    echo '<li class="nav-item"><a class="nav-link" href="admin_reserv.php">Réservations</a></li>';
                }
            }
            

            if (isset($_SESSION['perm_gest_admin'])){
                if ($_SESSION['perm_gest_admin'] == 1){
                    echo '<li class="nav-item"><a class="nav-link" href="admin_comptes.php">Administrateurs</a></li>';
                }
            }

            echo '<li class="nav-item"><a class="nav-link" href="admin_plats.php">Plats</a></li>';
            
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


//Nouvelle fonction SQL qui prend une requete SQL préparée, des types(voir [https://www.php.net/manual/fr/mysqli-stmt.bind-param]), une connextion base de données et des parametres dans un array et qui retourne un resultat automatique utilisable par la suite :)
    function masseSQL($dblink, $sqlstatement, $types, $parameters)
    {
    	
    		if($bigprep = mysqli_prepare($dblink, $sqlstatement))
    		{

                     mysqli_stmt_bind_param($bigprep, $types, ...$parameters);
                  	
    		mysqli_stmt_execute($bigprep);
    		return mysqli_stmt_get_result($bigprep);
    		}
    		else
    		{
    			echo mysqli_error($dblink);
    		}

        mysqli_stmt_close($bigprep);
    }

?>

