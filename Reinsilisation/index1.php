<?php
include('../../db.php');
?>
<?php
$erreur="";
    use PHPMailer\PHPMailer\PHPMailer;
    function sendmail($too,$pass){
        $name = "Gestion Service";  
        $to = $too; 
        $subject = "Code De Securite";
        $body = "Bonjour,\n Votre code de Sécurité pour réinitialiser votre mot de passe est : $pass";
        $from = "problemtest4@gmail.com";  
        $password = "astgpzjxmuaujbrp"; 
       

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        $mail = new PHPMailer();

        
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;
        $mail->Port = 587;  
        $mail->SMTPSecure = "tls"; 
        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]);

      
        $mail->isHTML(true);
        $mail->setFrom($from, $name);
        $mail->addAddress($to); 
        $mail->Subject = ("$subject");
        $mail->Body = $body;
        if ($mail->send()) {
            echo "Email is sent!";
        } else {
            echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
    }



       

 if($_SERVER['REQUEST_METHOD']=='POST')
 {
	if(isset($_POST["sendmail"]) && isset($_POST['username'])) 
	{
        
        

		$pdo_statement = $pdo_conn->prepare("SELECT * FROM compte where login =?");
		$pdo_statement->bindParam(1, $_POST["username"]);
		$pdo_statement->execute();
		$result = $pdo_statement->fetch();	
        
		if(empty($result))
		{
			$erreur="Aucun utilisateur trouvé !";
		}
        else
        {       session_start();
                $email=$result['email'];
                $pass = rand(000000,999999);
                $_SESSION["code"]=$pass;
                $_SESSION["email"]=$email;
                sendmail($email,$pass);
                header("Location:index2.php?");
            
        }
        
	}
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reinsilisation</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
   

</head>
<body>
    <div class="main">
        <section>
            <form method="POST">
                <h1>Réinitialisation</h1>
                <div class="middle">
                    <p>
                    Entrez votre nom d'utilisateur, et nous vous enverrons un code de sécurité pour récupérer votre compte.
                    </p>
                    <br/>
                    <div class="input-box">
                    <input type="text" id="inp" name="username" placeholder="NOM D'UTILISATEUR" required />
                    </div>
                </div>
                <div id="erreur"><?php echo $erreur; ?></div>

              <div class="buttom">
                <input type="submit" id="btn" name="sendmail" value="Envoyer un code sécurité">

                </div>
            </form>
        </section>
    </div>
</body>
</html>
