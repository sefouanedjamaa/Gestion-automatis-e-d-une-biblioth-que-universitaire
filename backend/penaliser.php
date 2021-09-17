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
echo "L'abonné n'existe pas";
    ?>   <br><br>
	<a href="supprimerEtud.html"> retourner et &agrave; la page pr&eacute;cedente !</a>
<?php   
}
else{
$a = $connect->prepare('INSERT INTO abonne WHERE matricule= :matricule (etat)values( penaliser)');
$a->execute(array(
	'matricule'=>$n,
	
));
echo 'L\'abonné ' . $nom . ' ' . $prenom . ' a ete penaliser';
    ?>   <br><br>
	<a href="aceuil.html"> retourner et &agrave; la page pr&eacute;cedente !</a>
<?php   
}


?>

