<?php 
	include "config.php";
	if (isset($_POST['email'])){
            $user =$_POST['email'];
            $consulta_sql = "INSERT INTO `usuario`(`pass`, `email`, `nombre`) VALUES (
            '".md5($_POST['pass'])."',
             '".$_POST['email']."',
              '".$_POST['user']."'
            ) ";
            $consulta = mysql_query($consulta_sql);
            
           
        
			echo "<script>alert('Registrado con exito!'); window.location='index.php?error_login=3'</script>";
                
    
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

        <div class="col-md-4 col-md-offset-4" style="margin-top:100px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Registrarse</h4>
                </div>
                <br><br>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" action="" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Nombre" name="user" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" name="email" type="email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="pass" type="password">
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
