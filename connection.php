<?php

$dbhost ="localhost";
$dbuser ="root";
$dbpass ="Olhs1357@1";
$dbname ="social";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("failed to connect!");
}