<?php

require('link.php');

$mois = date('m');

$sql = "SELECT * FROM platdujour WHERE numMois = $mois ORDER BY prixHT DESC";

try
{
$query = mysqli_query($connect, $sql);
}
catch(Exception $e)
{
    echo mysqli_error($connect);
}
if($fetch = mysqli_fetch_assoc($query)){



    while($fetch = mysqli_fetch_assoc($query))
    {
        $array = array('nomPlat' => $fetch['nomPlatJour'], "prixHT" => $fetch['prixHT']);
        echo json_encode($array);
    }
    
}

 else
  {

    echo json_encode("Aucun plat a afficher");



  }

phpinfo();
?>