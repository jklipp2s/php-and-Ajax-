<!DOCTYPE html>
<html>

<head>
<title>Little bit with Ajax</title>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



<style>


html, body {
    width:100%;
    height:100%;
    display: flex;
    justify-content: center;
    align-content: center;
    align-items: center;
}

form {
    width: 60%;
    display: grid;
    grid-auto-rows: auto 10px auto 20px auto;
    background-color: whitesmoke;
   padding: 50px 50px 10px 50px;
   border-radius: 4px;
}


input[type="text"] {
    height: 30px;
    
}

.col2{
    grid-row: 3/3;
}

.col3{
    grid-row: 5/5;
    width: 100px;
    height: 35px;
    margin: auto;
    background-color: black;
    color: white;
 
}

.output {
    position: absolute;
    top:0;
    left:0;
    width:300px;
    height:100px;
    background-color: whitesmoke;
}


</style>


</head>



<body>




<form id="form" >


<input class="col1" type="text" name="name" placeholder="Name">
<input class="col2" type="text" name="nachname" placeholder="Nachname">
<input  class="col3" type="submit" name="senden" id="senden">
</form>

<div class="output"></div>




<script>

$('#form').submit(function(event){
event.preventDefault();
$.ajax({
    type: 'GET',
    url: 'insert_data.php',
    data: $(this).serialize(),
    success: function(data) {
        $('.output').html(data);
    }
});

$('#form')[0].reset();


});

</script>




</body>






</html>