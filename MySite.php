<!DOCTYPE html>
<html>

<?php

$servername = "localhost";
$user = "root";
$pw = "";
$db = "sensitivedaten";

$connection = new mysqli($servername, $user, $pw, $db);




if ($connection->connect_error) {
    die("Uuups Da ist wohl was schiefgelaufen" . $connection->connect_error);
}

/*
make Components reusable

include 'Menu.php';



LOAD SOME DATA INTO THE DATABASE   

        $sql = " INSERT INTO user (name,passwort) VALUES ('Bernd', 'password')";

        if ($connection->query($sql) === TRUE) {
            echo "Willkommen " . $_POST["name"];
        } else {
            echo "Bitte überprüfe deine EingabeDaten. " . $connection->error;
        }

  


 FETCH SOME DATA OUT OF THE DATABASE

        $sql = "SELECT * FROM user";
        $res = $connection->query($sql);

        if($res->num_rows > 0) {
            while($i = $res->fetch_assoc()) {
                echo "ID: " . $i["ID"] . "     Name: " . $i["Name"];
            }
        } else {
            echo "please call a DataBaseEngineer";
        }




        $connection->close();
  


 Datum generieren
    echo "Heute ist der " . date("d.m.yy");
  

 // CHECK FILEUPLOADLOCATION
    die(ini_get('upload_tmp_dir') ? ini_get('upload_tmp_dir') : sys_get_temp_dir());


// FileUpload

if (isset($_POST["submit"])) {
    $ziel = "uploads/";
    $zieldatei = $ziel . basename($_FILES["DateiZumHochladen"]["name"]);
    $error = 0;


    $endung = pathinfo($zieldatei, PATHINFO_EXTENSION);

    if ($endung != "txt") {
        $imagesize = getimagesize($_FILES["DateiZumHochladen"]["tmp_name"]);
        if ($imagesize === false) {
            $error = 1;
        } else {
            $imagesize["mime"];
        }
    }


    if ($endung != "jpg" && $endung != "jpeg" && $endung != "png" && $endung != "bmp" && $endung != "txt") {
        $error = 1;
    }

    if (file_exists($zieldatei)) {
        $error = 1;
    }

    if ($_FILES["DateiZumHochladen"]["size"] > 2 * 1024 * 1024) {
        $error = 1;
    }

    if ($error != 1) {
        if (move_uploaded_file($_FILES["DateiZumHochladen"]["tmp_name"], $zieldatei)) {
            echo "Datei erfolgreich hochgeladen";
        } else {
            echo "Fehler";
        }
    }

}

// WRITE IN A FILE

  $file = fopen("test.txt","w");
  fwrite($file,"fsociety");
  fclose($file);
  */


?>


<?php
/*

    Email Authentification 


    $error = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty(htmlspecialchars(stripslashes(trim($_POST["name"]))))) {
            $error = "Der Name ist nicht optional";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error = "Ungültige Email";
        } else {
            
            echo $_POST["name"] . "<br>";
            echo $_POST["email"];
        }
    }


    Session Handling

    session_start();
    $_SESSION["slogan"] = "Hugs are better than Handshakes";
    echo $_SESSION["slogan"];
    session_unset();
    session_destroy();


    PASSWORD HASHING

    $passwort = "einwichtigespassword";
    echo hash("sha512", $passwort);

    WITH SALT

    $passwort = "einwichtigespassword";
    $hashed = password_hash($passwort, PASSWORD_DEFAULT);
    if(password_verify($passwort, $hashed)){
        echo "eingeloggt";
    }


    
    */

    $emailTo = "email2@localhost";

    $subject = "Dies ist eine testgenerierte Mail";

    $body = "Testcontent!!!!!!";
    $headers = "FROM: julian.klippel@smail.inf.h-brs.de";

  if (mail($emailTo, $subject, $body, $headers)){
      echo "Die Email wurde erfolgreich verschickt!";
  } else {
      echo "Die Email konnte leider nicht versendet werden";
  }






?>






<?php
/*
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
    Name: <input type="text" name="name"><br>
    Passwort: <input type="text" name="passwort"><br>
    
    <input type="button" value="Senden" onclick="<?php register($con); ?>" >
</form>
*/
?>








</html>