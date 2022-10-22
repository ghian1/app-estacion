<?php 
include "credenciales.php";


class DataBase 
{
	
function conectar(){

	$this->db= new mysqli (HOST,USER,PASS,DB,PORT);

   	if ($this->db->connect_errno) {

    	die('Connect Error: ' . $mysqli->connect_error);
	}
}




function consulta($consulta){

	$this->conectar();

	$resultado=$this->db->query($consulta);
    
    if ($this->db->error) {
    	die('Connect Error: ' . $this->db->error);
	}else{
		return $resultado;
	}

}
}

?>