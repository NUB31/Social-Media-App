<?php

$dbhost ="sql11.freemysqlhosting.net";
$dbuser ="sql11403330";
$dbpass ="zyqdYYmPeY";
$dbname ="sql11403330";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("failed to connect!");
}