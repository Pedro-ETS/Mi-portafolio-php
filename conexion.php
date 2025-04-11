<?php
class conexion{
    private $servidor="localhost";//sql302.infinityfree.com
    private $usuario="root";//if0_38632351
    private $contrasenia="";//xc8Ud6PgMGrvVT
    private $conexion;   //if0_38632351_

    public function __construct(){
try{
  $this->conexion= new PDO("mysql:host=$this->servidor;dbname=album",$this->usuario,$this->contrasenia);
  $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
   return "falla de conexion".$e;
}
    }

    public function ejecutar($sql){
      $this->conexion->exec($sql);
      return $this->conexion->lastInsertId();
    }
      
  public function consultar($sql){
   $sentencia=$this->conexion->prepare($sql);
   $sentencia->execute();
   return $sentencia->fetchAll();

  }
    
}
?>