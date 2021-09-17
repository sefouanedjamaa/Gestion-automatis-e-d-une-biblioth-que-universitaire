<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>






<head>
	<title>Bibliotheque NTIC</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>



<body style="background-color: green; padding: 0px; margin: 0px;">



<div  style=" background-color: white; margin-left: 20%;margin-right: 20%;border: 2 solid white; margin-top: 25ex;
             border-radius: 4px;  margin-bottom:25ex; height:75%;">
	
                  <center>
					<form action="verification.php" method="POST">
					<img alt="" src="uc logo.png" style=" height: 100px; width: 100px; border-radius: 50ex; margin-top: 5ex;">
					
							 <br><h1 style="text-align: center;">Connexion</h1>

							<br><label><b>Nom d'utilisateur</b></label>
							<input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required style="margin-left: 5px;width: 35%; height: 27px;  margin-left: 1%;">
<br>
							<br><label><b>Mot de passe</b></label>
							<input type="password" placeholder="Entrer le mot de passe" name="password" required  style="margin-left: 10px;width: 35%; height: 27px;  margin-left: 1%;">
<br>
							  <br><input     type= "reset" value= "Annuler"   style=" border-radius:2px; margin-left: 10px;border: none;
        box-shadow:10px 10px 10px rgba(0,0,0,0.1); size: 50px;  background-color:green; color: white;text-align: center; height: 42px;width: 12%;  " />
                        
                        <input type="submit" id='submit' value='LOGIN'  style=" border-radius:2px; margin-left: 10ex;border: none;
        box-shadow:10px 10px 10px rgba(0,0,0,0.1); size: 50px;  background-color:green; color: white;text-align: center;  height: 42px;width: 12%;"/> 
     
      <br> <a href="http://localhost/dodo/index.html"><img src=RETOUR.png width="50" height="50"> </a>
     
     
							<?php
							if(isset($_GET['erreur'])){
									$err = $_GET['erreur'];
									if($err==1 || $err==2)
											echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
							}
							?>
							<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				
				<div class="d-flex justify-content-center form_container">

				<div class="mt-4">
					
					
				</div>
			</div>
	  </div>
	</div>
</div>
					</form>
				</div>

			</center>
	
</body>
</html>
