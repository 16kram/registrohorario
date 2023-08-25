<?php
require_once("funciones.php");
validar_sesion();

require_once("configuracion.php");
?>


<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<title>Registro de horas</title>

<style>
    #logout {
        position: fixed;
        bottom: 0;
        width: 100%;
        text-align: center;
        padding: 10px;
        background-color: #f0f0f0;
    }
</style>
<script>
//Botón marcha paro para fichar
function boton(){
var elemento=document.querySelector("button");
elemento.onclick=accion;
}

//Acción del botón
function accion(){
	var elemento=document.querySelector("button");
	elemento.textContent="Parar";
	elemento.style.backgroundColor='red';
}

window.onload=boton;
</script>
</head>

<body>
<script>
//Reloj
function actualizarReloj() {
    const relojElemento = document.getElementById('reloj');
    const ahora = new Date();
    const hora = ahora.getHours();
    const minutos = ahora.getMinutes();
    const segundos = ahora.getSeconds();
    
    const horaFormateada = hora.toString().padStart(2, '0');
    const minutosFormateados = minutos.toString().padStart(2, '0');
    const segundosFormateados = segundos.toString().padStart(2, '0');
    
    const horaActual = `${horaFormateada}:${minutosFormateados}:${segundosFormateados}`;
    
    relojElemento.textContent = horaActual;
}

// Actualizar el reloj cada segundo (1000 ms)
setInterval(actualizarReloj, 1000);

// Llamar a la función una vez para que el reloj se muestre inmediatamente
actualizarReloj();
</script>

<!-- Encabezado -->
<nav class="navbar navbar-light bg-light">
<div class="container-fluid">
<span class="navbar-brand mb-0 h1">Registro de horas</span>
</div>
</nav>
<div class="container">
<!-- Contenido aquí -->
<br>
<p>Usuario: <?php echo $_SESSION['user'] ?></p>
<p>Fecha: <?php setlocale(LC_TIME, "spanish");
echo strftime("%A, %d de %B de %Y"); ?></p>
<br>


<div class="row w-100 align-items-center">
<div class="col text-center">
<p>Hora actual</p>
<p id="reloj"></p>
<button class="btn btn-success regular-button"> Iniciar </button>
</div>
</div>
<br><br>

</div>
<div id="logout">
 <b>El usuario está autenticado </b>(<a href="logout.php">Desconectarse</a>)
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