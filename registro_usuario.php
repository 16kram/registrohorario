<?php 

//Datos del usuario que va a registrarse
require_once("configuracion.php");
$usuario_registrado="";
$password="";
$hash_usuario="";

if(isset($_POST['usuario']) && isset($_POST['password'])){
	$usuario_registrado=$_POST['usuario'];
	$password=$_POST['password'];
	$hash_usuario= md5($usuario_registrado.$password);//Hash del usuario
}

if($link){
	
	//Revisar si el usuario existe
		$query=mysqli_query($link,"SELECT * FROM usuarios");
		while($array=mysqli_fetch_array($query)){
		//echo $array['usuario']." ".$array['password']."<br/>";
		if($array['usuario']==$_POST['usuario']){
		//El usuario ya existe
				header("Location: index2.html");

		}
	}
	
	
	//Registrar usuario
	$query=mysqli_query($link,"INSERT INTO usuarios (usuario,password) VALUES ('$usuario_registrado','$hash_usuario')");
	//echo "El usuario ".$usuario_registrado." ha sido registrado."."<br>";	
}else{
	echo "Error en mysql";
}

//msql_close($link);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Registro de nuevo usuario</title>
  </head>
  <body>
<!-- Encabezado -->
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Formulario de registro de usuario</span>
	      <span class="navbar-text">
        <?php echo $usuario_registrado ?> <a href="logout.php">(Desconectarse)</a>
      </span>
  </div>
</nav>

<br>

<div class="container">
  <form action="datos_usuario.php" method="POST">
  <div class="mb-3">
    <label for="usuario" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-z]{4-16}"required title="Escriba su nombre">
  </div>
  <div class="mb-3">
    <label for="apellidos" class="form-label">Apellidos</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" pattern="[A-Za-z]{4-16}" required title="Escriba sus apallidos">
  </div>
    <div class="mb-3">
    <label for="direccion" class="form-label">Direccion</label>
    <input type="text" class="form-control" id="direccion" name="direccion" title="Escriba su dirección">
  </div>
      <div class="mb-3">
    <label for="ciudad" class="form-label">Ciudad</label>
    <input type="text" class="form-control" id="ciudad" name="ciudad" title="Escriba su ciudad">
  </div>
    <div class="mb-3">
    <label for="e-mail" class="form-label">e-mail</label>
    <input type="text" class="form-control" id="email" name="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required title="Escriba su e-mail">
  </div>
  <br>
  <button type="submit" class="btn btn-primary" title="Para guardar los datos pulse este botón">Guardar datos</button>
</form>
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
