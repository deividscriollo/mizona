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
										SELECT E.stado as description,* 
										FROM empresa E, login L 
										WHERE E.id = L.id_empresa 
										and E.id = '".$data->empresa_id."'
										");
		while($row = $class->fetch_array($resultado)) {
			print json_encode(
								array(
										'id' => $row['id'],
										'nombre_comercial' => $row['nombre_comercial'],
										'propietario' => $row['propietario'],
										'correo' => $row['correo'], 
										'telefono' => $row['telefono'],
										'telefono1' => $row['telefono1'],
										'cod_aso' => $row['cod_aso'],
										'update_at' => $row['update_at'],
										'description' => $row['description']
										)
							);
		}
		
	}
	if ($request->success == "save") {
		# code...
		$data = $request->data;
		$date = $class->fecha_hora();
		$resultado = 1;
		existencia_($data->id_empresa);
		for ($i=0; $i < count($data->selectedToppings); $i++) { 
			# code...
			$id = $class->idz();
			# code...
			$resultado = $class->consulta("
									INSERT INTO empresa_categoria VALUES('"	.$id
																	."','".$data->id_empresa
																	."','".$data->selectedToppings[$i]
																	."','".'1' // estado
																	."','".$date // fecha creacion
																	."','".$date // fecha actualizacion
																	."')");
		
		}		
		if ($resultado) {
			# code...
			print json_encode(array('result' => 'ok', 'proceso' => 'accion aceptada con exito'));
		}else{
			print json_encode(array('result' => 'error', 'proceso' => 'save no disponible'));
		}
	}
	if ($request->success == "update") {
		$data = $request->data;
		$date_update = $class->fecha_hora();
		$resultado = $class->consulta("	UPDATE EMPRESA 
										SET 
											stado = '$data->description',
											nombre_comercial = '$data->nombre_comercial',
											propietario = '$data->propietario',
											telefono = '$data->telefono',
											telefono1 = '$data->telefono1',
											update_at = '$date_update'
										WHERE id='$data->id_empresa'");
		if ($resultado) {
			# code...
			print json_encode(array('result' => true, 'proceso' => 'accion aceptada con exito'));
		}else{
			print json_encode(array('result' => false, 'proceso' => 'update no disponible'));
		}
	}


	function existencia_($id_empresa){ // --- presede la existencia de un valor antes de guardarlo
		$class = new constante();
		$class->consulta("	UPDATE empresa_categoria 
							SET 
								stado = '0'
							WHERE id_empresa = '$id_empresa'");
	}
	

	
