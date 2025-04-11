<?php

use LDAP\Result;

 include("cabecera.php"); ?>
<?php include("conexion.php");?>
<?php
if($_POST){
$nombre= $_POST['nombre'];
$descripcion= $_POST['descripcion'];
$fecha=new DateTime();
 $imagen=$fecha->getTimestamp()."_".$_FILES['archivo']['name'];
$imagen_temporal=$_FILES['archivo']['tmp_name'];

move_uploaded_file($imagen_temporal,"imagenes/".$imagen);

$objConexion= new conexion();
$sql="INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `Description`) VALUES (NULL, '$nombre', '$imagen', '$descripcion');";
$objConexion->ejecutar($sql);
header("location:portafolio.php");
}

if($_GET){
    $id=$_GET['borrar'];

    $objConexion= new conexion();
    $imagen=$objConexion->consultar("SELECT imagen From `proyectos` where id=".$id);
    unlink("imagenes/".$imagen[0]['imagen']);
    
    $sql= "DELETE FROM proyectos WHERE `proyectos`.`id` = ".$_GET['borrar'];
    $objConexion->ejecutar($sql);


    }

$objConexion= new conexion();
  $proyectos=$objConexion->consultar("SELECT * FROM `proyectos`");

?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Datos del proyecto</div>

                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                        Nombre del proyecto: <input type="text" class="form-control" name="nombre" id="" required>
                        <br />
                        Imagen del proyecto: <input type="file" class="form-control" name="archivo" id="" required>
                        <br />
                       Descripcion:
                            <textarea class="form-control" name="descripcion"  rows="3" required></textarea>
                        <br/>
                        
                        <input class="btn btn-success" type="submit" value="Enviar proyecto">
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-6">

            <div class="table-responsive">
                <table
                    class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id </th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Imagen</th> 
                            <th scope="col">Descripcion</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($proyectos as $proyecto) {  ?>
                        <tr class="">
                            <td><?php echo $proyecto['id'] ?> </td>
                            <td><?php echo $proyecto['nombre'] ?> </td>
                            
                            <td>
                                <img width="100"  src="imagenes/<?php echo $proyecto['imagen'];?>" alt="" srcset="">
                            
                            </td>
                            <td><?php echo $proyecto['Description'] ?> </td>
                            <td><a
                                id=""
                                class="btn btn-primary"|    
                                href="?borrar=<?php echo $proyecto['id'] ?>">Eliminar</a></td>
                                
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
