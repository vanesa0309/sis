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

if(isset($_REQUEST['btn_guardar'])){

$idbautizo=rand(100,200);
$nombre=ucwords($_POST['nombre']);
$apellido=ucwords($_POST['apellido']);
$nombmad=ucwords($_POST['nomad']);
$apellidosmadre=ucwords($_POST['apemad']);
$nombpadre=ucwords($_POST['nompad']);
$apellidospadre=ucwords($_POST['apepad']);
$telefono=$_POST['telefono'];
$fechabautizo=$_POST['fechabautizo'];
$sql = "INSERT into bautizos values('$idbautizo','$nombre','$apellido','$nombmad','$apellidosmadre','$nombpadre','$apellidospadre','$telefono','$fechabautizo')";
$ejecutar=mysqli_query($conexion,$sql);
        
    if($ejecutar)
    {
        header("location:bautizos.php");
    }
}




if(isset($_REQUEST['btn_actualizar'])){


$idbautizo=$_POST['idbautizo'];
$nombre=ucwords($_POST['nombre']);
$apellido=ucwords($_POST['apellido']);
$nombmad=ucwords($_POST['nommad']);
$apellidosmadre=ucwords($_POST['apemad']);
$nombpadre=ucwords($_POST['nompad']);
$apellidospadre=ucwords($_POST['apepad']);
$telefono=$_POST['telefono'];
$fechabautizo=$_POST['fechabautizo'];
    
    
$sql="UPDATE bautizos SET nombre='$nombre',apellido='$apellido',nombmadre='$nombmad',apellidosmadre='$apellidosmadre',nombpadre='$nombpadre',apellidospadre='$apellidospadre',telefono='$telefono',fechabautizo='$fechabautizo' WHERE idbautizo='$idbautizo'";

$ejecutar=mysqli_query($conexion,$sql);
   
    
    
    if($ejecutar)
    {
        header("location:bautizos.php");
    }
}


if(isset($_REQUEST['btn_eliminar'])){
    $idbautizo=$_POST['id'];
$sql="DELETE FROM bautizos WHERE idbautizo='$idbautizo'";

$ejecutar=mysqli_query($conexion,$sql);
   if($ejecutar)
    {
        header("location:bautizos.php");
    }
}

?>