<?php
$servername = "localhost";
$username = "root";
$db="gestion_service";
$password = "root";


try 
{
	
	$pdo_conn = new PDO("mysql:host=$servername;dbname=$db",$username,$password);
	$pdo_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) 
{	
  echo "echec de connexion : " . $e->getMessage();  
}
?>