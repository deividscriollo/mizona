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
										'description' => $row['description']
										)
							);
		}
		
	}
	if ($request->success == "save") {
		# code...
		$data = $request->data;

		$id_fac = $class->idz();		
		$id_empresa = $class->idz();
		$id_login = $class->idz();
		$id_localizacion = $class->idz();
		$id_social = $class->idz();
		$date = $class->fecha_hora();
		$email = activacion_cuenta($data->correo,$data->propietario,$id_login);
		if ($email) {
			# code...
			$resultado = $class->consulta("
											INSERT INTO empresa VALUES('"	.$id_empresa
																			."','".$data->nombre_comercial
																			."','".$data->propietario
																			."','".$data->telefono
																			."','".$data->cod_aso
																			."','".''  // estado
																			."','".$date // fecha creacion
																			."','".$date // fecha actualizacion
																			."')");
			$resultado = $class->consulta("
											INSERT INTO login VALUES('"	.$id_login
																			."','".$id_empresa
																			."','".$data->correo
																			."',md5('".$data->password
																			."'),'".'0'  // estado
																			."','".$date // fecha creacion
																			."','".$date // fecha actualizacion
																			."')");
			$resultado = $class->consulta("
											INSERT INTO redes_social VALUES('"	.$id_social
																			."','".$id_empresa
																			."','".''//facebook
																			."','".''//twitter
																			."','".''//instagram
																			."','".'0'  // estado
																			."','".$date // f creacion
																			."','".$date // f actualizacion
																			."')");
			$resultado = $class->consulta("
											INSERT INTO localizacion VALUES('"	.$id_localizacion
																			."','".$id_empresa
																			."','".''//latitude
																			."','".''//longitud
																			."','".''//calle prin
																			."','".''//calle sec
																			."','".''//num local
																			."','".''//nota
																			."','".$date // f creacion
																			."','".$date // f actualizacion
																			."')");
			if ($resultado) {
				# code...
				print json_encode(array('result' => true, 'proceso' => 'accion aceptada con exito'));
			}else{
				print json_encode(array('result' => false, 'proceso' => 'save no disponible'));
			}
		}else{
				print json_encode(array('result' => false, 'proceso' => 'envio correo'));
		}
	}
	if ($request->success == "update") {
		$data = $request->data;
		$resultado = $class->consulta("	UPDATE EMPRESA 
										SET 
											stado = '$data->description',
											nombre_comercial = '$data->nombre_comercial',
											propietario = '$data->propietario',
											telefono = '$data->telefono'
										WHERE id='$data->id_empresa'");
		if ($resultado) {
			# code...
			print json_encode(array('result' => true, 'proceso' => 'accion aceptada con exito'));
		}else{
			print json_encode(array('result' => false, 'proceso' => 'update no disponible'));
		}
	}
	if ($request->success == "activar_cuenta") {
		$data = $request->data;
		$resultado = $class->consulta("UPDATE login SET stado = '1' WHERE id='".$data->id."'");
		if ($resultado) {
			# code...
			print json_encode(array('result' => true, 'proceso' => 'accion aceptada con exito'));
		}else{
			print json_encode(array('result' => false, 'proceso' => 'update no disponible'));
		}
	}
	if ($request->success == "recuperarpass") {
		$data = $request->data;
		$resultado = $class->consulta("SELECT * FROM login WHERE correo = '".$data->correo."'");
		$id = '';
		while($row = $class->fetch_array($resultado)) {
			$id = $row['id'];
		}
		$email = recuperarpass($data->correo, $id);
		if ($email) {
			# code...
			print json_encode(array('result' => true, 'proceso' => 'accion aceptada con exito'));
		}else{
			print json_encode(array('result' => false, 'proceso' => 'mail no disponible'));
		}
	}
	if ($request->success == "newpass") {
		$data = $request->data;
		$resultado = $class->consulta("	UPDATE login 
										SET pass = md5('".$data->password."') 
										WHERE id ='".$data->id."'");
		if ($resultado) {
			# code...
			print json_encode(array('result' => true, 'proceso' => 'accion aceptada con exito'));
		}else{
			print json_encode(array('result' => false, 'proceso' => 'update no disponible'));
		}
	}
