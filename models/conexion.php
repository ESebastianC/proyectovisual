<?php
class conexion{
    public function conectar(){
        $servername="bhlut4j4kuhxsivd4hrp-mysql.services.clever-cloud.com";
        $username="uvhyhfvxsavrkktw";
        $password="2w5zMYBaRxgZ5aeDVXTw";
        $dbname="bhlut4j4kuhxsivd4hrp";
        $conn=mysqli_connect($servername,$username,$password,$dbname);
        if(!$conn){
            echo("Error en la conexion".mysqli_connect_error());
        }else{
            return $conn;
        }
     
    }

}

?>