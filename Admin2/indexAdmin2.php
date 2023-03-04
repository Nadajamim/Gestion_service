<?php
    include ('../db.php');
    session_start();
    if(empty($_SESSION["login"]) || empty($_SESSION["password"])) 
    {
    header("Location:../Authentification/authentification.php");
     } 
 $resultname="";
      $user=$_SESSION["login"];
      $role=$_SESSION["role"];
      $genre=$_SESSION["sexe"];

      
      if($genre=="M"){ $resultname="Monsieur ".$user;}
      if($genre=="F"){ $resultname="Madame ".$user;}
          
    //reseption des variables 
   
        $objetdate=date('Y-m-d');

    $fordate2=date('d-m-Y',strtotime($objetdate));
    $fordate1=date('Y-m-d',strtotime($objetdate));
 
 // Vérifie si la date a été soumise

  
$date_saisie_formattee = date('Y-m-d', strtotime($objetdate));

// Trouve le premier jour de la semaine de la date saisie
$premier_jour_semaine = date('Y-m-d', strtotime('monday this week', strtotime($date_saisie_formattee)));

// Calcule la date de fin de la semaine de la date saisie
$dernier_jour_semaine = date('Y-m-d', strtotime('sunday this week', strtotime($date_saisie_formattee)));

// Affiche la semaine de la date saisie

///////////////////////////////////////////////
// Récupérer la date courante

// Récupérer le numéro de semaine
$num_semaine = date('W', strtotime($fordate1));

// Récupérer le jour et le mois du lundi de la semaine courante
$lundi_courant = date('Y-m-d', strtotime('monday this week', strtotime($fordate1)));
$jour_lundi = date('d-M', strtotime($lundi_courant));

// Récupérer le jour et le mois du mardi de la semaine courante
$mardi_courant = date('Y-m-d', strtotime('tuesday this week', strtotime($fordate1)));
$jour_mardi = date('d-M', strtotime($mardi_courant));

// Récupérer le jour et le mois du mercredi de la semaine courante
$mercredi_courant = date('Y-m-d', strtotime('wednesday this week', strtotime($fordate1)));
$jour_mercredi = date('d-M', strtotime($mercredi_courant));

// Récupérer le jour et le mois du jeudi de la semaine courante
$jeudi_courant = date('Y-m-d', strtotime('thursday this week', strtotime($fordate1)));
$jour_jeudi = date('d-M', strtotime($jeudi_courant));


// Récupérer le jour et le mois du vendredi de la semaine courante
$vendredi_courant = date('Y-m-d', strtotime('friday this week', strtotime($fordate1)));
$jour_vendredi = date('d-M', strtotime($vendredi_courant));

// Récupérer le jour et le mois du samedi de la semaine courante
$samedi_courant = date('Y-m-d', strtotime('saturday this week', strtotime($fordate1)));
$jour_samedi = date('d-M', strtotime($samedi_courant));

// Récupérer le jour et le mois du dimanche de la semaine courante
$dimanche_courant = date('Y-m-d', strtotime('sunday this week', strtotime($fordate1)));
$jour_dimanche = date('d-M', strtotime($dimanche_courant));

// Afficher la semaine en cours par jour et mois

      
    
       

	//selection d'année


  $pdo_statement = $pdo_conn->prepare("SELECT distinct * FROM vacation ");
	$pdo_statement->execute();
	$vacation = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
 
  $pdo_statement = $pdo_conn->prepare("SELECT idemployer,nom,prenom FROM employer WHERE idService = 2 order by idemployer ASC");
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);	
  
  $pdo_statement = $pdo_conn->prepare("SELECT distinct * FROM listservice  order by idemployer ASC");
	$pdo_statement->execute();
	$resultab = $pdo_statement->fetchAll(PDO::FETCH_ASSOC); 



	

/////////////////////////////////////////////////////////////////////


?>

				

<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-ios.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    html, body, h1, h2, h3, h4, h5,h6 {font-family: "Open Sans", sans-serif};
   
    </style>
    <!-- style imprimer -->
    <style type="text/css" media="print">
      #lol {
       visibility: hidden;   }
     .print-only {
      visibility: visible; /* montre seulement la partie à imprimer */
      display: block;
      margin: 0 auto;
      max-width: 742px;
      font-size: 14px;
      line-height: 1.5;
                 }
      body {
      margin: 0;
      padding: 0;
    }
      </style>
        
    <!-- style imprimer -->



    <title>Service</title>
</head>
<body>


  <div id="lol">

<div class="w3-sidebar w3-ios-orange w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-larger"
  onclick="w3_close()"> &times;</button>
  <a href="indexAdmin2.php" class="w3-bar-item w3-button"><i class="fa fa-home fa-2x"></i><span style="color:white;padding-left:30px;font-size:30px;">Accueil</span></a>

 

  <a class="w3-bar-item w3-button" href="index.php">
    <i class="fa fa-sign-out fa-2x " id="log_out">
  <span style="color:white;padding-left:24px;font-size:30px;">Plannning</span>    </i>
  </a>



<a href="#" class="w3-bar-item w3-button">
 <i class="fa fa-user fa-2x" id="user">
<span id="name"><?=$resultname?></span>
</i>
</a>
              
  <a class="w3-bar-item w3-button" href="../deconexion.php">
    <i class="fa fa-sign-out fa-2x " id="log_out">
  <span style="color:white;padding-left:24px;font-size:30px;">Déconnecter</span>    </i>
  </a>
        
</div>

<div id="main">

  <div class=" w3-ios-orange">
  <button id="openNav" class="w3-button w3-ios-orange w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">  
 
    
  </div>
</div>
   


</div>
  
<!-- contenu fueille -->
<form method="POST" action="options2.php">             
  <div style="margin-top:-40px; margin-left:450px;">                    
  <div style="display:inline " >
  <input type="date" name="date" id="date" min='2022-09-03' hidden class="date" required value=<?= $fordate1?>>
  </div>
 
  </div>
<div class="print-only" id="med">
<div class="w3-container">
<header>
  <div class="container-fluid mt-3">
  
    <div class="row">
      <div >
        <h6 style="text-decoration: underline;text-align: start;" >
        DEVISION TECHNIQUE NAVIGATION
          <br>
          SERVICE EQUIPEMENTS AEROGARE
          <br>
          SECTION ELECTRONIQUE
          <br>
          SERVICE TELECOMS/INFORMATIQUE
          <br>
          </h6>
      </div>
      <div style="text-align: center;" >
        <img src="./images/logo.png" alt="logo">
      </div>
      <div style="text-align:end;" >
        RAK09/E/021/01
      </div>
    </div>
  </div>
 </header>


<caption>
  <div class="container-fluid mt-3">
    <div class="row">
      <div  class="col-sm-12 p-12 ">
        <h6 style="text-align: center; text-transform: capitalize;">
          tableau de service 
          <br>
         <?php 
          
          echo "Semaine du ".$premier_jour_semaine." au ".$dernier_jour_semaine; ?><br> 
          

        </h6>
      </div>

    </div>
    
  </div>
  <div class="container-fluid">
    <div class="row">


    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
        <tr >
          <th >Matricule</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th><?= $jour_lundi  ?></th>
          <th><?= $jour_mardi?></th>
          <th><?= $jour_mercredi?></th>
          <th><?= $jour_jeudi?></th>
          <th><?= $jour_vendredi?></th>
          <th><?= $jour_samedi?></th>
          <th><?= $jour_dimanche?></th>
      
      </tr>
    
    </thead>
    <tbody>
    <?php //l'affichage du tableau d'absence
        foreach($result as $r) {
          $idemp=$r['idemployer'];
            
                ?>
                <input type="hidden" name="idemployer" value="<?php echo $r['idemployer'];?>"/>
               <input type="hidden" name="nom" value="<?php echo $r['nom'];?>"/>
               <input type="hidden" name="prenom" value="<?php echo $r['prenom'];?>"/>
        


               
               <tr class="tr">
             
               

                        <td rowspan="2"class="td"><?php echo $r['idemployer']?></td>
                        <td rowspan="2" class="td"><?php echo $r['nom']?></td>
                        <td rowspan="2" class="td"><?php echo $r['prenom']?></td>

                        <td class="td">
                        <select required  name="select1<?=$r['idemployer']?>"   id="idvacation"  >
                        <option value="" selected disabled>vacation</option>
                         <?php 
                         foreach($vacation as $row)
                           {
                              echo  " <option value='".$row['typevacation']."'>".$row['typevacation']."</option>";
                            }
                            ?>
                        </select>
                        </td>

                        <td class="td"> 
                        <select required name="select2<?=$r['idemployer']?>"  >

                         <option value="" selected  disabled>vacation</option>
                         <?php //l'affichage du selection des vacation
                         foreach($vacation as $row)
                           {
                              echo  " <option   value='".$row['typevacation']."'>".$row['typevacation']."</option>";
                            }
                            ?>
                        </select>
                        </td>


                        
                        <td class="td"> 
                      
                        <select required  id="idvacation"  name="select3<?=$r['idemployer']?>" >

                         <option value=""  selected disabled>vacation</option>
                         <?php //l'affichage du selection des vacation
                         foreach($vacation as $row)
                           {
                              echo  " <option   value='".$row['typevacation']."'>".$row['typevacation']."</option>";
                            }
                            ?>
                               </select>
                        </td>


                       
                        <td class="td">
                         <select required id="idvacation" name="select4<?=$r['idemployer']?>" >

                         <option value="" selected   disabled>vacation</option>
                         <?php //l'affichage du selection des vacation
                         foreach($vacation as $row)
                           {
                              echo  " <option   value='".$row['typevacation']."'>".$row['typevacation']."</option>";
                            }
                            ?>
                               </select>
                        </td>


                       
                        <td class="td"> 
                          <select required id="idvacation"  name="select5<?=$r['idemployer']?>" >

                         <option value="" selected   disabled>vacation</option>
                         <?php //l'affichage du selection des vacation
                         foreach($vacation as $row)
                           {
                              echo  " <option value='".$row['typevacation']."'>".$row['typevacation']."</option>";
                            }
                            ?>
                         </select>
                        </td>


                        
                        <td class="td"> 
                        <select required id="idvacation" name="select6<?=$r['idemployer']?>"  >

                         <option value="" selected  disabled>vacation</option>
                         <?php //l'affichage du selection des vacation
                         foreach($vacation as $row)
                           {
                              echo  " <option value='".$row['typevacation']."'>".$row['typevacation']."</option>";
                            }
                            ?>
                               </select>
                        </td>

                       
                        <td class="td">
                        <select required id="idvacation" name="select7<?=$r['idemployer']?>" >

                         <option value="" selected   disabled>vacation</option>
                         <?php //l'affichage du selection des vacation
                         foreach($vacation as $row)
                           {
                              echo  " <option   value='".$row['typevacation']."'>".$row['typevacation']."</option>";
                            }
                            ?>
                        </select>
                        </td>




                        </tr>

                        <tr>      

                

           

                        
                        <td class="td">
                        <select required id="idvacation" name="select8<?=$r['idemployer']?>" >

                         <option value="" selected  disabled>vacation</option>
                         <?php //l'affichage du selection des vacation
                         foreach($vacation as $row)
                           {
                              echo  " <option  value='".$row['typevacation']."'>".$row['typevacation']."</option>";
                            }
                            ?>
                          </select>
                        </td>


                        
                        <td class="td">
                        <select  required id="idvacation" name="select9<?=$r['idemployer']?>" >

                         <option value=""  selected disabled>vacation</option>
                         <?php //l'affichage du selection des vacation
                         foreach($vacation as $row)
                           {
                              echo  " <option  value='".$row['typevacation']."'>".$row['typevacation']."</option>";
                            }
                            ?>
                        </select>
                        </td>



                        <td class="td">
                        <select required id="idvacation"name="select10<?=$r['idemployer']?>" >

                         <option value=""selected   disabled>vacation</option>
                         <?php //l'affichage du selection des vacation
                         foreach($vacation as $row)
                           {
                              echo  " <option  value='".$row['typevacation']."'>".$row['typevacation']."</option>";
                            }
                            ?>
                        </select>
                        </td>


                        <td class="td">
                        <select required id="idvacation" name="select11<?=$r['idemployer']?>" >

                         <option value=""  selected disabled>vacation</option>
                         <?php //l'affichage du selection des vacation
                         foreach($vacation as $row)
                           {
                              echo  " <option  value='".$row['typevacation']."'>".$row['typevacation']."</option>";
                            }
                            ?>
                        </select>
                        </td>


                        <td class="td">
                        <select required id="idvacation" name="select12<?=$r['idemployer']?>" >

                         <option value="" selected  disabled>vacation</option>
                         <?php //l'affichage du selection des vacation
                         foreach($vacation as $row)
                           {
                              echo  " <option  value='".$row['typevacation']."'>".$row['typevacation']."</option>";
                            }
                            ?>
                          </select>
                        </td>


                        <td class="td">
                           <select required  id="idvacation" name="select13<?=$r['idemployer']?>" >

                         <option value=""  selected  disabled>vacation</option>
                         <?php //l'affichage du selection des vacation
                         foreach($vacation as $row)
                           {
                              echo  " <option   value='".$row['typevacation']."'>".$row['typevacation']."</option>";
                            }
                            ?>
                               </select>
                        </td>


                        <td class="td">
                       <select  required id="idvacation" name="select14<?=$r['idemployer']?>" >

                         <option value="" selected disabled >vacation</option>
                         <?php //l'affichage du selection des vacation
                         foreach($vacation as $row)
                           {
                              echo  " <option  value='".$row['typevacation']."'>".$row['typevacation']."</option>";
                            }
                            ?>
                        </select>
                        </td>

                        </tr>

                        <?php  }  ?>



    </tbody>
        </table>
        <input type="submit" value="Enregistrer" id="Btn_Valider" name="Enregistrer">
        <?php

function frm_entry_update($succes)
{
  if(isset($_GET['succes']) && ($_GET['succes']==="succes")){
    ?>
   <script>
     jQuery(document).ready(function($){
      alert("<?php echo $succes;?>");
       });
    </script>
  
      <?php
      }
}
frm_entry_update("planing est bien saisie");
?>
        </form>
 
    </div>
    <div class="col-12">
      <div style="float: right;"> M.Erroudi , M.Darnag et M.Faiz sont autorisés à effectuer des heures supplémentaires</div>
    </div>

  </div>
  <div>
    <br>
    <br>
    <br>
    <br>
    
  </div>
  <div class="row">
    <div class="table-responsive">
      <table style="text-align: center;" class="table-borderless  " >
        <tr>
          <td>
            
          </td>
          <td>

          </td>
          <td>


          </td>
        </tr>
        
</div>
  </div>
<!-- contenu fueille -->


</caption>


</div>

</div>






<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
  document.getElementById('med'.style.width='70%')
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>
</body>
</html>
