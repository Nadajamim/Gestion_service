<?php
/* This Action for Ajax ? */
include('../db.php');
if (isset($_POST['idvacation']) ) {
    $annee=$_POST["idvacation"];
   $result1 = $pdo_conn->prepare("SELECT distinct idvacation,typevacation from vacation where idvacation='$annee' ");
   $result1->execute();
   $service = $result1->fetchAll(PDO::FETCH_ASSOC);
    
   echo '<option value="" disabled="" selected="">vacation</option>';
    foreach ($service as $row) {
           echo  "<option value='" . $row['idvacation'] . "'>" . $row['typevacation'] . "</option>";
    }   

}

?>