<?php
/* This Action for Ajax ? */
include('../db.php');
if (isset($_POST['idService']) ) {
   $annee=$_POST["idService"];
   $result1 = $pdo_conn->prepare("SELECT distinct S.nomService,l.idService from service l ,listservice S  where l.idService=S.idService AND l.idService ='$annee'");
   $result1->execute();
   $service = $result1->fetchAll(PDO::FETCH_ASSOC);
    
   echo '<option value="" disabled="" selected="">Nom service</option>';
    foreach ($service as $row) {
           echo  "<option value='" . $row['idService'] . "'>" . $row['nomService'] . "</option>";
    }   
}


?>