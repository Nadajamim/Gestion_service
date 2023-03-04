<?php
 include ("../db.php");
 if($_SERVER['REQUEST_METHOD']=='POST')
 {

		if(isset($_POST["Enregistrer"])){
			 // Récupérer les valeurs soumises
			 $pdo_statement = $pdo_conn->prepare("SELECT idemployer FROM employer where idService=3");
			 $pdo_statement->execute();
			 $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
			 // l'insertion d'absence de chaque section du journée
			 foreach($result as $row){
			$idEmploye=$_POST['idemployer'];
			$date1=strtr($_POST['date'],'/','-');
			$nom = $_POST['nom'];
			 $prenom = $_POST['prenom'];
			 $select1=$_POST['select1'.$idEmploye];
			 $select2=$_POST['select2'.$idEmploye];
			 $select3=$_POST['select3'.$idEmploye];
			 $select4=$_POST['select4'.$idEmploye];
			 $select5=$_POST['select5'.$idEmploye];
			 $select6=$_POST['select6'.$idEmploye];
			 $select7=$_POST['select7'.$idEmploye];
			 $select8=$_POST['select8'.$idEmploye];
			 $select9=$_POST['select9'.$idEmploye];
			 $select10=$_POST['select10'.$idEmploye];
			 $select11=$_POST['select11'.$idEmploye];
			 $select12=$_POST['select12'.$idEmploye];
			 $select13=$_POST['select13'.$idEmploye];
			 $select14=$_POST['select14'.$idEmploye];
			 $idService=1;
			 $idchef1=1;
			 $idchef2=1;
			
			 $pdo_statement = $pdo_conn->prepare("insert into listservice(idemployer,date,day1M,day1E,
					day2M,day2E,day3M,day3E,day4M,day4E,day5M,day5E,day6M,day6E,
					day7M,day7E,idchefsection,idchefservice)
					 values(?,
					 '$date1','$select1','$select2','$select3','$select4','$select5','$select6','$select7','$select8',
					 
					'$select9','$select10','$select11','$select12','$select13','$select14',1,1)");
				$pdo_statement->bindParam(1,$row["idemployer"]);

					$pdo_statement->execute();
					$succes='succes';

				}
				


			

		
		
		 

		 
			}
			
			header("Location:indexAdmin3.php?date=$date1&succes=$succes");

} 

?>