<?php
session_start();
require("config.php");
$redir = "http://".$_SERVER['HTTP_HOST']."/Login/";
$con = new mysqli("$host", "$usuario", "$contrasena", "$base");
if ($con->connect_errno)
{
	echo '<script>location.href = "'.$redir.'?error_login=0"</script>';
    echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
    exit();
}
@mysqli_query($con, "SET NAMES 'utf8'");

if (isset($_POST['user']) && isset($_POST['pass'])) 
{
    $user = mysqli_real_escape_string($con, $_POST['user']);
    $pass = (mysqli_real_escape_string($con, $_POST['pass']));
	$consulta_sql = "SELECT * FROM usuario WHERE email = '$user' ";
    $consulta = mysqli_query($con, $consulta_sql);
	$usuario_datos = mysqli_fetch_array($consulta);
	if ($usuario_datos['email'] != $user){
		session_destroy();
		echo "<script languaje='JavaScript'>location.href='$redir?error_login=1';</script>";
		exit;
	}
	if ($usuario_datos['pass'] != md5($pass)){
		session_destroy();
		echo "<script languaje='JavaScript'>location.href='$redir?error_login=2';</script>";
		exit;
	}

	if (mysqli_num_rows($consulta) > 0)
    {
				$_SESSION["usuario"] = $usuario_datos['id_usuario'];
				echo '<script>location.href = "'.$_SERVER['PHP_SELF'].'"</script>';
				echo "<script languaje='JavaScript'>location.href='$redir/ingreso/';</script>";
    }
    else
    {
			echo "<script languaje='JavaScript'>location.href='$redir?error_login=2';</script>";
			exit;
    }
}else {
	if (!isset($_SESSION['usuario'])){
		//session_destroy();
		echo "<script languaje='JavaScript'>location.href='$redir?error_login=5';</script>  ";
		exit;
	}
}

echo '<script>location.href = "index.php"</script>';
?>