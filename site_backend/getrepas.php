<?php
header('Content-TYpe: application/json; charset=utf-8');
$i = 0;
require('../Panel_Admin/database.php');

$mois = date('m');

$sql = "SELECT * FROM platdujour WHERE numMois = ? ORDER BY prixHT DESC";


if($bigprep = mysqli_prepare($db, $sql));
{
  mysqli_stmt_bind_param($bigprep, 'i', $mois);
}

mysqli_stmt_execute($bigprep);
$query = mysqli_stmt_get_result($bigprep);

$array = array();
    while($fetch = mysqli_fetch_assoc($query))
    {
      
        $array['nomPlat'][$i] = $fetch['nomPlatJour'];
        $array['prixHT'][$i] = $fetch['prixHT'];
        $i++;
    }


  


echo json_encode($array);


mysqli_stmt_close($bigprep);


mysqli_close($db);
?>