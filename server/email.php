<?php 
	$classcorreo='';
	$url='';
	// inclusion de librerias
	if ('localhost'==$_SERVER['SERVER_NAME']) {
		require'email-local.php';
	};
	// print 'mola2';require'classcorreoweb.php';
	if ('www.nextbook.ec'==$_SERVER['SERVER_NAME']||'nextbook.ec'==$_SERVER['SERVER_NAME']) {
		require'classcorreoweb.php';
	};
	// registro de empresa envio correo para activacion de cuenta
	function activacion_cuenta($correo,$propietario,$id){
		$email = new correo();
		$url = $email->url_();
		// print_r($email);

		// mensaje html
		$html='
				<!doctype html>
				<html xmlns="http://www.w3.org/1999/xhtml">

					<head>
					    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
					    <meta name="viewport" content="initial-scale=1.0" />
					    <meta name="format-detection" content="telephone=no" />
					    <title></title>
					    <style type="text/css">
					        body {
					            width: 100%;
					            margin: 0;
					            padding: 0;
					            -webkit-font-smoothing: antialiased;
					        }
					        
					        @media only screen and (max-width: 600px) {
					            table[class="table-row"] {
					                float: none !important;
					                width: 98% !important;
					                padding-left: 20px !important;
					                padding-right: 20px !important;
					            }
					            table[class="table-row-fixed"] {
					                float: none !important;
					                width: 98% !important;
					            }
					            table[class="table-col"],
					            table[class="table-col-border"] {
					                float: none !important;
					                width: 100% !important;
					                padding-left: 0 !important;
					                padding-right: 0 !important;
					                table-layout: fixed;
					            }
					            td[class="table-col-td"] {
					                width: 100% !important;
					            }
					            table[class="table-col-border"] + table[class="table-col-border"] {
					                padding-top: 12px;
					                margin-top: 12px;
					                border-top: 1px solid #E8E8E8;
					            }
					            table[class="table-col"] + table[class="table-col"] {
					                margin-top: 15px;
					            }
					            td[class="table-row-td"] {
					                padding-left: 0 !important;
					                padding-right: 0 !important;
					            }
					            table[class="navbar-row"],
					            td[class="navbar-row-td"] {
					                width: 100% !important;
					            }
					            img {
					                max-width: 100% !important;
					                display: inline !important;
					            }
					            img[class="pull-right"] {
					                float: right;
					                margin-left: 11px;
					                max-width: 125px !important;
					                padding-bottom: 0 !important;
					            }
					            img[class="pull-left"] {
					                float: left;
					                margin-right: 11px;
					                max-width: 125px !important;
					                padding-bottom: 0 !important;
					            }
					            table[class="table-space"],
					            table[class="header-row"] {
					                float: none !important;
					                width: 98% !important;
					            }
					            td[class="header-row-td"] {
					                width: 100% !important;
					            }
					        }
					        
					        @media only screen and (max-width: 480px) {
					            table[class="table-row"] {
					                padding-left: 16px !important;
					                padding-right: 16px !important;
					            }
					        }
					        
					        @media only screen and (max-width: 320px) {
					            table[class="table-row"] {
					                padding-left: 12px !important;
					                padding-right: 12px !important;
					            }
					        }
					        
					        @media only screen and (max-width: 458px) {
					            td[class="table-td-wrap"] {
					                width: 100% !important;
					            }
					        }
					    </style>
					</head>

					<body style="font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;" bgcolor="#E4E6E9" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
					    <table width="100%" height="100%" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
					        <tr>
					            <td width="100%" align="center" valign="top" bgcolor="#E4E6E9" style="background-color:#E4E6E9; min-height: 200px;">
					                <table>
					                    <tr>
					                        <td class="table-td-wrap" align="center" width="458">
					                            <table class="table-space" height="18" style="height: 18px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-space-td" valign="middle" height="18" style="height: 18px; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" align="left">&nbsp;</td>
					                                    </tr>
					                                </tbody>
					                            </table>
					                            <table class="table-space" height="8" style="height: 8px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-space-td" valign="middle" height="8" style="height: 8px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td>
					                                    </tr>
					                                </tbody>
					                            </table>

					                            <table class="table-row" width="450" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
					                                            <table class="table-col" align="left" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
					                                                <tbody>
					                                                    <tr>
					                                                        <td class="table-col-td" width="378" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; width: 378px;" valign="top" align="left">
					                                                            <table class="header-row" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
					                                                                <tbody>
					                                                                    <tr>
					                                                                        <td class="header-row-td" width="378" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 10px; padding-top: 15px;" valign="top" align="left">Gracias por registrarte!</td>
					                                                                    </tr>
					                                                                </tbody>
					                                                            </table>
					                                                            <div style="font-family: Arial, sans-serif; line-height: 20px; color: #444444; font-size: 13px;">
					                                                                <b style="color: #478fca;">Estimad@ '.$propietario.'</b>
					                                                                <b style="color: #777777;">
					        Estamos muy contentos de que te unas a nosotros Asociación Promoda
					      </b>
					                                                                <br> Por favor confirmar su registro para continuar
					                                                            </div>
					                                                        </td>
					                                                    </tr>
					                                                </tbody>
					                                            </table>
					                                        </td>
					                                    </tr>
					                                </tbody>
					                            </table>

					                            <table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td>
					                                    </tr>
					                                </tbody>
					                            </table>
					                            <table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 450px; padding-left: 16px; padding-right: 16px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="center">&nbsp;
					                                            <table bgcolor="#E8E8E8" height="0" width="100%" cellspacing="0" cellpadding="0" border="0">
					                                                <tbody>
					                                                    <tr>
					                                                        <td bgcolor="#E8E8E8" height="1" width="100%" style="height: 1px; font-size:0;" valign="top" align="left">&nbsp;</td>
					                                                    </tr>
					                                                </tbody>
					                                            </table>
					                                        </td>
					                                    </tr>
					                                </tbody>
					                            </table>
					                            <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td>
					                                    </tr>
					                                </tbody>
					                            </table>

					                            <table class="table-row" width="450" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
					                                            <table class="table-col" align="left" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
					                                                <tbody>
					                                                    <tr>
					                                                        <td class="table-col-td" width="378" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; width: 378px;" valign="top" align="left">
					                                                            <div style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; text-align: center;">
					                                                                <a href="http://'.$url.'active_count/'.$id.'" target="_blank" style="text-decoration:none; color:#4285F4">Confirmar </a>
					                                                            </div>
					                                                            <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 378px; background-color: #ffffff;" width="378" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					                                                                <tbody>
					                                                                    <tr>
					                                                                        <td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 378px; background-color: #ffffff;" width="378" bgcolor="#FFFFFF" align="left">&nbsp;</td>
					                                                                    </tr>
					                                                                </tbody>
					                                                            </table>
					                                                        </td>
					                                                    </tr>
					                                                </tbody>
					                                            </table>
					                                        </td>
					                                    </tr>
					                                </tbody>
					                            </table>

					                            <table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-space-td" valign="middle" height="6" style="height: 6px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td>
					                                    </tr>
					                                </tbody>
					                            </table>

					                            <table class="table-row-fixed" width="450" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-row-fixed-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 1px; padding-right: 1px;" valign="top" align="left">
					                                            <table class="table-col" align="left" width="448" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
					                                                <tbody>
					                                                    <tr>
					                                                        <td class="table-col-td" width="448" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
					                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
					                                                                <tbody>
					                                                                    <tr>
					                                                                        <td width="100%" align="center" bgcolor="#f5f5f5" style="font-family: Arial, sans-serif; line-height: 24px; color: #bbbbbb; font-size: 13px; font-weight: normal; text-align: center; padding: 9px; border-width: 1px 0px 0px; border-style: solid; border-color: #e3e3e3; background-color: #f5f5f5;" valign="top">
					                                                                            <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;">promoda &copy; 2016, por david criollo</a>
					                                                                            <br>
					                                                                            <a href="#" style="color: #478fca; text-decoration: none; background-color: transparent;">twitter</a> .
					                                                                            <a href="#" style="color: #5b7a91; text-decoration: none; background-color: transparent;">facebook</a> .
					                                                                            <a href="#" style="color: #dd5a43; text-decoration: none; background-color: transparent;">google+</a>
					                                                                        </td>
					                                                                    </tr>
					                                                                </tbody>
					                                                            </table>
					                                                        </td>
					                                                    </tr>
					                                                </tbody>
					                                            </table>
					                                        </td>
					                                    </tr>
					                                </tbody>
					                            </table>
					                            <table class="table-space" height="1" style="height: 1px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-space-td" valign="middle" height="1" style="height: 1px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td>
					                                    </tr>
					                                </tbody>
					                            </table>
					                            <table class="table-space" height="36" style="height: 36px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-space-td" valign="middle" height="36" style="height: 36px; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" align="left">&nbsp;</td>
					                                    </tr>
					                                </tbody>
					                            </table>
					                        </td>
					                    </tr>
					                </table>
					            </td>
					        </tr>
					    </table>
					</body>
				</html>
		';
		// Contenido
		$titulo = utf8_decode('Acivación cuenta');
		$html=utf8_decode($html);
		// Mail it
		$acu=0;
		if ($email->enviar($correo,$propietario,$titulo,$html)) {
			$acu=1;
		};
		return $acu;
	}
	function recuperarpass($correo, $id){
		$email = new correo();
		$url = $email->url_();
		// print_r($email);

		// mensaje html
		$html='
				<!doctype html>
				<html xmlns="http://www.w3.org/1999/xhtml">

					<head>
					    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
					    <meta name="viewport" content="initial-scale=1.0" />
					    <meta name="format-detection" content="telephone=no" />
					    <title></title>
					    <style type="text/css">
					        body {
					            width: 100%;
					            margin: 0;
					            padding: 0;
					            -webkit-font-smoothing: antialiased;
					        }
					        
					        @media only screen and (max-width: 600px) {
					            table[class="table-row"] {
					                float: none !important;
					                width: 98% !important;
					                padding-left: 20px !important;
					                padding-right: 20px !important;
					            }
					            table[class="table-row-fixed"] {
					                float: none !important;
					                width: 98% !important;
					            }
					            table[class="table-col"],
					            table[class="table-col-border"] {
					                float: none !important;
					                width: 100% !important;
					                padding-left: 0 !important;
					                padding-right: 0 !important;
					                table-layout: fixed;
					            }
					            td[class="table-col-td"] {
					                width: 100% !important;
					            }
					            table[class="table-col-border"] + table[class="table-col-border"] {
					                padding-top: 12px;
					                margin-top: 12px;
					                border-top: 1px solid #E8E8E8;
					            }
					            table[class="table-col"] + table[class="table-col"] {
					                margin-top: 15px;
					            }
					            td[class="table-row-td"] {
					                padding-left: 0 !important;
					                padding-right: 0 !important;
					            }
					            table[class="navbar-row"],
					            td[class="navbar-row-td"] {
					                width: 100% !important;
					            }
					            img {
					                max-width: 100% !important;
					                display: inline !important;
					            }
					            img[class="pull-right"] {
					                float: right;
					                margin-left: 11px;
					                max-width: 125px !important;
					                padding-bottom: 0 !important;
					            }
					            img[class="pull-left"] {
					                float: left;
					                margin-right: 11px;
					                max-width: 125px !important;
					                padding-bottom: 0 !important;
					            }
					            table[class="table-space"],
					            table[class="header-row"] {
					                float: none !important;
					                width: 98% !important;
					            }
					            td[class="header-row-td"] {
					                width: 100% !important;
					            }
					        }
					        
					        @media only screen and (max-width: 480px) {
					            table[class="table-row"] {
					                padding-left: 16px !important;
					                padding-right: 16px !important;
					            }
					        }
					        
					        @media only screen and (max-width: 320px) {
					            table[class="table-row"] {
					                padding-left: 12px !important;
					                padding-right: 12px !important;
					            }
					        }
					        
					        @media only screen and (max-width: 458px) {
					            td[class="table-td-wrap"] {
					                width: 100% !important;
					            }
					        }
					    </style>
					</head>

					<body style="font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;" bgcolor="#E4E6E9" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
					    <table width="100%" height="100%" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
					        <tr>
					            <td width="100%" align="center" valign="top" bgcolor="#E4E6E9" style="background-color:#E4E6E9; min-height: 200px;">
					                <table>
					                    <tr>
					                        <td class="table-td-wrap" align="center" width="458">
					                            <table class="table-space" height="18" style="height: 18px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-space-td" valign="middle" height="18" style="height: 18px; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" align="left">&nbsp;</td>
					                                    </tr>
					                                </tbody>
					                            </table>
					                            <table class="table-space" height="8" style="height: 8px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-space-td" valign="middle" height="8" style="height: 8px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td>
					                                    </tr>
					                                </tbody>
					                            </table>

					                            <table class="table-row" width="450" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
					                                            <table class="table-col" align="left" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
					                                                <tbody>
					                                                    <tr>
					                                                        <td class="table-col-td" width="378" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; width: 378px;" valign="top" align="left">
					                                                            <table class="header-row" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
					                                                                <tbody>
					                                                                    <tr>
					                                                                        <td class="header-row-td" width="378" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 10px; padding-top: 15px;" valign="top" align="left">Recuperar Contraseña!</td>
					                                                                    </tr>
					                                                                </tbody>
					                                                            </table>
					                                                            <div style="font-family: Arial, sans-serif; line-height: 20px; color: #444444; font-size: 13px;">
					                                                                <b style="color: #777777;">
					                                                                 Al parecer te has olvidado tu contraseña.
					                                                                </b>
					                                                                <br> Por favor has clic en el siguiente link para generar una nueva contraseña.
					                                                            </div>
					                                                        </td>
					                                                    </tr>
					                                                </tbody>
					                                            </table>
					                                        </td>
					                                    </tr>
					                                </tbody>
					                            </table>

					                            <table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td>
					                                    </tr>
					                                </tbody>
					                            </table>
					                            <table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 450px; padding-left: 16px; padding-right: 16px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="center">&nbsp;
					                                            <table bgcolor="#E8E8E8" height="0" width="100%" cellspacing="0" cellpadding="0" border="0">
					                                                <tbody>
					                                                    <tr>
					                                                        <td bgcolor="#E8E8E8" height="1" width="100%" style="height: 1px; font-size:0;" valign="top" align="left">&nbsp;</td>
					                                                    </tr>
					                                                </tbody>
					                                            </table>
					                                        </td>
					                                    </tr>
					                                </tbody>
					                            </table>
					                            <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td>
					                                    </tr>
					                                </tbody>
					                            </table>

					                            <table class="table-row" width="450" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
					                                            <table class="table-col" align="left" width="378" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
					                                                <tbody>
					                                                    <tr>
					                                                        <td class="table-col-td" width="378" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; width: 378px;" valign="top" align="left">
					                                                            <div style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; text-align: center;">
					                                                                <a href="http://'.$url.'recuperarpass/'.$id.'" target="_blank" style="text-decoration:none; color:#4285F4">Link nueva contraseña </a>
					                                                            </div>
					                                                            <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 378px; background-color: #ffffff;" width="378" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					                                                                <tbody>
					                                                                    <tr>
					                                                                        <td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 378px; background-color: #ffffff;" width="378" bgcolor="#FFFFFF" align="left">&nbsp;</td>
					                                                                    </tr>
					                                                                </tbody>
					                                                            </table>
					                                                        </td>
					                                                    </tr>
					                                                </tbody>
					                                            </table>
					                                        </td>
					                                    </tr>
					                                </tbody>
					                            </table>

					                            <table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-space-td" valign="middle" height="6" style="height: 6px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td>
					                                    </tr>
					                                </tbody>
					                            </table>

					                            <table class="table-row-fixed" width="450" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-row-fixed-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 1px; padding-right: 1px;" valign="top" align="left">
					                                            <table class="table-col" align="left" width="448" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
					                                                <tbody>
					                                                    <tr>
					                                                        <td class="table-col-td" width="448" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
					                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
					                                                                <tbody>
					                                                                    <tr>
					                                                                        <td width="100%" align="center" bgcolor="#f5f5f5" style="font-family: Arial, sans-serif; line-height: 24px; color: #bbbbbb; font-size: 13px; font-weight: normal; text-align: center; padding: 9px; border-width: 1px 0px 0px; border-style: solid; border-color: #e3e3e3; background-color: #f5f5f5;" valign="top">
					                                                                            <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;">promoda &copy; 2016, por david criollo</a>
					                                                                            <br>
					                                                                            <a href="#" style="color: #478fca; text-decoration: none; background-color: transparent;">twitter</a> .
					                                                                            <a href="#" style="color: #5b7a91; text-decoration: none; background-color: transparent;">facebook</a> .
					                                                                            <a href="#" style="color: #dd5a43; text-decoration: none; background-color: transparent;">google+</a>
					                                                                        </td>
					                                                                    </tr>
					                                                                </tbody>
					                                                            </table>
					                                                        </td>
					                                                    </tr>
					                                                </tbody>
					                                            </table>
					                                        </td>
					                                    </tr>
					                                </tbody>
					                            </table>
					                            <table class="table-space" height="1" style="height: 1px; font-size: 0px; line-height: 0; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-space-td" valign="middle" height="1" style="height: 1px; width: 450px; background-color: #ffffff;" width="450" bgcolor="#FFFFFF" align="left">&nbsp;</td>
					                                    </tr>
					                                </tbody>
					                            </table>
					                            <table class="table-space" height="36" style="height: 36px; font-size: 0px; line-height: 0; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
					                                <tbody>
					                                    <tr>
					                                        <td class="table-space-td" valign="middle" height="36" style="height: 36px; width: 450px; background-color: #e4e6e9;" width="450" bgcolor="#E4E6E9" align="left">&nbsp;</td>
					                                    </tr>
					                                </tbody>
					                            </table>
					                        </td>
					                    </tr>
					                </table>
					            </td>
					        </tr>
					    </table>
					</body>
				</html>
		';
		// Contenido
		$titulo = utf8_decode('Promoda, Recuperar contraseña');
		$html=utf8_decode($html);
		// Mail it
		$acu = false;
		if ($email->enviar($correo,'Anonimo',$titulo,$html)) {
			$acu = true;
		};
		return $acu;
	}

	
	function respuesta($correo,$empresa,$mensaje){
		$class = new constantecorreo();
		$url = $email->url_();
		// mensaje html
		$contenido_html='
			<!DOCTYPE html>
				 <html xmlns="http://www.w3.org/1999/xhtml">
				 <head>
				  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
				  <meta name="viewport" content="initial-scale=1.0" />
				  <meta name="format-detection" content="telephone=no" />
				  <title></title>
				  <style type="text/css">
				 	body {
						width: 100%;
						margin: 0;
						padding: 0;
						-webkit-font-smoothing: antialiased;
					}
					@media only screen and (max-width: 600px) {
						table[class="table-row"] {
							float: none !important;
							width: 98% !important;
							padding-left: 20px !important;
							padding-right: 20px !important;
						}
						table[class="table-row-fixed"] {
							float: none !important;
							width: 98% !important;
						}
						table[class="table-col"], table[class="table-col-border"] {
							float: none !important;
							width: 100% !important;
							padding-left: 0 !important;
							padding-right: 0 !important;
							table-layout: fixed;
						}
						td[class="table-col-td"] {
							width: 100% !important;
						}
						table[class="table-col-border"] + table[class="table-col-border"] {
							padding-top: 12px;
							margin-top: 12px;
							border-top: 1px solid #E8E8E8;
						}
						table[class="table-col"] + table[class="table-col"] {
							margin-top: 15px;
						}
						td[class="table-row-td"] {
							padding-left: 0 !important;
							padding-right: 0 !important;
						}
						table[class="navbar-row"] , td[class="navbar-row-td"] {
							width: 100% !important;
						}
						img {
							max-width: 100% !important;
							display: inline !important;
						}
						img[class="pull-right"] {
							float: right;
							margin-left: 11px;
				            max-width: 125px !important;
							padding-bottom: 0 !important;
						}
						img[class="pull-left"] {
							float: left;
							margin-right: 11px;
							max-width: 125px !important;
							padding-bottom: 0 !important;
						}
						table[class="table-space"], table[class="header-row"] {
							float: none !important;
							width: 98% !important;
						}
						td[class="header-row-td"] {
							width: 100% !important;
						}
					}
					@media only screen and (max-width: 480px) {
						table[class="table-row"] {
							padding-left: 16px !important;
							padding-right: 16px !important;
						}
					}
					@media only screen and (max-width: 320px) {
						table[class="table-row"] {
							padding-left: 12px !important;
							padding-right: 12px !important;
						}
					}
					@media only screen and (max-width: 608px) {
						td[class="table-td-wrap"] {
							width: 100% !important;
						}
					}
				  </style>
				 </head>
				 <body style="font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;" bgcolor="#E4E6E9" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
				 <table width="100%" height="100%" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
				 <tr><td width="100%" align="center" valign="top" bgcolor="#E4E6E9" style="background-color:#E4E6E9; min-height: 200px;">
				<table><tr><td class="table-td-wrap" align="center" width="608">
				<table class="table-row" style="table-layout: auto; padding-right: 24px; padding-left: 24px; width: 600px; background-color: #ffffff;" bgcolor="#FFFFFF" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr height="55px" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; height: 55px;">
				   <td class="table-row-td" style="height: 55px; padding-right: 16px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; vertical-align: middle;" valign="middle" align="left">
				     <a href="#" style="color: #428bca; text-decoration: none; padding: 0px; font-size: 18px; line-height: 20px; height: 50px; background-color: transparent;">
					 	facturanext.com
					 </a>
				   </td>
				 
				   <td class="table-row-td" style="height: 55px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; text-align: right; vertical-align: middle;" align="right" valign="middle">
				     <a href="#" style="color: #428bca; text-decoration: none; font-size: 15px; background-color: transparent;">
					   Corporativo
					 </a>
					 &nbsp;
					 <a href="#" style="color: #428bca; text-decoration: none; font-size: 15px; background-color: transparent;">
					   Contactos
					 </a>
				   </td>
				</tr></tbody></table>
				<table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="6" style="height: 6px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table>
				<table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
				<table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 24px; padding-right: 24px;" valign="top" align="left">
				 <table class="table-col" align="left" width="552" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="552" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">	
					<div style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; text-align: center;">
						<img src="http://www.empresa.nextbook.ec/assets/dist/img/banner_correo_activacion.jpg" style="border: 0px none #444444; vertical-align: middle; display: block; padding-bottom: 9px; width:100%;" hspace="0" vspace="0" border="0">
					</div>
				 </td></tr></tbody></table>
				</td></tr></tbody></table>
				<table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
				   <table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="528" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
					 <table class="header-row" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="528" style="font-size: 20px; margin: 0px; font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; padding-bottom: 10px; padding-top: 15px;" valign="top" align="left">Estimados, '.$empresa.'</td></tr></tbody></table>
					 <table class="header-row" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="528" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #444444; margin: 0px; font-size: 15px; padding-bottom: 8px; padding-top: 10px;" valign="top" align="left">'.$mensaje.'</td></tr></tbody></table>
				   </td></tr></tbody></table>
				</td></tr></tbody></table>
				<table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
				<table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="6" style="height: 6px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table>
				<table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
				 <table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="528" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
					 <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
					 <div style="font-family: Arial, sans-serif; line-height: 19px; color: #777777; font-size: 14px; text-align: center;">&copy; 2015 CONCEPTUAL BUSINESS GROUP</div>
					 <table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
					 <div style="font-family: Arial, sans-serif; line-height: 19px; color: #bbbbbb; font-size: 13px; text-align: center;">
						<a href="http://www.nextbook.ec/terminos.html" style="color: #428bca; text-decoration: none; background-color: transparent;">Términos de Uso</a>
						&nbsp;|&nbsp;
						<a href="http://www.nextbook.ec/info.html" style="color: #428bca; text-decoration: none; background-color: transparent;">nextbook.ec</a>
						&nbsp;|&nbsp;
						<a href="http://www.empresa.nextbook.ec" style="color: #428bca; text-decoration: none; background-color: transparent;">facturanext.com</a>
					 </div>
					 <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
				 </td></tr></tbody></table>
				</td></tr></tbody></table>
				<table class="table-space" height="8" style="height: 8px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="8" style="height: 8px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table></td></tr></table>
				</td></tr>
				 </table>
				 </body>
				 </html>
		';
		// Contenido
		$titulo = utf8_decode('Correo de Verificación');
		$contenido_html=utf8_decode($contenido_html);
		// Mail it
		$acu=0;
		if ($email->enviar($correo, 'Cliente Facturanext', $titulo, $contenido_html)) {
			$acu=1;
		};
		return $acu;
	}
	// compartir
	function compartir_correo_xml($correo,$link,$comment){
		$email = new correo();
		$url = $email->url_();
		// mensaje html
		$contenido_html='
			<!DOCTYPE html>
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			    <meta name="viewport" content="initial-scale=1.0" />
			    <meta name="format-detection" content="telephone=no" />
			    <title></title>
			    <style type="text/css">
			        body {
			            width: 100%;
			            margin: 0;
			            padding: 0;
			            -webkit-font-smoothing: antialiased;
			        }
			        
			        @media only screen and (max-width: 600px) {
			            table[class="table-row"] {
			                float: none !important;
			                width: 98% !important;
			                padding-left: 20px !important;
			                padding-right: 20px !important;
			            }
			            table[class="table-row-fixed"] {
			                float: none !important;
			                width: 98% !important;
			            }
			            table[class="table-col"],
			            table[class="table-col-border"] {
			                float: none !important;
			                width: 100% !important;
			                padding-left: 0 !important;
			                padding-right: 0 !important;
			                table-layout: fixed;
			            }
			            td[class="table-col-td"] {
			                width: 100% !important;
			            }
			            table[class="table-col-border"] + table[class="table-col-border"] {
			                padding-top: 12px;
			                margin-top: 12px;
			                border-top: 1px solid #E8E8E8;
			            }
			            table[class="table-col"] + table[class="table-col"] {
			                margin-top: 15px;
			            }
			            td[class="table-row-td"] {
			                padding-left: 0 !important;
			                padding-right: 0 !important;
			            }
			            table[class="navbar-row"],
			            td[class="navbar-row-td"] {
			                width: 100% !important;
			            }
			            img {
			                max-width: 100% !important;
			                display: inline !important;
			            }
			            img[class="pull-right"] {
			                float: right;
			                margin-left: 11px;
			                max-width: 125px !important;
			                padding-bottom: 0 !important;
			            }
			            img[class="pull-left"] {
			                float: left;
			                margin-right: 11px;
			                max-width: 125px !important;
			                padding-bottom: 0 !important;
			            }
			            table[class="table-space"],
			            table[class="header-row"] {
			                float: none !important;
			                width: 98% !important;
			            }
			            td[class="header-row-td"] {
			                width: 100% !important;
			            }
			        }
			        
			        @media only screen and (max-width: 480px) {
			            table[class="table-row"] {
			                padding-left: 16px !important;
			                padding-right: 16px !important;
			            }
			        }
			        
			        @media only screen and (max-width: 320px) {
			            table[class="table-row"] {
			                padding-left: 12px !important;
			                padding-right: 12px !important;
			            }
			        }
			        
			        @media only screen and (max-width: 608px) {
			            td[class="table-td-wrap"] {
			                width: 100% !important;
			            }
			        }
			    </style>
			</head>
			<body style="font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;" bgcolor="#E4E6E9" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
			    <table width="100%" height="100%" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
			        <tr>
			            <td width="100%" align="center" valign="top" bgcolor="#E4E6E9" style="background-color:#E4E6E9; min-height: 200px;">
			                <table>
			                    <tr>
			                        <td class="table-td-wrap" align="center" width="608">
			                            <table class="table-row" style="table-layout: auto; padding-right: 24px; padding-left: 24px; width: 600px; background-color: #ffffff;" bgcolor="#FFFFFF" width="600" cellspacing="0" cellpadding="0" border="0">
			                                <tbody>
			                                    <tr height="55px" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; height: 55px;">
			                                        <td class="table-row-td" style="height: 55px; padding-right: 16px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; vertical-align: middle;" valign="middle" align="left">
			                                            <a href="#" style="color: #428bca; text-decoration: none; padding: 0px; font-size: 18px; line-height: 20px; height: 50px; background-color: transparent;">
														 	facturanext.com
														</a>
			                                        </td>
			                                        <td class="table-row-td" style="height: 55px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; text-align: right; vertical-align: middle;" align="right" valign="middle">
			                                            <a href="#" style="color: #428bca; text-decoration: none; font-size: 15px; background-color: transparent;">
														   Corporativo
														</a> &nbsp;
			                                            <a href="#" style="color: #428bca; text-decoration: none; font-size: 15px; background-color: transparent;">
														   Contactos
														</a>
			                                        </td>
			                                    </tr>
			                                </tbody>
			                            </table>
			                            <table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
			                                <tbody>
			                                    <tr>
			                                        <td class="table-space-td" valign="middle" height="6" style="height: 6px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;</td>
			                                    </tr>
			                                </tbody>
			                            </table>
			                            <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
			                                <tbody>
			                                    <tr>
			                                        <td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td>
			                                    </tr>
			                                </tbody>
			                            </table>
			                            <table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
			                                <tbody>
			                                    <tr>
			                                        <td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 24px; padding-right: 24px;" valign="top" align="left">
			                                            <table class="table-col" align="left" width="552" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
			                                                <tbody>
			                                                    <tr>
			                                                        <td class="table-col-td" width="552" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
			                                                            <div style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; text-align: center;">
			                                                                <img src="http://www.empresa.nextbook.ec/assets/dist/img/banner_correo_activacion.jpg" style="border: 0px none #444444; vertical-align: middle; display: block; padding-bottom: 9px; width:100%;" hspace="0" vspace="0" border="0">
			                                                            </div>
			                                                        </td>
			                                                    </tr>
			                                                </tbody>
			                                            </table>
			                                        </td>
			                                    </tr>
			                                </tbody>
			                            </table>
			                            <table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
			                                <tbody>
			                                    <tr>
			                                        <td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
			                                            <table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
			                                                <tbody>
			                                                    <tr>
			                                                        <td class="table-col-td" width="528" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
			                                                            <table class="header-row" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
			                                                                <tbody>
			                                                                	<tr><td colspan="" rowspan="" headers=""><hr></td></tr>
			                                                                    <tr>
																					<td align="left" valign="middle" style="width:160px; color:rgb(255,255,255); line-height:18px; padding-right:5px; padding-left:10px; font-family:&quot;Segoe UI&quot;,Tahoma,Geneva,Verdana,sans-serif; font-size:15px; background-color:#0086D0"> <a href="'.$link.'" download="w3logo" style="color:rgb(255,255,255); text-decoration:none"> Ver Archivo </a></td> <td align="left" valign="top" style="width:26px; height:26px"><a href="'.$link.'"  download ><img src="http://image.email.microsoftemail.com/lib/feed1d7871600d/m/1/UK_DPE_Quarterly_31.jpg" width="26" height="26" alt="Ir a Recursos" border="0" style="display:block"></a>
																					</td>
			                                                                    </tr>
			                                                                    <tr>
			                                                                    	<td colspan="" rowspan="" headers="">
			                                                                    	<br>
			                                                                    	'.$comment.'
			                                                                    	</td>
			                                                                    </tr>
			                                                                    <tr><td colspan="" rowspan="" headers=""><hr></td></tr>
			                                                                </tbody>
			                                                            </table>
			                                                            <table class="header-row" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
			                                                                <tbody>
			                                                                    <tr>
			                                                                        <td class="header-row-td" width="528" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #444444; margin: 0px; font-size: 15px; padding-bottom: 8px; padding-top: 10px;" valign="top" align="left"><img src="../dist/img/logos/facturanext.jpg">Almacenamiento en línea gratis para tus facturas electrónicas. <a href="http://www.facturanext.com" target="_blank">Échale un vistazo.</a>
			                                                                        </td>
			                                                                    </tr>
			                                                                    <tr><td colspan="" rowspan="" headers=""><hr></td></tr>
			                                                                    <tr>
			                                                                    	<td colspan="" rowspan="" headers="">
			                                                                    		nextbook.ec respeta tu privacidad. Para obtener más información, lee nuestra <a href="nextbook.ec">Política de Privacidad</a>
			                                                                    	</td>
			                                                                    </tr>                                                               
			                                                                </tbody>
			                                                            </table>
			                                                        </td>
			                                                    </tr>
			                                                </tbody>
			                                            </table>
			                                        </td>
			                                    </tr>
			                                </tbody>
			                            </table>
			                            <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
			                                <tbody>
			                                    <tr>
			                                        <td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td>
			                                    </tr>
			                                </tbody>
			                            </table>
			                            <table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
			                                <tbody>
			                                    <tr>
			                                        <td class="table-space-td" valign="middle" height="6" style="height: 6px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;</td>
			                                    </tr>
			                                </tbody>
			                            </table>
			                            <table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
			                                <tbody>
			                                    <tr>
			                                        <td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
			                                            <table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
			                                                <tbody>
			                                                    <tr>
			                                                        <td class="table-col-td" width="528" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
			                                                            <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
			                                                                <tbody>
			                                                                    <tr>
			                                                                        <td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;</td>
			                                                                    </tr>
			                                                                </tbody>
			                                                            </table>
			                                                            <div style="font-family: Arial, sans-serif; line-height: 19px; color: #777777; font-size: 14px; text-align: center;">&copy; 2015 CONCEPTUAL BUSINESS GROUP</div>
			                                                            <table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
			                                                                <tbody>
			                                                                    <tr>
			                                                                        <td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;</td>
			                                                                    </tr>
			                                                                </tbody>
			                                                            </table>
			                                                            <div style="font-family: Arial, sans-serif; line-height: 19px; color: #bbbbbb; font-size: 13px; text-align: center;">
			                                                                <a href="http://www.nextbook.ec/terminos.html" style="color: #428bca; text-decoration: none; background-color: transparent;">Términos de Uso</a> &nbsp;|&nbsp;
			                                                                <a href="http://www.nextbook.ec/info.html" style="color: #428bca; text-decoration: none; background-color: transparent;">nextbook.ec</a> &nbsp;|&nbsp;
			                                                                <a href="http://www.empresa.nextbook.ec" style="color: #428bca; text-decoration: none; background-color: transparent;">facturanext.com</a>
			                                                            </div>
			                                                            <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
			                                                                <tbody>
			                                                                    <tr>
			                                                                        <td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;</td>
			                                                                    </tr>
			                                                                </tbody>
			                                                            </table>
			                                                        </td>
			                                                    </tr>
			                                                </tbody>
			                                            </table>
			                                        </td>
			                                    </tr>
			                                </tbody>
			                            </table>
			                            <table class="table-space" height="8" style="height: 8px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
			                                <tbody>
			                                    <tr>
			                                        <td class="table-space-td" valign="middle" height="8" style="height: 8px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;</td>
			                                    </tr>
			                                </tbody>
			                            </table>
			                        </td>
			                    </tr>
			                </table>
			            </td>
			        </tr>
			    </table>
			</body>
			</html>
		';
		// Contenido
		$titulo = utf8_decode('Archivo Compartido');
		$contenido_html=utf8_decode($contenido_html);
		// Mail it
		$acu=0;
		if ($email->enviar($correo, 'Cliente Facturanext', $titulo, $contenido_html)) {
			$acu=1;
		};
		return $acu;
	}
?>