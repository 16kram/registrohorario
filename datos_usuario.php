<?php 

session_start();

require_once("configuracion.php");

//Informacion del usuario
$nombre="";
$apellidos="";
$direccion="";
$ciudad="";
$email="";

$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$direccion=$_POST['direccion'];
$ciudad=$_POST['ciudad'];
$email=$_POST['email'];

	//Registrar datos usuario
	$query=mysqli_query($link,"INSERT INTO personas (nombre,apellidos,direccion,ciudad,email) VALUES ('$nombre','$apellidos','$direccion','$ciudad','$email')");
	//echo "El usuario ".$usuario_registrado." ha sido registrado."."<br>";	

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Datos guardados</title>
  </head>
  <body>
  <br>
<div class="container">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Datos guardados</h5>
    <p class="card-text">Pulse el botón para volver a la página principal y autentiquese</p>
    <a href="index2.html" class="btn btn-primary">Volver</a>
  </div>
</div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>