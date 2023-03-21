<?php

$Host="localhost";
$User="root";
$Password="";
$Database="pijarcamp";

$connect_db = mysqli_connect($Host,$User,$Password,$Database);
if (!$connect_db){
        die("Gagal:".mysqli_connect_error());  
}
?>