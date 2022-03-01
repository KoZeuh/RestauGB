<?php
try{
$connect = mysqli_connect("localhost", "tkn_mysql", "eNaHMdJQ",  "tkn_mysql");
}
catch(Exception $e)
{
    echo mysqli_error($connect);
}
?>