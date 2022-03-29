<?php
//HEADER OF THE FILE(THIS FILE RETURN JSON SO APPLICATION/JSON)
header('Content-Type: application/json; charset=utf-8');
require('../Panel_Admin/database.php');
require('functions.php');
// WE DEFINE SOME VARIABLES
$i = 0;
$array = array();
$mois = date('m');
$sql = "SELECT * FROM platdujour WHERE numMois = ? ORDER BY prixHT DESC";
//MAIN CODE
//Nouvelle fonction 
$query = masseSQL($db, $sql, 'i', [$mois]);
    while($fetch = mysqli_fetch_assoc($query))
    {
        $array['nomPlat'][$i] = $fetch['nomPlatJour'];
        $array['prixHT'][$i] = $fetch['prixHT']; 
        // PUSHIN INTO THE ARRAY $array THE DISHES AND THEIR TAX LESS PRICE.(english)
        $i++;//2D ARRAY
    }
// WE ENCODE INTO JSON(application/json);
echo json_encode($array);
// THEN WE CLOSE THE CONNECTION TO THE DATABASEEEEEE
mysqli_close($db);
?>