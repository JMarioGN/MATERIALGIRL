<?php
	$con-mysqli_connect('localhost','root','','oxfor') od ('Error en la conexion servidor');
	$sql="INSERT INTO persona VALUES(null,'".$POST["nombre"]."','".$POST["ape_pat"]."','".$POST["ape_mat"]."','".$POST["colonia"]."','".$POST["numero"]."','".$POST["CP"]."','".$POST["F_nac"]."','".$POST["curp"]."','".$POST["num_telefono"]."','".$POST["tipo"]."')";

	$resultado=mysql_query($con,$sql) or die ('Error en el query base de datos');

	mysqli_close($con);

	require_once('agregar_alumno.php');
?>