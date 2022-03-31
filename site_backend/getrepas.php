<?php
$mois = date('m');
//HEADER OF THE FILE(THIS FILE RETURN JSON SO APPLICATION/JSON)
if(file_exists("getrepas.json"))
{
	$file = date('m', filemtime("getrepas.json"));
	if($file == $mois)
	{
	header("Location: getrepas.json");
	}
}

header('Content-Type: application/json; charset=utf-8');
require('../Panel_Admin/database.php');
require('functions.php');
// WE DEFINE SOME VARIABLES
$i = 0;
$array = array();
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
$array['created'] = $mois;
// WE ENCODE INTO JSON(application/json);
$put = json_encode($array);
echo $put;
// THEN WE CLOSE THE CONNECTION TO THE DATABASEEEEEE
mysqli_close($db);
file_put_contents("getrepas.json", $put);
// Write to a file in order to cache...
?>