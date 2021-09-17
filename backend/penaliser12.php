<?php
try{
$connect = new PDO('mysql:host=localhost;dbname=ssa;charset=utf8', 'root', '');
}
catch(Exeption $exp){
	  die('Erreur : '.$e->getMessage());
}

$n=$_POST['matricule'];
$req = $connect->prepare('SELECT * FROM abonne WHERE matricule= :matricule');
$req->execute(array(
	'matricule'=>$n,
));
$nom=$prenom="";
while ($donnees=$req->fetch()) {
$nom=$donnees['nom'];
$prenom=$donnees['prenom'];
}
if (empty($nom) || empty($prenom)) {
echo "L'abonn&eacute; n'existe pas";
    ?>   <br><br>
	<br><br><a href="penaliser.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php
}
else{


    $_POST['matricule'];


$req = $connect->prepare('INSERT INTO penaliser(idm) VALUES(:idm)');
$req->execute(array(
	'idm' => $_POST['matricule']

	));
echo 'l\' abonn&eacute; est bien p&eacute;nalisé   '        .$_POST['matricule'];
      ?>
           <br><br>
	<br><br><a href="aceuil.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php

}


?>
