<<<<<<< HEAD
<?php

require('../Panel_Admin/database.php');

$mois = date('m');

$sql = "SELECT * FROM platdujour WHERE numMois = $mois ORDER BY prixHT DESC";

try
{
if($query = mysqli_prepare($connect, $sql));
{
	mysqli_stmt_bind_param($query, 'i', $mois);
	mysqli_stmt_execute($query);
}
}
catch(Exception $e)
{
    echo mysqli_error($e->getMessage());
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

    echo "Aucun plat a afficher";



  }

mysqli_stmt_close($query);
mysqli_close($db);
=======
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

    echo "Aucun plat a afficher";



  }

phpinfo();
>>>>>>> 153c6a096df4cadda24983f91e13ff94c75fa9df
?>