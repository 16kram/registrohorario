<?php
//Datos para la base de datos MySql
$host="localhost";
$puerto="3306";
$usuario="root";
$contrasena="";
$baseDeDatos="mantenimiento";
$tabla="usuarios";

//Conectamos con la base de datos
$link=new mysqli($host,$usuario,$contrasena,$baseDeDatos);

?>