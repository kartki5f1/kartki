<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <style>
        *{
            background-color:#121212;
            color:white;
            font-size:50px;
            text-align:center;
        }
    </style>
    <title></title>
</head>
<body>

<?php

    $odbiorca=$_POST['mail-adres-odbiorcy'];
 
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';


	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;


	$mail = new PHPMailer();

	$mail->isSMTP();

	$mail->Host = "smtp.gmail.com";

	$mail->SMTPAuth = true;

	$mail->SMTPSecure = "tls";

	$mail->Port = "587";

	$mail->Username = "kartki5f1@gmail.com";

	$mail->Password = "lsyraovfhxnozzzc";

	$mail->Subject = "Dostałeś kartkę!";

    $mail->CharSet = "UTF-8";
    
	$mail->setFrom('kartki5f1@gmail.com');

	$mail->isHTML(true);

    $mail->AddAttachment($_FILES['zdjecie-kartki']['tmp_name'], $_FILES['zdjecie-kartki']['name']);

	$mail->Body = "<h1>Otrzymałeś kartkę, możesz zobaczyć ją w załączniku</h1>";

	$mail->addAddress($odbiorca);
        echo ' <script type="text/JavaScript">
         function zamknij(){
            window.close();
            }
            window.onload = function() {
            setTimeout(zamknij, 3000);
            }
            </script>
            ';
	if ( $mail->send() ) {
        echo"<p>Kartka została pomyślnie wysłana na maila!</p>";
	}else{
        echo "<p>Podczas wysyłania kartki na maila wystąpił błąd</p>"; 	
	}
 
	$mail->smtpClose();
?>

</body>

</html>