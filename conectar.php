<?php


class Conexion{

    private $Servidor;
    private $UsuarioMySql;
    private $ContrasenaMySql;
    private $BaseDeDatos;
    public $Conectar;

public function Conexion(){

$host="localhost";
$uname="root";
$pass="";
$database = "infonica";

        $this->Servidor = $host;
        $this->UsuarioMySql = $uname;
        $this->ContrasenaMySql = $pass;
        $this->BaseDeDatos = $database;
        $this->ConectarMySql();


    }

    public function ConectarMySql(){
        $this->Conectar = mysqli_connect($this->Servidor, $this->UsuarioMySql, $this->ContrasenaMySql, $this->BaseDeDatos) or die (mysqli_connect_errno());


     // return $this->Conectar;
    }

/*
    public function CerrarConexion(){
        $Conectar->close();
    }*/
}


?>
