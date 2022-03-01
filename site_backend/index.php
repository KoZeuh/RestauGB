<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
include("link.php");

$mois = date('n');
$jour = date('j');
$sql = "SELECT * FROM platdujour WHERE numMois = $mois AND numJour = $jour";
$query = mysqli_query($connect, $sql);
$fetch;
while($fetch = mysqli_fetch_assoc($query))
{ 
    $plats = $fetch['nomPlatJour']." ".$fetch['prixHT']."€";
	echo $plats;
}
?>
</body>
</html>

