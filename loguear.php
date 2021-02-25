<?php  
$server ="localhost";
$usuario="root";
$clave="";
$bd="u125755129_institucion";

$conexion = new mysqli($server,$usuario,$clave,$bd);
$conexion -> set_charset("uft-8");
if ($conexion) { 
	echo "";
}else{
	echo "Base de datos no existe";
}
session_start(); //Indica que se hará uso de una sesión
$usuario=$_POST['usuario']; // Variable que almacena el correo obtenido del formulario de inicio de sesión
$password=$_POST['password']; // Variable que almacena la contraseña obtenida del formulario de inico de sesión
$q = "SELECT COUNT(*) as contar from usuario
WHERE idrol='2' AND usuario = '$usuario' AND password = '$password' "; // Consulta a la tabla administrador de la base de datos
$consulta = mysqli_query($conexion,$q); // Variable que almacena la variable de conexión y la consulta
$array = mysqli_fetch_array($consulta); // Variable que almacena la variable consulta
if ($array['contar']>0) { // Condición que indica si encuentra los datos ingresador en el formulario
	 // y si coinciden con la base de datos entonces se creará una variable de sesión
	$_SESSION['username'] = $usuario; // Variable de sesión que almacena el correo del administrador
	echo '<script type="text/javascript">
        alert("Bienvenido");
        window.location.href="usu.php";
        </script>'; // Alerta de bienvenida
}else{
	echo '<script type="text/javascript">
        alert("Datos incorrectos");
        window.location.href="loginvista.php";
		</script>'; // Alerta de datos incorrectos 
}
?>