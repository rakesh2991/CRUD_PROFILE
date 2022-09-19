<?php
// note: error_reporting(0):error msg show nhi karta hai and mysqli_connection_error() error show kare ga
// error_reporting(0);
$servername = "localhost";
$usernane = "id19557459_student";
$password = "Pc|D2>7V#o}WUK|{";
$dbname = "id19557459_xyz_db";

// multipal variable ko call karene ke liya , ka use hota hai
$conn = mysqli_connect($servername,$usernane,$password,$dbname);
if(!$conn)
{
    die("connection Failed");
}
// echo "connection sucessfull <hr/>";

?>