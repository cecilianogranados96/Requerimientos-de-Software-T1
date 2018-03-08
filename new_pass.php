<?php 
	include "config.php";
	if (isset($_POST['pass'])){
            $consulta_sql = "SELECT * FROM usuario WHERE cod = '".$_POST['cod']."' ";
            $consulta = mysql_query($consulta_sql);
            $usuario_datos = mysql_fetch_array($consulta);
            if (mysql_num_rows($consulta) != 0){
                if ($usuario_datos['cod'] == $_POST['cod'] ){
                    $consulta_sql = "UPDATE `usuario` SET `pass`='".md5($_POST['pass'])."', `cod` = '0' WHERE `cod` = '".$_POST['cod']."' ";
                    mysql_query($consulta_sql);
                    echo "<script languaje='JavaScript'>alert('Password Cambiado con exito, inicia sesion.'); location.href='index.php';</script>";
                    exit;
                }
            }
            echo "<script>window.location='new_pass.php?error_login=0'</script>";
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
                echo "<div class='alert alert-primary'>CODIGO INCORRECTO</div>";
    
    
        }
        ?>
        
        <div class="col-md-4 col-md-offset-4" style="margin-top:100px;">
            <div class="panel panel-default">
                <a href="#" onclick="window.history.back();" class="btn btn-danger">Regresar</a>
                    <br><br>
                <div class="panel-heading">
                    <h4 class="panel-title">Nuevo password</h4>
                </div>
                <br><br>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" action="" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Nuevo Password" name="pass" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Codigo de verificacion" name="cod" type="text" required>
                            </div>

                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Enviar"><br>
                            <hr>
                            <br>

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
