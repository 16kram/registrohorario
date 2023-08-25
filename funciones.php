<?php
session_start();
require_once("configuracion.php");

//Revisa si existe el usuario en la base de datos
function existe_usuario(){
	global $host,$usuario,$contrasena,$baseDeDatos,$link;

if($link){
	//Revisar si el usuario existe
		$query=mysqli_query($link,"SELECT * FROM usuarios");
		while($array=mysqli_fetch_array($query)){
		//echo $array['usuario']." ".$array['password']."<br/>";
		if($array['usuario']==$_POST['usuario']){
			$psswd_usuario=$array['password'];
			echo "El nombre del usuario ya existe<BR>";
			echo "password: ".$psswd_usuario;
			return $psswd_usuario;
		}
			
		
	}
	echo "El usuario no está registrado";
	
	//msql_close($link);
}
	
}

function login(){
	$usuario_valido=validar_usuario_y_password();
	if($usuario_valido){
		//Usuario o contraseña válidas
		$_SESSION['user']=$_POST['usuario'];
		$_SESSION['login_date']=time();
		header("Location: registro_horas.php");
	}else{
		//Usuario o contraseña no válidas
		header("Location: index2.html");
	}	
}

function validar_usuario_y_password(){
	$hash_base_datos_usuario=existe_usuario();
	global $hash_usuario;
	$hash_usuario_login=recoger_datos_POST();
	echo "<br>hash base de datos: ".$hash_base_datos_usuario;
	echo "<br>hash_login: ".$hash_usuario_login;
	if($hash_base_datos_usuario==$hash_usuario_login){
		return true;
	}
}

function recoger_datos_POST(){
	$hash="";
	if (isset($_POST['usuario']) && (isset($_POST['password']))){
		$hash=md5($_POST['usuario'].$_POST['password']);
		echo "<br>user:".$_POST['usuario'];
		echo "<br>psswd:".$_POST['password'];
		echo "<br>Recoger datos POST : ".$hash;
	}
	return $hash;
}

function obtener_ultimo_acceso(){
	$ultimo_acceso=0;
	if(isset($_SESSION['login_date'])){
	$ultimo_acceso=$_SESSION['login_date'];
}
return $ultimo_acceso;
}

function sesion_activa(){
	$estado_activo=False;
	$ultimo_acceso=obtener_ultimo_acceso();
	$limite_ultimo_acceso=$ultimo_acceso+1800;
	if($limite_ultimo_acceso>time()){
		$estado_activo=True;
		$_SESSION['login_date']=time();
	}
	return $estado_activo;
}

function validar_sesion(){
	if(!sesion_activa()){
		logout();
	}
}

function logout(){
	unset($_SESSION);
	
	$datos_cookie=session_get_cookie_params();
	setcookie(session_name(),NULL,time()-999999,$datos_cookie["path"],$datos_cookie["domain"],$datos_cookie["secure"],$datos_cookie["httponly"]);
	
	header("Location: index2.html");
}

?>
