<?php
try{
	$bdd=new PDO('mysql:host=localhost;dbname=ssa;charset=utf8','root','');
}
catch (Exception $e){
die('ERREUR: '.$e->getMessage());
}
$req = $bdd->prepare('INSERT INTO emprunt(idemp, idexmliv, idabonne, date_sortie, date_rendu, nbremp) VALUES(:idemp, :idexmliv, :idabonne, :date_sortie, :date_rendu, :nbremp)');
$req->execute(array(
	'idemp' => $_POST['idemp'],
	'idexmliv' => $_POST['idexmliv'],
	'idabonne' => $_POST['idabonne'],
	'date_sortie' => $_POST['date_sortie'],
	'date_rendu' => $_POST['date_rendu'],
    'nbremp' => $_POST['nbremp'],
	));if (isset($_POST['Ajouter']))

if (!empty($_POST['idemp'])AND  !empty($_POST['idexmliv']) AND !empty($_POST['idabonne']) AND !empty($_POST['date_sortie']) AND  !empty($_POST['date_rendu']) AND
!empty($_POST['nbremp'])){
	
    echo" <br><br>Vous avez ajouter un nouveau Etudiant <br><br>";
}
