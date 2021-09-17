<?php
try{
	$bdd=new PDO('mysql:host=localhost;dbname=ssa;charset=utf8','root','');
}
catch (Exception $e){
die('ERREUR: '.$e->getMessage());
}
$n=$_POST['matricule'];
$req = $bdd->prepare('SELECT * FROM abonne WHERE matricule= :matricule');
$req->execute(array(
	'matricule'=>$n,
));
$nom="";
while ($donnees=$req->fetch()) {
$nom=$donnees['nom'];

}
if (empty($nom)) {



$req = $bdd->prepare('INSERT INTO abonne( matricule, nom, prenom, email, telephone)values(:matricule,:nom,:prenom,:email,:telephone)');
$req->execute(array(
	'matricule'=>$_POST['matricule'],
	'nom'=>$_POST['nom'],
	'prenom'=>$_POST['prenom'],
	'email'=>$_POST['email'],
    'telephone'=>$_POST['telephone']
));
   echo "abonné bien ajouté cher utilisateur" ;


?>
<br>
	<a href="aceuil.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php

if (isset($_POST['Ajouter']))
{
if (!empty($_POST['matricule'])AND  !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND  !empty($_POST['telephone']) )
if($req){
	echo" <br><br>Vous avez ajouter un nouveau abonn&eacute; a votre bibliotheque  <br><br>";
	?>
	<a href="aceuil.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php
}
else {
	echo" il ya une erreur ! <br><br>";
}
}



}
else{

echo 'L\'abonn&eacute;   ' . $nom .   '   existe deja avec le matricule que vous avez entré ,changez le matricule svp   ';
?>   <br><br>
	<a href="ajoutEtud.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php

}

  ?>
