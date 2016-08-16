<?php 
	
	if(!isset($_SESSION)){
        session_start();        
    }

	include_once('../../class.php');
	include_once('../../email.php');
	

	$class = new constante();

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	if ($request->success == "get") {
		# code...
		$data = $request->data;
		$resultado = $class->consulta	("	
										SELECT * 
										FROM localizacion 
										WHERE id_empresa = '$data->empresa_id'
										");
		while($row = $class->fetch_array($resultado)) {
			print json_encode(
								array(
										'id' => $row['id'],
										'latitude' => $row['latitude'],
										'longitude' => $row['longitude'],
										'calle_principal' => $row['calle_principal'],
										'calle_secundaria' => $row['calle_secundaria'],
										'num_local' => $row['num_local'],
										'nota' => $row['nota'],
										'map' => $row['map']
										)
							);
		}
		
	}
	if ($request->success == "update") {
		$data = $request->data;
		$date = $class->fecha_hora();
		$resultado = $class->consulta("	UPDATE localizacion 
										SET 
											latitude = '$data->latitude',
											longitude = '$data->longitude',
											calle_principal = '$data->calle_principal',
											calle_secundaria = '$data->calle_secundaria',
											num_local = '$data->num_local',
											nota = '$data->nota',
											map = '$data->map',
											update_at = '$date'
										WHERE id='$data->id'");
		if ($resultado) {
			# code...
			print json_encode(array('result' => true, 'proceso' => 'accion aceptada con exito'));
		}else{
			print json_encode(array('result' => false, 'proceso' => 'update no disponible'));
		}
	}