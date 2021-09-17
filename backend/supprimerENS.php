<?php
try{
$connect = new PDO('mysql:host=localhost;dbname=ssa;charset=utf8', 'root', '');
}
catch(Exeption $exp){
	  die('Erreur : '.$e->getMessage());
}

$n=$_POST['reference'];
$req = $connect->prepare('SELECT * FROM docement WHERE reference= :reference');
$req->execute(array(
	'reference'=>$n,
));
$titre="";
while ($donnees=$req->fetch()) {
$titre=$donnees['titre'];

}
if (empty($titre)) {
echo "Le document n'existe pas";
    ?>   <br><br>
	<a href="aceuil.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php
}
else{
$a = $connect->prepare('DELETE FROM docement WHERE reference= :reference');
$a->execute(array(
	'reference'=>$n,

));
echo 'Le\'document  ' . $titre . ' a été bien supprimé';
?>   <br><br>
	<a href="aceuil.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php

}


?>
