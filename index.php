<?php include_once("cabecera.php");?>
<?php include("conexion.php");?>
 <?php
$objConexion= new conexion();
  $proyectos=$objConexion->consultar("SELECT * FROM `proyectos`");

?>
    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">welcome</h1>
            <p class="lead">This is a private portafolio</p>  
             <hr class="my-2">
             <p>More information</p>    
            </div>
        </div>


    <div class="container mt-4">
    <div class="row">
        <div class="col-12"> <!-- Ocupa todo el ancho en una sola columna -->
            <?php foreach ($proyectos as $proyecto) { ?>
                <div class="card mb-4 shadow-sm">
                    <img src="imagenes/<?php echo $proyecto['imagen']; ?>" 
                         class="card-img-top img-fluid" 
                         alt="Imagen del proyecto"
                         style="max-height: 1000px; max-width: 80%; display: block; margin: 0 auto;  object-fit: cover; "> 
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $proyecto['nombre']; ?></h5>
                        <p class="card-text"><?php echo $proyecto['Description']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
    <?php include("pie.php");?>
