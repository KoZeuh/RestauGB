<<<<<<< HEAD
<?php
require('../Panel_Admin/functions.php');
if(!empty($_POST))
{
    require('../Panel_Admin/database.php');

    $service = '';
    $prenom_client = $_POST['prenom'];
    $nom_client = $_POST['nom'];
    
    $tel_client = $_POST['phone'];
    $email_client = $_POST['contactEmail'];
    $nbre_personne = $_POST['nbr_personne'];
	$datefull = $_POST['comeDate'];
    
    $datepart = explode("T", $datefull);
    $dateint = intval($datepart[1]);
	
    $reqtype = 0;
	
    if($dateint >= 12 AND $dateint < 18)
    {
        $service = 'Midi';
    }
    else
    {
        $service = 'Soir';
    }




    $query = mysqli_query($db,"SELECT id_Reservation, mail, telephone FROM reservations");

    $sql = "INSERT INTO reservations(prenom, nom, telephone, mail, date_Reservation, nbr_Personnes, service) VALUES(?, ?, ?, ?, ?, ?, ?)";

    while($data = mysqli_fetch_assoc($query))
    {
        if(isset($_POST['update']))
        {
    	   if($data['mail'] == $email_client OR $data['telephone'] == $tel_client)
    	{
            $email_content = file_get_contents('email/email.html');
            mail($data['mail'], "reservation existe deja", $email_content, "From: sofiane59660@hotmail.fr");
    		$sql = "UPDATE reservations SET nbr_Personnes = ?, date_Reservation = ?, service = ? WHERE id_Reservation = ?";
            $reqtype = 1;
    		break;
    	}
      }
    }


    if($bigprep = mysqli_prepare($db, $sql))
    {
        if($reqtype == 0)
        {
            mysqli_stmt_bind_param($bigprep, 'ssissis', $prenom_client, $nom_client, $tel_client, $email_client, $datefull, $nbre_personne, $service);
        }
        else
        {  
            mysqli_stmt_bind_param($bigprep, 'issi', $nbre_personne, $datefull, $service, $data['id_Reservation']);
        }
    }

  
    mysqli_stmt_execute($bigprep);
    mysqli_stmt_close($bigprep);

    echo mysqli_error($db);

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

//    header("Location: test.html");
  }

else
{
    echo 'This page requires POST received GET';
}
?>

=======
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

>>>>>>> 153c6a096df4cadda24983f91e13ff94c75fa9df
