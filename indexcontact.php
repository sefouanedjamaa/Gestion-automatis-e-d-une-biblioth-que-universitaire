<?php
//Base de donn�e
if(!empty($_POST["send"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

	$connexion = mysqli_connect("localhost", "root", "", "ssa") or die("Erreur de connexion: " . mysqli_error($connexion));
	$result = mysqli_query($connexion, "INSERT INTO contact (name, email, subject, message) VALUES ('" . $name. "', '" . $email. "','" . $subject. "','" . $message. "')");
	if($result){
		$db_msg = "Vos informations de contact sont enregistres avec success.";
		$type_db_msg = "success";
	}else{
		$db_msg = "Erreur lors de la tentative d'enregistrement de contact.";
		$type_db_msg = "error";
	}

}
//l'envoie du mail
if(!empty($_POST["send"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

	$toEmail = "VotreAdresse@gmail.com";
	
}
?>

<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<link rel="stylesheet" href="contact.css" />
		<script type="text/javascript" src="contact.js"></script>
	</head>
	<body style="background-color: green;">

		<div id="box" >

		  <form id="form" enctype="multipart/form-data" onsubmit="return validate()" method="post" style="background-color: white; margin-left: 28%;">
		    <h3>Formulaire de contact</h3>
		    <label>Nom: <span>*</span></label>
		    <input type="text" required id="name" name="name" placeholder="Nom"/>
		    <label>Email: <span>*</span></label><span id="info" class="info"></span>
		    <input type="text" required id="email" name="email" placeholder="Email"/>
		    <label>Sujet: <span>*</span></label>
		    <input type="text" required id="subject" name="subject" placeholder="Demande de renseignement"/>
		    <label>Message:</label>
		    <textarea id="message" required name="message" placeholder="Message..."></textarea>
		    <input type="submit" name="send" value="Envoyer le message" style="background-color: green;"/>
			<div id="statusMessage">
            <?php if (! empty($db_msg)) { ?>
              <p class='<?php echo $type_db_msg; ?>Message'><?php echo $db_msg; ?></p>
            <?php } ?>
            <?php if (! empty($mail_msg)) { ?>
              <p class='<?php echo $type_mail_msg; ?>Message'><?php echo $mail_msg; ?></p>
            <?php } ?>
            </div>
		  </form>
		  </div>

	    </div>

	</body>
</html>
