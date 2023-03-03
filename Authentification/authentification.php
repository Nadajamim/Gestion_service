<html lang="en">
<head>
   <?php  
include ('../db.php');
?>
<?php
$erreur='';
session_start();

if($_SERVER["REQUEST_METHOD"]=='POST'){
	
    if(isset($_POST['connect'])){
        if (preg_match("/^[A-Z][a-z]+(\s)*$/",$_POST['login'])) {
            if(isset($_POST['login']) and isset($_POST['password'])){
                $sql='SELECT  * from compte where login=? AND password=? limit 1';
                $pdo_statement=$pdo_conn->prepare($sql);
                $pdo_statement->bindParam(1,$_POST['login']);
                $pdo_statement->bindParam(2,$_POST['password']);
                $pdo_statement->execute();
                $result=$pdo_statement->fetch(PDO::FETCH_ASSOC);
                $n=$pdo_statement->rowCount();
                if(empty($_POST['login']) or empty($_POST['password']))
                {
                    $erreur=' Tous Les champs sont obligatoires';
                }
                else
                {
                    if ($n!=0)
                    {
                        $_SESSION["login"]=$_POST['login'];
                        $_SESSION["password"]=$_POST['password'];
                        $_SESSION["sexe"]=$result['sexe'];
                        $_SESSION["role"]=$result['role'];
                        
                            header("Location:../Service/index.php"); 
                        }
                       
                    
                    else
                    {
                        $erreur="Le nom d'utilisateur ou le mot de passe est incorrect ";
                    }            
                }
                
            }
          }
          else {  $erreur=" Le nom d'utilisateur ou le mot de passe est incorrect ";}
		
	}
	
	
}

?> 
    <title>Authentification</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme9.css">
    <link rel="icon" href="../images/logo_ofppt.png" type="image/icon type">
    <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<form method='post'>
<div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3>Welcome to us !</h3>
                    <p> Have a nice day .</p>
                    <img src="images/graphic5.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside">
                            <a href="index.html">
                                <div class="">
                                    <img class="logo-size" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="page-links">
                            <a href="login9.html" class="active">Login</a><a href="register9.html">Register</a>
                        </div>
                        <form>
                            <input class="form-control" type="text" name="login" placeholder="E-mail Address" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" name='connect'class="ibtn">Login</button> <a href="./Reinsilisation/index1.php">Forget password?</a>
                            </div>
                        </form>
                        <div style='color:red'>
                            <?php echo $erreur?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</form>
</body>
</html>
