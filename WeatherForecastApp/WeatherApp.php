
<?php




$error ="";



if(isset($_GET["stadt"])){

    $location = $_GET['stadt'];

if(empty($location)){
    $error = "Bitte Geben Sie ihre Stadt in das Suchfeld ein!";
} else {

$queryString = http_build_query([
  'access_key' => '3f8fbeab702d05eb5908004fbef433bf',
  'query' => $location,
  
]);





$ch = curl_init(sprintf('%s?%s', 'http://api.weatherstack.com/current', $queryString));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$json = curl_exec($ch);
curl_close($ch);

$api_result = json_decode($json, true);

if(empty($api_result)){
    $error = "Für diese Stadt haben wir leider keine Daten.";
} 


}





?>


<!doctype html>
<html style="width:100%;height:100%;" lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Weather ForeCast</title>
</head>

<body style="width:100%;height:100%;">

    <div class="containerfluid" style="height:100%; display:flex;justify-content: center; align-content: center;align-items: center;"  >
    <img class="rounded" style="width:1200px; height:700px" src="img/background.jpg" alt="Bild konnte nicht geladen werden!!">

    
    <form methood="get" style = "position: absolute;display:grid; grid-auto-columns: minmax(200px,600px) 10px auto;">

    <h3 style="text-align: center;margin-bottom:10px; grid-column:1/4;color: white;">Wie ist das Wetter????</h3>
    <h5 style="text-align: center;margin-bottom:50px; grid-column:1/4;color: white;">Geben Sie den Namen ihrer Stadt in das Suchfeld ein!</h5>
 
    <input class="form-control" style="grid-column: 1/1;" name="stadt" type="text" placeholder="Default input">
    <button type="submit" style="grid-column: 3/3;" class="btn btn-primary">Wetter vorhersagen</button>
    
    <?php 
    
    if(empty($error) && isset($_GET["stadt"])){
    echo " <div style ='grid-column:1/4;margin-top:15px;' class='alert alert-block alert-info'> 
    <button type='button' class='close'data-dismiss='alert'>&times;</button>
    Current temperature in $location is {$api_result['current']['temperature']}℃"

        . "<br> it is {$api_result['current']['observation_time']}" 
        . "<br> wind speed: {$api_result['current']['wind_speed']}"
        . "<br> visibility: {$api_result['current']['visibility']}"
        . "<br> uv_index: {$api_result['current']['uv_index']}"
        . " </div>"
    ;
    } else {
        echo '<span style="color:red;">' . $error . '</span>';
    }
}
    
    
    
    ?>


    </form>

</div>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>