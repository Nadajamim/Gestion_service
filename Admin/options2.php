<?php
 include ("../db.php");
 if($_SERVER['REQUEST_METHOD']=='POST')
 {

		if(isset($_POST["Enregistrer"])){
				$date1=strtr($_REQUEST['date'],'/','-');							
			}
		if(isset($_POST["Enregistrer"])){
			 // Récupérer les valeurs soumises
			 if(isset($_POST['idemployer'])){

			 $matricule = $_POST['matricule'];
			 $nom = $_POST['nom'];
			 $prenom = $_POST['prenom'];
			 $date1=strtr($_REQUEST['date'],'/','-');							

			 $idService=1;
			 $idchef1=1;
			 $idchef2=1;

			 $pdo_statement = $pdo_conn->prepare("SELECT *  FROM employer where idService=1 order by idemployer ASC");
			 $pdo_statement->execute();
			 $resultid = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);	
			 
				// l'insertion d'absence de chaque section du journée
				foreach($resultid as $row){
					$idemp=$row["idemployer"];
					$pdo_statement = $pdo_conn->prepare("SELECT distinct idemployer,day1M,day1E,
					day2E,day2M,day2E,day3M,day3E,day4M,day4E,day5M,day5E,day6M,day6E,
					day7M,day7E FROM listservice  where idService=1 and date='$objetdate'order by idemployer ASC");
					$pdo_statement->execute();
					$resultab = $pdo_statement->fetchAll(PDO::FETCH_ASSOC); 
				  foreach($resultab as $g){ ;
				$pdo_statement->execute();
				$resultab = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
				if(isset($_POST["select1".$row['idemployer'].""]) &&
				 in_array((["idemployer"=> $idemp,"day1M"=>1]),$resultab)===true ){	
					$pdo_statement = $pdo_conn->prepare("insert into listservice(matricule,idemployer,idService,date,,day1M,day1E,
					day2E,day2M,day2E,day3M,day3E,day4M,day4E,day5M,day5E,day6M,day6E,
					day7M,day7E,idchefsection,idchefservice)
					 values('$matricule',
					 '1','$date1','$val1','$val2','$val3','$val4','$val5','$val6','$val7','$val8',
					 '$val9','$val10','$val11','$val12','$val13','$val14',1,1)");
					$pdo_statement->bindParam(1,$row["idemployer"]);
					$pdo_statement->execute();
					$succes="succes";
				}


		
			 
		
		 

		 
		}
	}}}
			header("Location:indexAdmin.php?date1=$date1");
} 
?>