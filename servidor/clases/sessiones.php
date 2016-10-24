<?php 
	/**
	* Clase encargada de controlar las sesiones de usuario
	*/
	class sessions
	{
		/*
		*Variables de la tabla yaxkinuser
		*/
		public $id;
		public $usuario;
		public $tipousuario;
		public $nombre;
		public $apellidoP;
		public $apellidoM;

		public function startsessions(){
			$enlace = mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
			$findUsersql = mysqli_query($enlace, "SELECT usuario,password,nombre,apellidoP  FROM yaxkinuser WHERE usuario = '{$this->ykuser}'");
			if($rfinduser = mysqli_fetch_array($findUsersql)){
					if ($rfinduser['password'] = $this->ykpass) {
						$this->nombre = $rfinduser['nombre'];
						$this->apellidoP = $rfinduser['apellidoP'];
						session_start();
						$_SESSION['nameuseryaxk'] = $this->nombre;
						header("Location: ../../cpanel/admin.php");
					}else{
						echo "<script language='JavaScript'> alert('Usuario y/o contraseña Invalido'); window.location='../../cpanel/index.php';</script>";
					}
			}else{
				echo "<script language='JavaScript'> alert('Usuario y/o contraseña Invalido'); window.location='../../cpanel/index.php';</script>";
			}

			mysqli_free_result($findUsersql);
			mysqli_close($enlace);
		}
		public function destroysession(){
			session_start();
			$_SESSION = array();
			session_destroy();		
			header("Location:../../cpanel/index.php");
		}
	}


?>