<?php
 include ("../db.php");
 if($_SERVER['REQUEST_METHOD']=='POST')
 {

		if(isset($_POST["Valider"])){
			
				if(isset($_POST['idService'])){
				$service=$_POST['idService'];}
				$date1=strtr($_REQUEST['date'],'/','-');
				// selection du tableau stagiaire
			
				// l'insertion d'absence de chaque section du journée
				$pdo_statement = $pdo_conn->prepare("SELECT distinct * FROM service s,listservice l where 
				l.idService=s.idService and l.idService='$NomS' and date='$date1'");
				$pdo_statement->execute();
				$resultab = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
				
			//redirection
									
			}
			header("Location:index2.php?Service=$service&date1=$date1");
} 
?>