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
				$pdo_statement = $pdo_conn->prepare("SELECT distinct l.matricule,
				e.nom,e.prenom,l.day1M,l.day1E,
				l.day2M,l.day2E,l.day3M,l.day3E,l.day4M,l.day4E,l.day5M,l.day5E,l.day6M,l.day6E,
				l.day7M,l.day7E from employer e,listservice l where l.idemployer=e.idemployer 
				and e.idService='$service' and l.date='$date1'");
				$pdo_statement->execute();
				$resultab = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
				
			//redirection
									
			}
			header("Location:index2.php?Service=$service&date1=$date1");
} 
?>