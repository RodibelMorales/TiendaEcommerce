<?php 
$confi= null;
$confi= array();
$confi['server'] = 'localhost';
#$confi['usuario'] = 'root';
$confi['usuario'] = 'yaxkingu_ecommer';
#$confi['clave'] = 'medalofhonor';
$confi['clave'] = 'medalofhonor1993yaxkin';
#$confi['clave'] = 'medalofhonor';
$confi['basedato'] = 'yaxkingu_ecommerce';
#$confi['basedato'] ='dbyaxkin';
$con = new conexionBD($confi['server'],$confi['usuario'],$confi['clave'],$confi['basedato']);

	class conexionBD{
		public $enlace;
		function __construct($server, $usuario, $clave, $basedato){
			$this->enlace = mysqli_connect($server,$usuario,$clave,$basedato) or die(mysqli_error());
		}
		function __destruct(){
			mysqli_close($this->enlace);
		}
	}
?>
