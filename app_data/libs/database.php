<?php

Class Database {
	function __construct(){
		//echo 'nueva conexion DB';
	}
	function connect(){
		$cn=mysqli_connect($_ENV['DB_HOST'],$_ENV['DB_USER'],$_ENV['DB_PASSWORD']); /*ENV SE SACA DE INDEX INICAL PARA UNA VARIABLE DE ENTORNO */
		if(!$cn){
			echo("<script>alert('Error en la conexión.')
			window.location.href = '". $_ENV['URL'] ."error';
			</script>");
		}
		$db = mysqli_select_db($cn,$_ENV["DB_NAME"]);
		if(!$db){
			mysqli_close($cn);
			echo("<script>
			alert('Base de datos no existe.');
			window.location.href = '". $_ENV['URL'] ."error';
			</script>");
		}
		return $cn;
	}
}





/*
function fnConsultaSelect($consulta){
	// LLamar a la funcion de conexión que retorna la conexion
	$cn=fnConnect();
	// Realiza la petición a la base de datos y devuelte la tabla
	$tablaSQL = mysqli_query($cn,$consulta);
	return $tablaSQL;
}
function fnConsultaInsert($consulta){
	$cn = fnConnect();

	$respuesta = mysqli_query($cn, $consulta);
	return($respuesta);
}
function fnShowMsg($title,$msg){
    echo("<th>$title</th>"); 
	echo("<td>$msg</td>");
	echo("<a href='index.php'>Regresar</a>");
}
*/
?>