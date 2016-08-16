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
										FROM REDES_SOCIAL 
										WHERE id_empresa = '$data->empresa_id'
										");
		while($row = $class->fetch_array($resultado)) {
			print json_encode(
								array(
										'id' => $row['id'],
										'facebook' => $row['facebook'],
										'twitter' => $row['twitter'],
										'instagram' => $row['instagram']
										)
							);
		}
		
	}
	if ($request->success == "update") {
		$data = $request->data;
		$date = $class->fecha_hora();
		$resultado = $class->consulta("	UPDATE REDES_SOCIAL 
										SET 
											facebook = '$data->facebook',
											twitter = '$data->twitter',
											instagram = '$data->instagram',
											update_at = '$date'
										WHERE id='$data->id'");
		if ($resultado) {
			# code...
			print json_encode(array('result' => true, 'proceso' => 'accion aceptada con exito'));
		}else{
			print json_encode(array('result' => false, 'proceso' => 'update no disponible'));
		}
	}