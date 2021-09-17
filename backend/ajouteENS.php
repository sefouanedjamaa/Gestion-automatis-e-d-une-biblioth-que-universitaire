<?php
try{
	$bdd=new PDO('mysql:host=localhost;dbname=ssa;charset=utf8','root','');
}
catch (Exception $e){
die('ERREUR: '.$e->getMessage());
}

$n=$_POST['reference'];
$req = $bdd->prepare('SELECT * FROM docement WHERE reference= :reference');
$req->execute(array(
	'reference'=>$n,
));
$titre="";
while ($donnees=$req->fetch()) {
$titre=$donnees['titre'];

}
if (empty($titre)) {



$req = $bdd->prepare('INSERT INTO docement( reference, titre, auteur, edition, anne)values(:reference,:titre,:auteur,:edition,:anne)');
$req->execute(array(
	'reference'=>$_POST['reference'],
	'titre'=>$_POST['titre'],
	'auteur'=>$_POST['auteur'],
	'edition'=>$_POST['edition'],
    'anne'=>$_POST['anne']
));
   echo "livre bien ajouté cher utilisateur" ;
    

?>
<br>
	<a href="aceuil.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php

if (isset($_POST['Ajouter']))
{
if (!empty($_POST['reference'])AND  !empty($_POST['titre']) AND !empty($_POST['auteur']) AND !empty($_POST['edition']) AND  !empty($_POST['anne']) )
if($req){
	echo" <br><br>Vous avez ajouté un nouveau livre a votre bibliotheque  <br><br>";
	?>
	 <br> <a href="aceuil.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php
}
else {
	echo" il ya une erreur ! <br><br>";
}
}



}
else{

echo 'Le\'document   ' . $titre .   '   existe deja avec la reference que vous avez entre change la reference svp   ';
?>   <br><br>
	 <br> <a href="ajouteENS.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php

}



  ?>
