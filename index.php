<?php 
	include "config.php";
	if (isset($_SESSION['usuario'])){
            $consulta_sql = "SELECT * FROM usuario WHERE id_usuario = '".$_SESSION['usuario']."' ";
            $consulta = mysql_query($consulta_sql);
            $usuario_datos = mysql_fetch_array($consulta);
            if ($usuario_datos['tipo'] == 1){
                echo "<script>window.location='admin/'</script>";
            }else{
                echo "<script>window.location='ingreso/'</script>";
            }    
	}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login a una aplicación </title>
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="http://remusacr.com/images/logo.png" />
</head>

<body>
    <center>
        <?php if(isset($_GET['error_login'])){
            if ($_GET['error_login'] == 0)
                echo "<div class='alert alert-primary'>ERROR EN LA BASE DE DATOS</div>";
            if ($_GET['error_login'] == 1)
                echo "<div class='alert alert-primary'>ERROR EN EL USUARIO</div>";
            if ($_GET['error_login'] == 2)
                echo "<div class='alert alert-primary'>ERROR EN EL PASS</div>"; 
            if ($_GET['error_login'] == 3)
                echo "<div class='alert alert-success'>Ingresa para activar la cuenta</div>"; 
            if ($_GET['error_login'] == 4)
                echo "<div class='alert alert-warning'>Verifica tu email</div>";
            if ($_GET['error_login'] == 5)
                echo "<div class='alert alert-danger'>Email no encontrado</div>";
            if ($_GET['error_login'] == 6)
                echo "<div class='alert alert-danger'>Usuario Inactivo - Contacta con soporte</div>";
    
        }
        ?>
        <div class="col-md-4 col-md-offset-4" style="margin-top:100px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Login</h4>
                </div>
                <br><br>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" action="aut_verifica.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" name="user" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Contraseña" name="pass" type="password" required>
                            </div>

                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Entrar"><br>
                            <hr>
                           
                            <center>
                                <a href="olvido.php" class="btn btn-warning">Olvido la contraseña</a>
                            </center>
                     
                            <hr>
                            <center>
                                <a href="registro.php" class="btn btn-success">Registrarse</a>
                            </center>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </center>

    <footer class="footer">
        <div class="container">
            <span class="text-muted"><center>Implementado como ejemplo - Requerimientos de Software 20<?php echo date('y'); ?></center></span>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="https://getbootstrap.com/assets/js/vendor/jquery-slim.min.js"><\/script>')

    </script>
    <script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</body>

</html>
