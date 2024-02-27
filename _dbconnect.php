<?php

$servername="localhost:3307";
$username="username";
$password="";
$database="dbms_phase2";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
    die("Sorry we failed to connnect due to:".mysqli_connect_error());

}


?>