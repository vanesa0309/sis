<?php
include('conexion.php'); 

    @$idmat=$_GET['id'];
    $consulta="SELECT * FROM matrimonios WHERE idmatriminio='$idmat'";
    $ejecutar=mysqli_query($conexion,$consulta);
    while($row=mysqli_fetch_array($ejecutar)){
        $idm=$row[0];
        $nomn=$row[1];
        $apenovia=$row[2];
        $nomno=$row[3];
        $apenovio=$row[4];
        $fechbod=$row[5];
    }
        
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />

        <title>Matrimonios</title>
        <script src="librerias/jquery-3.4.0.min.js"></script>
        <script src="librerias/js/materialize.min.js"></script>
        <link rel="stylesheet" href="librerias/css/materialize.min.css">
        
        <script>
            $(document).ready(function()
                             {
               idd=$("#idmatrimonios").val();
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
        <input type="hidden" name="idmatrimonios" id="idmatrimonios" value="<?php echo $idmat; ?>">
          
        <div class="row">
            <div class="col s4 offset-s1 center-align" style="position:absolute; top:5%;" id="frm_registrar">
                <h5 class="blue-text">REGISTRAR MATRIMONIO</h5><br><br>
                <form action="control.php" method="post" accept-charset="utf-8">
                    <div class="input-field">
                        <input type="text" name="txtnombre" value="" placeholder="">
                        <label for="txtnombre">Nombre novia</label>
                    </div>
                    <div class="input-field ">
                        <input type="text" name="txtapellido" value="" placeholder="">
                        <label for="txtapellido">Apellidos novia</label><br>
                    </div>
                    <div class="input-field">
                        <input type="text" name="txtnom" value="" placeholder="">
                        <label for="txtnom">Nombre novio</label>
                    </div>
                    
                    <div class="input-field ">
                        <input type="text" name="txtape" value="" placeholder="">
                        <label for="txtape">Apellidos novio</label><br>
                    </div>
                    <div class="input-field "> 
                        <input type="date" name="txtfecha" value="" placeholder="" id="date">
                        <label for="txtfecha"> Fecha Boda</label>
                    </div>
                    <div class="input-field">
                        <button type="submit" class="blue btn-small" name="btn_guardar">Guardar</button>                
                    </div>
                </form>
            </div>
            <div class="col s6 offset-s5 center-align" style="position:absolute; top:5%;">
                <table>
                    <h5 class="blue-text">MATRIMONIOS REGISTRADOS</h5><br><br>
                    <thead>
                        <tr>
                            <td style="visibility: hidden">Id</td>
                        <th>Nombre Femenino</th>
                        <th>Apellido Femenino</th>
                        <th>Nombre Masculino</th>
                        <th>Apellido Masculino</th>
                        <th>Fecha Boda</th>
                        <th></th>
                        </tr>
                    </thead>
                    
                    <?php
                        include('conexion.php');     
                        $sql="SELECT * FROM matrimonios";
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
                                        <td>
                                            <a href="matrimonios.php?id=<?php echo $fila[0]; ?>" class="btn blue btn-small">Editar</a> 
                                        </td>
                                    </tr>
                                </tbody>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
       
        <div class="row">
            <div class="col s4 offset-s1" style="position:absolute; top:5%;" id="frm_actualizar">
                <h5 class="blue-text">EDITAR INFORMACIÓN</h5><br><br>
                <form action="control.php" method="POST" accept-charset="utf-8">
                    <div class="input-field">
                        <input type="hidden" name="id" value="<?php echo $idm; ?>" placeholder="">
                    </div>
                    <div class="input-field">
                        <input type="text" name="txtnombre" value="<?php echo $nomn; ?>" placeholder="">
                        <label for="txtnombre">Nombre Femenino</label>
                    </div>
                    <div class="input-field ">
                        <input type="text" name="txtapellido" value="<?php echo $apenovia; ?>" placeholder="">
                        <label for="txtapellido">Apellido Femenino</label><br>
                    </div>
                    <div class="input-field">
                        <input type="text" name="txtnom" value="<?php echo $nomno; ?>" placeholder="">
                        <label for="txtnom">Nombre Masculino</label>
                    </div>
                    <div class="input-field ">
                        <input type="text" name="txtape" value="<?php echo $apenovio; ?>" placeholder="">
                        <label for="txtape">Apellido Masculino</label><br>
                    </div>
                    <div class="input-field "> 
                        <input type="date" name="txtfecha" value="<?php echo $fechbod; ?>" placeholder="" id="date-update">
                        <label for="txtfecha"> Fecha Boda:</label>
                    </div>
                    <div class="input-field col ">
                        <button type="submit" class="green btn-small" name="btn_actualizar">Actualizar</button>                
                    </div>
                    <div class="input-field col l3 ">
                        <button type="submit" class="red btn-small" name="btn_eliminar">Eliminar</button>                
                    </div>
                    <div class="input-field col l3">
                        <a href="matrimonios.php" type="submit" class="yellow btn-small" name="btn_regresar">Regresar</a>                
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