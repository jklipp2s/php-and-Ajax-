<?php
$servername = "localhost";
$user = "root";
$pw = "";
$db = "sensitivedaten";

$connection = new mysqli($servername, $user, $pw, $db);




if ($connection->connect_error) {
    die("Uuups Da ist wohl was schiefgelaufen" . $connection->connect_error);
} 

if(isset($_GET['name']) && isset($_GET['nachname'])){
$nachname = $_GET['nachname'];
$name = $_GET['name'];
}

$sql_insert = "INSERT INTO testuser(nachname,vorname) values('" . $nachname ."','" . $name ."');";

if ($connection->query($sql_insert) === TRUE) {
    echo "Willkommen " . $name;
} else {
    echo "Bitte überprüfe deine EingabeDaten. " . $connection->error;
}


?>