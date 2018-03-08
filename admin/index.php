<?php include '../config.php'; ?>
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
                <div class="panel-heading">
                    <center> <h2>Usuarios del sistema</h2></center>
                </div>
                <center>
                    
                    <table class="table">
                        <tr>
                            <td><center>
                                Nombre
                                </center>
                            </td>
                            <td>
                                <center>
                                Email
                                </center>
                            </td>
                            <td>
                                <center>
                                Tipo
                                </center>
                            </td>
                             <td>
                                <center>
                                Estado
                                </center>
                            </td>
                            <td>
                                <center>
                                Acciones
                                </center>
                            </td>
                        </tr>
                        
                        
                             <?php
                 
                    $query = 'SELECT * from usuario ORDER by tipo';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    if ($line['tipo'] == 1){
        $tipo = "Administracion";
    }else{
        $tipo = "Usuario";
    }
    
    if ($line['estado'] == 1){
        $estado = "Activo";
    }else{
        $estado = "Inactivo";
    }
    
    
    echo "     <tr>
                            <td> 
                                ".$line['nombre']."
                            </td>
                            <td>
                                ".$line['email']."
                            </td>
                            
                            <td>
                                $tipo
                            </td>
                            
                             <td>
                                $estado
                            </td>
                            
                            <td>
                                <a href='editar.php?id= ".$line['id_usuario']."' class='btn btn-success'>Editar</a>
                            </td>
                        </tr>";
    
}
                    ?>
                        
                        
                      
                        
                        
                        
                    </table>
               
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
