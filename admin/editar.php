<?php 
	include "../config.php";

$query = "SELECT * from usuario where id_usuario = '".$_GET['id']."' ";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
$line = mysql_fetch_array($result, MYSQL_ASSOC);
    
    if ($line['tipo'] == 1){
        $tipo = "Administracion";
    }else{
        $tipo = "Usuario";
    }

	if (isset($_POST['user'])){
        
            if ($_POST['pass'] != ""){
                $agregar = "`pass`= '".md5($_POST['pass'])."',";
            }else{
                $agregar = "";
            }
            
            $consulta_sql = "
            UPDATE `usuario` SET $agregar
            `email`= '".$_POST['email']."',
            `nombre`='".$_POST['user']."',
            `tipo`='".$_POST['tipo']."' WHERE `id_usuario`= '".$_GET['id']."' ";
            
            $consulta = mysql_query($consulta_sql);
            
			echo "<script>alert('Actualizado con exito!'); window.location='index.php'</script>";
    }
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EJEMPLO DE LOGIN</title>
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">      
    <link href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">   
      <link rel="shortcut icon" type="image/x-icon" href="http://remusacr.com/images/logo.png" />
  </head>
  <body>  
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">ADMINISTRACION</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            
            <a href="../aut_salir.php" class="btn btn-success">Salir</a>
          </form>
        </div>
      </nav>
<head>
    <style>
    
        body { padding-top:120px;}
        .panel-body .btn:not(.btn-block) { width:300px;
                                            height:120px;
                                            margin-bottom:30px;
                                            margin-left: 20px;
                                            }
        
    </style>
</head>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
           
                <center>
                    <a href="#" onclick="window.history.back();" class="btn btn-danger">Regresar</a>
                    <br><br>
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Editar usuario</h4>
                </div>
                <br><br>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" action="" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                Nombre:<br>
                                <input class="form-control" name="user" value="<?php echo $line['nombre']; ?>" type="text">
                            </div>
                            <div class="form-group">
                                Email:<br>
                                <input class="form-control" name="email" value="<?php echo $line['email']; ?>" type="email">
                            </div>
                            <div class="form-group">
                                Nuevo Password:<br>
                                <input class="form-control" placeholder="Nuevo Password" name="pass" type="password">
                            </div>
                            <div class="form-group">
                                Tipo:<br>
                                <select name="tipo" class="form-control">
                                    <?php echo " <option value='".$line['tipo']."'>$tipo</option>"; ?>
                                    <option value="1">Administrador</option>
                                    <option value="0">Usuario</option>
                                </select>
                            </div>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Actualizar"><br>
                            <hr>
                            <br>

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </center>

                </div>
            </div>
        </div>
    </div>



<br><br>
    <footer class="footer">
        <div class="container">
            <span class="text-muted"><center>Implementado como ejemplo - Requerimientos de Software 20<?php echo date('y'); ?></center></span>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="https://getbootstrap.com/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
  </body>
</html>
