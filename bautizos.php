<?php
    include('conexion.php'); 

    @$idbat=$_GET['id'];
    $consulta="SELECT * FROM bautizos WHERE idbautizo='$idbat'";
    $ejecutar=mysqli_query($conexion,$consulta);
    while($row=mysqli_fetch_array($ejecutar)){

        $idbau=$row[0];
        $nom=$row[1];
        $ape=$row[2];
        $nomad=$row[3];
        $apmad=$row[4];
        $nopad=$row[5];
        $apad=$row[6];
        $tel=$row[7];
        $fechbaut=$row[8];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />

        <title>Bautizos</title>
        <script src="librerias/jquery-3.4.0.min.js"></script>
        <script src="librerias/js/materialize.min.js"></script>
        <link rel="stylesheet" href="librerias/css/materialize.min.css">
        
        <script>
            $(document).ready(function()
                             {
               idd=$("#idbautizos").val();
                if(idd>0){
                    $("#frm_registrar").hide();
                }
                
                if(idd==""){
                     $("#frm_actualizar").hide();
                    
                }
            });  
        </script>
        
    </head>
    <body>
    <input type="hidden" name="idbautizos" id="idbautizos" value="<?php echo $idbat; ?>">
      
    <div class="row">
        <div class="col l4 offset-l1 center-align" style="position:absolute; top:5%;" id="frm_registrar">
            <h5 class="blue-text">REGISTRAR BAUTIZO</h5><br><br>
            <form action="control1.php" method="post" accept-charset="utf-8">            
                <div class="input-field">    
                    <input type="text" name="nombre" value="" placeholder="">
                    <label for="txtnombre">Nombre Niño</label>
                </div>
                <div class="input-field ">
                    <input type="text" name="apellido" value="" placeholder="">
                    <label for="txtapellido">Apellidos Niño</label><br>
                </div>                
                <div class="input-field">
                    <input type="text" name="nomad" value="" placeholder="">
                    <label for="txtnom">Nombre Madre</label>
                </div>                
                <div class="input-field ">
                    <input type="text" name="apemad" value="" placeholder="">
                    <label for="txtape">Apellidos Madre</label><br>
                </div>                
                <div class="input-field ">
                    <input type="text" name="nompad" value="" placeholder="">
                    <label for="txtape">Nombre Padre</label><br>
                </div>
                <div class="input-field ">
                    <input type="text" name="apepad" value="" placeholder="">
                    <label for="txtape">Apellidos Padre</label><br>
                </div>
                <div class="input-field "> 
                    <input type="text" name="telefono" value="" placeholder="" pattern="[0-9]{10}">
                    <label for="txtfecha"> Telefóno <small>(10 dígitos)</small>:</label>
                </div>
                <div class="input-field "> 
                    <input type="date" name="fechabautizo" value="" placeholder="" id="date">
                    <label for="txtfecha"> Fecha Bautizo:</label>
                </div>
                <div class="input-field">
                    <button type="submit" class="blue btn-small" name="btn_guardar">Guardar</button>                
                </div>
            </form>
        </div>    
        <div class="col l6 offset-l5" style="position:absolute; top:5%;">
            <table>
                <h5 class="blue-text">LISTADO DE BAUTIZOS</h5><br><br>
                <thead>
                    <tr>
                        <td style="visibility: hidden">Id</td>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Nombre Madre</th>
                        <th>Apellidos Madre</th>
                        <th>Nombre Padre</th>
                        <th>Apellidos Padre</th>
                        <th>Telefono</th>
                        <th>Fecha Bautizo</th>
                        <th></th>
                    </tr>                    
                </thead>
                
                <?php
                    include('conexion.php');        
                    $sql="SELECT * FROM bautizos";
                    $ejecutar=mysqli_query($conexion,$sql);
                    while($fila=mysqli_fetch_array($ejecutar)){
                        ?>
                            <tbody>
                                <tr>        
                                    <td style="visibility: hidden"><?php echo$fila[0];?></td>
                                    <th><?php echo$fila[1];?></th>
                                    <th><?php echo$fila[2];?></th>
                                    <th><?php echo$fila[3];?></th>
                                    <th><?php echo$fila[4];?></th>
                                    <th><?php echo$fila[5];?></th>
                                    <th><?php echo$fila[6];?></th>
                                    <th><?php echo$fila[7];?></th>
                                    <th><?php echo$fila[8];?></th>
                                    <td><a href="bautizos.php?id=<?php echo $fila[0]; ?>" class="btn blue btn-small">Editar</a> </td>
                                </tr>
                            </tbody>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
   
    <div class="row">
        <div class="col l4 offset-l1 center-align" style="position:absolute; top:5%;" id="frm_actualizar">
            <h5 class="blue-text">EDITAR INFORMACIÓN</h5><br><br>
            <form action="control1.php" method="post" accept-charset="utf-8">
                <div class="input-field">
                    
                    <input type="hidden" name="id" value="<?php echo $idbau; ?>" placeholder="">
                </div>
                <div class="input-field">
                    <input type="text" name="nombre" value="<?php echo $nom; ?>" placeholder="">
                    <label for="txtnombre">Nombre Niño</label>
                </div>
                <div class="input-field ">
                    <input type="text" name="apellido" value="<?php echo $ape; ?>" placeholder="">
                    <label for="txtapellido">Apellidos Niño</label><br>
                </div>
                <div class="input-field">
                    <input type="text" name="nomad" value="<?php echo $nomad; ?>" placeholder="">
                    <label for="txtnom">Nombre Madre</label>
                </div>
                <div class="input-field ">
                    <input type="text" name="apemad" value="<?php echo $apmad; ?>" placeholder="">
                    <label for="txtape">Apellidos Madre</label><br>
                </div>
                <div class="input-field ">
                    <input type="text" name="nompad" value="<?php echo $nopad; ?>" placeholder="">
                    <label for="txtape">Nombre Padre</label><br>
                </div>
                <div class="input-field ">
                    <input type="text" name="apepad" value="<?php echo $apad; ?>" placeholder="">
                    <label for="txtape">Apellidos Padre</label><br>
                </div>
                <div class="input-field "> 
                    <input type="text" name="telefono" value="<?php echo $tel; ?>" placeholder="" pattern="[0-9]{10}">
                    <label for="txtfecha"> Telefóno <small>(10 dígitos)</small>:</label>
                </div>
                <div class="input-field "> 
                    <input type="date" name="fechabautizo" value="<?php echo $fechbaut; ?>" placeholder="" id="date">
                    <label for="txtfecha"> Fecha Bautizo:</label>
                </div>
                    
                <div class="input-field col l3">
                    <button type="submit" class="green btn-small" name="btn_actualizar">Actualizar</button>                
                </div>
                <div class="input-field col l3 ">
                    <button type="submit" class="red btn-small" name="btn_eliminar">Eliminar</button>                
                </div>
                <div class="input-field col l3">
                    <a href="bautizos.php" type="submit" class="yellow btn-small" name="btn_regresar">Regresar</a>                
                </div>
            </form>
        </div> 
    </div>
    
    <script type="text/javascript">
        var date = document.getElementById('date');

        const x = new Date();

        var day = x.getDate();
        var month = x.getMonth() + 1;
        if (month >= 1 && month <= 9 ) {
            month = '0' + month;
        }
        var year = x.getFullYear();
        const today = year + '-' + month + '-' + day;


        $(document).ready(function () {
            $(date).prop( "min", today );
        });
    </script>
    </body>
</html>
    
    