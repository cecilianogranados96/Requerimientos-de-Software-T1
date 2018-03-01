<?php
session_start();
    $host = "localhost";
    $contrasena ="";
    $usuario = "root";
    $base ="reque";
   
    /*******************************************/

    $conexion = mysql_connect("$host","$usuario","$contrasena");
    mysql_select_db("$base",$conexion);	
    mysql_query ("SET NAMES 'utf8'");
    date_default_timezone_set('America/Costa_Rica');



?>            