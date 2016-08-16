<?php 
	
	if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
 
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 
        exit(0);
    }
	
	if(!isset($_SESSION)){
        session_start();        
    }

	include_once('../../class.php');
	include_once('../../email.php');
	

	$class = new constante();

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	if ($request->success == "getempresas") {
		# code...
		$data = $request->data;
		$resultado = $class->consulta	("	
										SELECT E.stado as description, E.id as id_tienda,* 
										FROM empresa E, login L 
										WHERE E.id = L.id_empresa 
										");
		$data = array();
		while($row = $class->fetch_array($resultado)) {
			// print_r(json_encode(array('asa' => 'asas')));
				$data[] = array(
										'id' => $row['id_tienda'],
										'nombre_comercial' => $row['nombre_comercial'],
										'propietario' => $row['propietario'],
										'correo' => $row['correo'], 
										'telefono' => $row['telefono'],
										'description' => $row['description']
										);
		}
		print_r(json_encode($data));
	}

	if ($request->success == "get_tienda") {
		# code...
		$data = $request->data;
		$resultado = $class->consulta	("	
										SELECT * 
										FROM empresa 
										WHERE id = '".$data->id."'
										");
		$data = array();
		while($row = $class->fetch_array($resultado)) {
			// print_r(json_encode(array('asa' => 'asas')));
				$data[] = array(
										'nombre_comercial' => $row['nombre_comercial'],
										'propietario' => $row['propietario'],
										'telefono' => $row['telefono']
										);
		}
		print_r(json_encode($data));
	}
	if ($request->success == "get_tienda_localizacion") {
		# code...
		$data = $request->data;
		$resultado = $class->consulta	("	
										SELECT * 
										FROM localizacion
										WHERE id_empresa = '".$data->id."'
										");
		$data = array();
		while($row = $class->fetch_array($resultado)) {
			// print_r(json_encode(array('asa' => 'asas')));
				$data[] = array(
										'id' => $row['id'],
										'latitude' => $row['latitude'],
										'longitude' => $row['longitude'],
										'calle_principal' => $row['calle_principal'],
										'calle_secundaria' => $row['calle_secundaria'],
										'num_local' => $row['num_local'],
										'nota' => $row['nota']
										);
		}
		print_r(json_encode($data));
	}
	if ($request->success == "get_tienda_logo") {
		# code...
		$data = $request->data;
		$resultado = $class->consulta	("	
										SELECT * 
										FROM imagenes
										WHERE id_empresa = '".$data->id."'
										");
		$data;
		while($row = $class->fetch_array($resultado)) {
			// print_r(json_encode(array('asa' => 'asas')));
				$data = array(
										'id' => $row['id'],
										'descripcion' => $row['descripcion'],
										'linkimg' => $row['linkimg']
										);
		}
		print_r(json_encode($data));
	}
	if ($request->success == "get_tienda_galeria") {
		# code...
		$data = $request->data;
		$resultado = $class->consulta	("	
										SELECT * 
										FROM galeria
										WHERE id_empresa = '".$data->id."'
										");
		$data = array();
		while($row = $class->fetch_array($resultado)) {
			// print_r(json_encode(array('asa' => 'asas')));
				$data[] = array(
										'id' => $row['id'],
										'descripcion' => $row['descripcion'],
										'linkimg' => $row['linkimg']
										);
		}
		print_r(json_encode($data));
	}
	


	