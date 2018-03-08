<?php
session_start();
    $host = "localhost";
    $contrasena ="admin123*";
    $usuario = "admin_reque";
    $base ="admin_reque";
   
    /*******************************************/

    $conexion = mysql_connect("$host","$usuario","$contrasena");
    mysql_select_db("$base",$conexion);	
    mysql_query ("SET NAMES 'utf8'");
    date_default_timezone_set('America/Costa_Rica');

define('MAILGUN_URL', 'https://api.mailgun.net/v3/mg.synappcr.com');
define('MAILGUN_KEY', 'key-a2e3503766e936bbfa5eda7a1df52779'); 
function sendmailbymailgun($to,$toname,$mailfromnane,$mailfrom,$subject,$html,$text,$tag,$replyto){
    $array_data = array(
		'from'=> $mailfromnane .'<'.$mailfrom.'>',
		'to'=>$toname.'<'.$to.'>',
		'subject'=>$subject,
		'html'=>$html,
		'text'=>$text,
		'o:tracking'=>'yes',
		'o:tracking-clicks'=>'yes',
		'o:tracking-opens'=>'yes',
		'o:tag'=>$tag,
		'h:Reply-To'=>$replyto
    );
    $session = curl_init(MAILGUN_URL.'/messages');
    curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  	curl_setopt($session, CURLOPT_USERPWD, 'api:'.MAILGUN_KEY);
    curl_setopt($session, CURLOPT_POST, true);
    curl_setopt($session, CURLOPT_POSTFIELDS, $array_data);
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_ENCODING, 'UTF-8');
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($session);
    curl_close($session);
    $results = json_decode($response, true);
    return $results;
}





?>            