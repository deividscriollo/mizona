<?php 
	
	if(!isset($_SESSION)){
        session_start();        
    }

	include_once('../../class.php');

	$class = new constante();

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	if ($request->save == "new") {
		# code...
		$data = $request->data;

		$id_fac = $class->idz();		
		$id = $class->idz();		
		$date = $class->fecha_hora();		
		$resultado = $class->consulta("
										INSERT INTO categoria VALUES('"	.$id
																		."','".$data->categoria
																		."','".$data->descripcion
																		."','".'1' // estado
																		."','".$date // fecha creacion
																		."','".$date // fecha actualizacion
																		."')");
		if ($resultado) {
			# code...
			print json_encode(array('result' => 'ok', 'proceso' => 'accion aceptada con exito'));
		}else{
			print json_encode(array('result' => 'error', 'proceso' => 'save no disponible'));
		}
	}
	