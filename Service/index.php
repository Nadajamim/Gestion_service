<?php 
include('../db.php');
session_start();
  if(empty($_SESSION["login"]) || empty($_SESSION["password"])) 
 {
    header("Location:../Authentification/authentification.php");
 }
 $resultname="";
      $user=$_SESSION["login"];
      $role=$_SESSION["role"];
      $genre=$_SESSION["sexe"];


   
      if($role==="chef1" || $role==="Chef1"){
        header("Location:../Admin/indexAdmin.php");

       
      }
      else if($role==="chef2" || $role==="Chef2"){
        header("Location:../Admin2/indexAdmin2.php");
      }
      else if($role==="chef3" || $role==="Chef3"){
        header("Location:../Admin3/indexAdmin3.php");
      }
      {
        if($genre=="M"){ $result="Monsieur ".$user;}
        if($genre=="F"){ $result="Madame ".$user;}
          
      }
          
      
      
//selection des SERVICE

$pdo_statement = $pdo_conn->prepare("SELECT distinct * from service");
$pdo_statement->execute();
$service = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-ios.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    html, body, h1, h2, h3, h4, h5,h6 {font-family: "Open Sans", sans-serif}
    </style>
    <title>Service</title>
</head>
<body>

<div class="w3-sidebar w3-ios-orange w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-larger"
  onclick="w3_close()"> &times;</button>
  <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home fa-2x"></i><span style="color:white;padding-left:30px;font-size:30px;
">Accueil</span></a>

  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-search fa-2x"><span style="color:white;padding-left:30px;font-size:30px;
">Chercher</span></i></a>
  <a href="../imprimer/imprimer.php" class="w3-bar-item w3-button"><i class="fa fa-print fa-2x" aria-hidden="true">
  <span style="color:white;padding-left:24px;font-size:30px;
">Imprimer</span>
  </i>
</a>


<a href="#" class="w3-bar-item w3-button"> <i class="fa fa-user fa-2x" id="user">
<span id="name"><?=$resultname?></span>
</i></a>
              
  <a class="w3-bar-item w3-button" href="../deconexion.php">
                <i class="fa fa-sign-out fa-2x " id="log_out">
                <span style="color:white;padding-left:24px;font-size:30px;">Déconnecter</span>
                </i></a>
        
</div>

<div id="main">

<div class="w3-ios-orange">
  <button id="openNav" class="w3-button w3-ios-orange w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">




    </div>
  </div>
 
            <div class="w3-container">
            <form method="POST" action="options.php">
                
                <div style="margin-top: -40px; margin-left:450px;">    
                  <div style=" display:inline;margin-left:20px;" class="ul">
                     
                  
                  
                          <select id="idService" name="idService" >
  
                              <option value="" selected disabled>Service</option>
                              <?php //l'affichage du selection des Service
                                  foreach($service as $row)
                                  {
                                      echo  " <option ".$selected." value='".$row['idService']."'>".$row['nomService']."</option>";
                                  }
           ?>
                          </select>
                                </div>
                     
                     
                      <div style=" display:inline " ><input type="date" name="date" id="date" min='2022-09-03' class="date" required >
                                </div>
                      <div style=" display:inline" ><input type="submit" value="Valider" id="Btn_Valider" name="Valider"></div>
                      
                      </div>  
      </form>
            </div>

</body>
<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>

    
</html>