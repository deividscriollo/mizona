<?php 
	
	if(!isset($_SESSION)){
        session_start();        
    }

	include_once('../../class.php');
	include_once('../../email.php');
	

	$class = new constante();

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	if ($request->success == "iniciar") {
		$data = $request->data;
		$resultado = $class->consulta("
										SELECT E.id as empresa_id, * 
										FROM empresa E, login L 
										WHERE 	
												E.id = L.id_empresa AND
												L.correo = '".$data->correo."' 
												AND 
												L.pass = md5('".$data->password."')");
		$id = 0;
		while($row = $class->fetch_array($resultado)) {
			$data = array(	
							
							'empresa_id' => $row['empresa_id'],
							'correo' => $row['correo'],
							'nombre_comercial' => $row['nombre_comercial'],
							'propietario' => $row['propietario'],
							'telefono' => $row['telefono'],
							'cod_aso' => $row['cod_aso']
							);
			$id = 1;
		}
		if ($id==1) {
			# code...
			print json_encode(array('result' => true, 'proceso' => 'accion aceptada con exito', 'data' => $data));
		}else{
			print json_encode(array('result' => false, 'proceso' => 'access no disponible'));
		}
	}