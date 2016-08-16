<?php
include_once ("conex.php");
include ("constante.php");
class constante {
    private $login;
    private $contrasena;
    private $cedula;
    private $tipo;
    private $status;
    public function consulta($q) {
        $BaseDato = new BaseDeDato(SERVIDOR, PUERTO, BD, USUARIO, CLAVE);
        $result = $BaseDato->Consultas($q);
        return $result;
    }
    public function fetch_array($consulta) {
        return pg_fetch_array($consulta);
    }
    public function num_rows($consulta) {
        return pg_num_rows($consulta);
    }
    public function getTotalConsultas() {
        return $this->total_consultas;
    }
    public function sqlcon($q) {
        $BaseDato = new BaseDeDato(SERVIDOR, PUERTO, BD, USUARIO, CLAVE);
        $result = $BaseDato->Consultas($q);
        if (pg_affected_rows($result) >= 0) return 1;
        else return 0;
    }
    function idz() {
        date_default_timezone_set('America/Guayaquil');
        $fecha = date("YmdHis");
        return ($fecha . uniqid());
    }
    function client_ip() {
        $ipaddress = '';
        if ($_SERVER['HTTP_CLIENT_IP']) $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if ($_SERVER['HTTP_X_FORWARDED_FOR']) $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if ($_SERVER['HTTP_X_FORWARDED']) $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if ($_SERVER['HTTP_FORWARDED_FOR']) $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if ($_SERVER['HTTP_FORWARDED']) $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if ($_SERVER['REMOTE_ADDR']) $ipaddress = $_SERVER['REMOTE_ADDR'];
        else $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    public function edad($fecha) {
        $dias = explode("-", $fecha, 3);
        $dias = mktime(0, 0, 0, $dias[1], $dias[0], $dias[2]);
        $edad = (int)((time() - $dias) / 31556926);
        return $edad;
    }
    function diaSemana($ano, $mes, $dia) {
        $dia = date("w", mktime(0, 0, 0, $mes, $dia, $ano));
        if ($dia == 1) {
            return 'LUNES';
        } elseif ($dia == 1) {
            return 'LUNES';
        } elseif ($dia == 2) {
            return 'MARTES';
        } elseif ($dia == 3) {
            return 'MIERCOLES';
        } elseif ($dia == 4) {
            return 'JUEVES';
        } elseif ($dia == 5) {
            return 'VIERNES';
        } elseif ($dia == 6) {
            return 'SABADO';
        } elseif ($dia == 7) {
            return 'DOMINGO';
        }
    }
    public function fecha() {
        $fecha = date("d-m-Y");
        return $fecha;
    }
    public function hora() {
        date_default_timezone_set('America/Guayaquil');
        $hora = date("H:i:s");
        return $hora;
    }
    public function fecha_hora() {
        date_default_timezone_set('America/Guayaquil');
        $fecha = date("Y-m-d H:i:s");
        return $fecha;
    }
    public function fecha2() {
        $fecha = date("Y-m-d");
        return $fecha;
    }
    public function clave_aleatoria() {
        $str = "ABCDEF#GHIJKLMNO/PQRS%TUVWXYZabc@defghijklmnopqrstuvwxyz1234567890-$";
        $cad = "";
        for ($i = 0;$i < 12;$i++) {
            $cad.= substr($str, rand(0, 62), 1);
        }
        return $cad;
    }
    public static function generateValidXmlFromObj(stdClass $obj, $node_block='nodes', $node_name='node') {
        $arr = get_object_vars($obj);    
        return self::generateValidXmlFromArray($arr, $node_block, $node_name);
    }
    public static function generateValidXmlFromArray($array, $node_block='nodes', $node_name='node') {
        $xml = '<?xml version="1.0" encoding="UTF-8" ?>';

        //$xml .= '<' . $node_block . '>';    
        $xml .= self::generateXmlFromArray($array, $node_name);
        //$xml .= '</' . $node_block . '>';
        return $xml;
    }
    private static function generateXmlFromArray($array, $node_name) {
        $xml = '';
        if(is_array($array) || is_object($array)) {
          foreach ($array as $key=>$value) {
              if (is_numeric($key)) {
                  $key = $node_name;
              }
              $xml .= '<' . $key . '>' . self::generateXmlFromArray($value, $node_name) . '</' . $key . '>';          
          }
        }else {
          $xml = htmlspecialchars($array, ENT_QUOTES);
        }
        return $xml;
    }
    public function uncdata($xml){    
    $state = 'out';
    $a = str_split($xml);
    $new_xml = '';
    foreach ($a AS $k => $v) {        
      switch ( $state ) {
        case 'out':
          if ( '<' == $v ) {
            $state = $v;
          } else {
            $new_xml .= $v;
          }
          break;
        case '<':
          if ( '!' == $v  ) {
            $state = $state . $v;
          } else {
            $new_xml .= $state . $v;
            $state = 'out';
          }
          break;
        case '<!':
          if ( '[' == $v  ) {
            $state = $state . $v;
          } else {
            $new_xml .= $state . $v;
            $state = 'out';
          }
          break;
        case '<![':
          if ( 'C' == $v  ) {
            $state = $state . $v;
          } else {
            $new_xml .= $state . $v;
            $state = 'out';
          }
          break;
        case '<![C':
          if ( 'D' == $v  ) {
            $state = $state . $v;
          } else {
            $new_xml .= $state . $v;
            $state = 'out';
          }
          break;
        case '<![CD':
          if ( 'A' == $v  ) {
              $state = $state . $v;
          } else {
              $new_xml .= $state . $v;
              $state = 'out';
          }
          break;
        case '<![CDA':
          if ( 'T' == $v  ) {
              $state = $state . $v;
          } else {
              $new_xml .= $state . $v;
              $state = 'out';
          }
          break;
        case '<![CDAT':
          if ( 'A' == $v  ) {
              $state = $state . $v;
          } else {
              $new_xml .= $state . $v;
              $state = 'out';
          }
          break;
        case '<![CDATA':
          if ( '[' == $v  ) {


              $cdata = '';
              $state = 'in';
          } else {
              $new_xml .= $state . $v;
              $state = 'out';
          }
          break;
        case 'in':
          if ( ']' == $v ) {
              $state = $v;
          } else {
              $cdata .= $v;
          }
          break;
        case ']':
          if (  ']' == $v  ) {
              $state = $state . $v;
          } else {
              $cdata .= $state . $v;
              $state = 'in';
          }
          break;
        case ']]':
          if (  '>' == $v  ) {
              $new_xml .= str_replace('>','&gt;',
                          str_replace('>','&lt;',
                          str_replace('"','&quot;',
                          str_replace('&','&amp;',
                          $cdata))));
              $state = 'out';
          } else {
              $cdata .= $state . $v;
              $state = 'in';
          }
          break;        
        }
      }    

    return trim($new_xml);
  }
}
?>