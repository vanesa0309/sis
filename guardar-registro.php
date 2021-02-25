<?php  
$host = "localhost";
$usuario = "root";
$clave = "";
$bd= "tesis";

$conexion = new mysqli($host,$usuario,$clave,$bd);
$conexion -> set_charset("uft-8");
if ($conexion) { 
	echo "";
}else{
	echo "Base de datos no existe";
}
    
    $idusuario =rand(2,100);
    $nombre= $_POST['nombre'];
    $correo= $_POST['email'];
    $usuario= $_POST['usuario'];
    $password= $_POST['password'];
    $idrol= 2;


    $insertar = "INSERT INTO usuario VALUES('$idusuario','$nombre', '$correo','$usuario','$password', '$idrol')";
    $resultado= mysqli_query($conexion,$insertar);

if($resultado){
    
    echo '<script type="text/javascript">
	alert("gracias por registrarse.");
	window.location.href="loginvista.php";
	</script>';
    

}
else{
     echo '<script type="text/javascript">
	alert("error al registrarse ");
	window.location.href="registro.php";
	</script>';
    
    
    
}

$asunto='Registro exitoso'; 
	$desde='vanesasantana66@gmail.com'; 
	$comentario='<p> Hola,te registraste exitosamente </p> <br>';
	$headers = "MIME-Version: 1.0\r\n";  
	$headers .= "Content-type: text/html; charset=utf8\r\n"; 
	$headers .= "From: Remitente\r\n"; 
	mail($correo,$asunto,$comentario,$headers);
?>

        