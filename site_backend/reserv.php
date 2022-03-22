
<?php
require('../Panel_Admin/functions.php');
if(!empty($_POST))
{
    require('../Panel_Admin/database.php');

    $service = '';
    $prenom_client = $_POST['u_prenom'];
    $nom_client = $_POST['u_nom'];
    
    $tel_client = $_POST['u_tel'];
    $email_client = $_POST['u_mail'];
    $nbre_personne = $_POST['u_nb'];
	$datefull = $_POST['u_datetime'];
    
    $datepart = explode("T", $datefull);
    $dateint = intval($datepart[1]);
	
	
    if($dateint >= 12 AND $dateint < 18)
    {
        $service = 'Midi';
    }
    else
    {
        $service = 'Soir';
    }


    $array = array($prenom_client, $nom_client, $tel_client, $email_client, $datefull, $nbre_personne, $service);
    //$query = mysqli_query($db,"SELECT id_Reservation, mail, telephone FROM reservations");
    
    $sql = "INSERT INTO reservations(prenom, nom, telephone, mail, date_Reservation, nbr_Personnes, service) VALUES(?, ?, ?, ?, ?, ?, ?)";


    $result = masseSQL($db, $sql, 'ssissis', $array);

    mysqli_close($db);

/*
    print_r($prenom_client);
    print_r($nom_client);
    print_r($datefull);
    print($datepart[0]);
    print($datepart[1]);
    print_r($tel_client);
    print_r($email_client);
    print_r($nbre_personne);
    print_r($dateint);
    print_r(CountAllReserv($datefull,$service));
*/

  }

else
{
    echo 'This page requires POST received GET';
}
?>