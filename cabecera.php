<?php
session_start();
if(isset($_SESSION['usuario'])!="admin"){
    header("location:login.php");// redirige a l seccion sesion 
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>ProyectoPHP</title>
</head>
<body>
    <!-- CABECERA INCLUIDA DESDE cabecera.php -->
     <div class="container">
     <a href="index.php">Inicio </a>|
    <a href="portafolio.php">Portafolio </a>|
    <a href="cerrar.php">Cerrar </a>|  
     </div>
     

     