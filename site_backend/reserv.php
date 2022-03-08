<?php
require('../Panel_Admin/functions.php');
if(!empty($_POST))
{
    require('../Panel_Admin/database.php');
    $service = '';
	$wants_update = 1;
    $prenom_client = $_POST['prenom'];
    $nom_client = $_POST['nom'];
    $tel_client = $_POST['phone'];
    $email_client = $_POST['contactEmail'];
    $nbre_personne = $_POST['nbr_personne'];
	$datefull = $_POST['comeDate'];
    $datepart = explode("T", $datefull);
    $dateint = floatval($datepart[1]);
	
	
	$query = mysqli_query($db,"SELECT COUNT(*) FROM reservations WHERE mail = $email_client");

    if($dateint >= 12 AND $dateint < 18)
    {
        $service = 'Midi';
    }
    else
    {
        $service = 'Soir';
    }


    $prep = mysqli_query($db, "INSERT INTO reservations(prenom, nom, telephone, mail, date_Reservation, nbr_Personnes, service) VALUES('$prenom_client', '$nom_client', $tel_client, '$email_client', '$datefull', $nbre_personne, '$service')");
    

    echo mysqli_error($db);




    print_r($prep);
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
}

else
{
    echo 'This page requires POST received GET';
}
?>

