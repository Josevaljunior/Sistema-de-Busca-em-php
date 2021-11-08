<?php
$hostname="localhost";
$dbname="busca";
$user="root";
$password ="";

$mysqli = new mysqli($hostname, $user, $password, $dbname);

if($mysqli->connect_errno){
    echo "ERRO ao tentar conectar com servidor: (" . $mysqli->connect_errno." )";
}
?>