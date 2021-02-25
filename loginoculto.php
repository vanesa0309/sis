<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title> 
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >

<link rel="stylesheet" href="assets/css/estilos.css" />
	

</head>  
<body>
<form action="logadmin.php" method="post" class="formulario">
<h1>Login Admnistrador</h1>
     <div class="contenedor">
     <div class="input-contenedor"><i class="fas fa-envelope icon"></i>
<input type="text" name="usuario" placeholder="Nombre" required="required">
        </div>
          
         <div class="input-contenedor">
        <i class="fas fa-key icon"></i>
        <input type="password" name="password" placeholder="Contraseña" required="required">
         </div>
        <div class="alert"><?php echo isset($alert) ? $alert :'';?></div>
        <input type="submit" value="INGRESAR" class="button" >
    
     </div>
    </form>
</body>
</html>
