<?php
try{
	$bdd=new PDO('mysql:host=localhost;dbname=bibliotheque;charset=utf8','root','');
}
catch (Exception $e){
die('ERREUR: '.$e->getMessage());
}
$req = $bdd->prepare('INSERT INTO abonn( Matricule,Nom, prénom, Email , Telephone )values(  :nom ,:prénom,  :Matricule , :Email , :Telephone )');
$req->execute(array(

	'Nom'=>$_POST['Nom'],
	'Prenom'=>$_POST['Prenom'],


	'Matricule'=>$_POST['Matricule'],
	'Email'=>$_POST['Email'],
	'Telephone'=>$_POST['Telephone']

));
echo "abonne ajoute";
  ?>
