<?php

$servername="localhost:3307";
$username="username";
$password="";
$database="dbms_phase2";

$con=mysqli_connect($servername,$username,$password,$database);

if(!$con)
{
    die("Sorry we failed to connnect due to:".mysqli_connect_error());

}


?>