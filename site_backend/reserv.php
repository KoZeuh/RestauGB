<?php
if(!empty($_POST))
{
    require('link.php');

try{
    $prenom_client = $_POST['prenom'];
    $nom_client = $_POST['nom'];
    $date_rsv = $_POST['comeDate'];
    $tel_client = $_POST['phone'];
    $email_client = $_POST['contactEmail'];
    $nbre_personne = $_POST['nbr_personne'];
    $prep = mysqli_query($connect, "INSERT INTO reservations(prenom, nom, telephone, mail, date_Reservation, nbr_Personnes) VALUES('$prenom_client', '$nom_client', $tel_client, '$email_client', '$date_rsv', $nbre_personne)");
    }
    catch(Exception $e)
    {
        echo mysqli_error($connect);
    }



    print_r($prep);
    print_r($prenom_client);
    print_r($nom_client);
    print_r($date_rsv);
    print_r($tel_client);
    print_r($email_client);
    print_r($nbre_personne);


}
else
{
    echo 'This page requires POST received GET';
}
?>

