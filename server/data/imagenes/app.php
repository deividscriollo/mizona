<?php 
	
	if(!isset($_SESSION)){
        session_start();        
    }

	include_once('../../class.php');
	include_once('../../email.php');
	

	$class = new constante();

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	// print$fname = $_POST["username"];//descripcion
	// print$fname = $_POST["data"];
	if($_POST["mode"]=='logo'){
        $nombre_tmp = $_FILES["file"]["tmp_name"];
        $tipo = $_FILES["file"]["type"];
        $tipo = explode("/",$tipo);
        // basename() puede evitar ataques de denegació del sistema de ficheros;
        // podría ser apropiado más validación/saneamiento del nombre de fichero
        $id_img = $class->idz();
        $descripcion = $_POST["username"];
        $id_empresa = $_POST["data"]['empresa_id'];
        $archivo = "img/$id_img.$tipo[1]";
        $img = move_uploaded_file($nombre_tmp, $archivo);
        if ($img) {
        	# code...
        	$id = $class->idz();
			$date = $class->fecha_hora();
        	$resultado = $class->consulta("
											INSERT INTO imagenes VALUES('"	.$id
																			."','".$id_empresa
																			."','".$descripcion
																			."','".$archivo
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
        	print json_encode(array('result' => false, 'proceso' => 'img no disponible'));
        }
	}
	if($_POST["mode"]=='gallery'){
        $nombre_tmp = $_FILES["file2"]["tmp_name"];
        $tipo = $_FILES["file2"]["type"];
        $tipo = explode("/",$tipo);
        // basename() puede evitar ataques de denegació del sistema de ficheros;
        // podría ser apropiado más validación/saneamiento del nombre de fichero
        $id_img = $class->idz();
        $descripcion = $_POST["description"];
        $id_empresa = $_POST["data"]['empresa_id'];
        $archivo = "img/$id_img.$tipo[1]";
        $img = move_uploaded_file($nombre_tmp, $archivo);
        if ($img) {
        	# code...
        	$id = $class->idz();
			$date = $class->fecha_hora();
        	$resultado = $class->consulta("
											INSERT INTO galeria VALUES('"	.$id
																			."','".$id_empresa
																			."','".$descripcion
																			."','".$archivo
																			."','".'1'
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
        	print json_encode(array('result' => false, 'proceso' => 'img no disponible'));
        }
	}