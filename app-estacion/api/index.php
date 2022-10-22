<?php 
header("Content-Type: application/json");
include "../models/estacion.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

	if(isset($_GET["mode"])){

		if(($_GET["mode"])=="list-stations"){
			$estacion= new Estacion;
			echo json_encode($estacion->listar());

		}else{

			echo json_encode(array("errno"=>400,"error"=>"No se encontro el modo especificado"));

		}

	}else{

		if(isset($_GET["chipid"]) && !isset($_GET["limit"])){
			$estacion= new Estacion;
			$resultado=$estacion->buscar($_GET["chipid"]);

			if (count($resultado) == 0) {

    			echo json_encode(array("errno"=>400,"error"=>"No se encontro un chipid"));

			}else{

				echo json_encode($estacion->buscar($_GET["chipid"]));
		
			}


		}



		if(isset($_GET["chipid"]) && isset($_GET["limit"])){

			if($_GET["limit"] != ""){
				$estacion= new Estacion;
				echo json_encode($estacion->info($_GET["chipid"],$_GET["limit"]));
			}else{

				echo json_encode(array("errno"=>400,"error"=>"No se especifico un limite"));

			}
		}
	}
}
  



 ?>