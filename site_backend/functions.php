<?php
//Nouvelle fonction SQL qui prend une requete SQL préparée, des types(voir [https://www.php.net/manual/fr/mysqli-stmt.bind-param]), une connextion base de données et des parametres dans un array et qui retourne un resultat automatique utilisable par la suite :)
    function masseSQL($dblink, $sqlstatement, $types, $parameters)
    {
    	
    		if($bigprep = mysqli_prepare($dblink, $sqlstatement))
    		{

                     mysqli_stmt_bind_param($bigprep, $types, ...$parameters);
                  	
    		mysqli_stmt_execute($bigprep);
    		return mysqli_stmt_get_result($bigprep);
    		}
    		else
    		{
    			echo mysqli_error($dblink);
    		}

        mysqli_stmt_close($bigprep);
    }

?>