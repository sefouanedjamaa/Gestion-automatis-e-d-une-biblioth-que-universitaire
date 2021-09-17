<?php
try{
$connect = new PDO('mysql:host=localhost;dbname=ssa;charset=utf8', 'root', '');
}
catch(Exeption $exp){
	  die('Erreur : '.$e->getMessage());
}

$p=$_POST['matricule'];
$n=$_POST['refexmp'];
$req = $connect->prepare('SELECT * FROM emprunt WHERE refexmp= :refexmp AND matricule= :matricule');
$req->execute(array(
	'refexmp'=>$n,
    'matricule'=>$p
));

$refexmp="";
$m="";
$matricule="";
while ($donnees1=$req->fetch()) {
$refexmp=$donnees1['refexmp'];
$m=$donnees1['date_rendu'];
$matricule=$donnees1['matricule'];

}
if( !empty($refexmp)  && !empty($matricule) ){
$b = $connect->prepare('DELETE FROM emprunt WHERE refexmp= :refexmp AND  matricule= :matricule ');
$b->execute(array(
	'refexmp'=>$n,
     'matricule'=>$p
));


$d = $connect->prepare('UPDATE exomplaire SET
            nbrexmp = nbrexmp + 1
            WHERE refexmp = :refexmp');

$d->execute(array(
    'refexmp' => $_POST['refexmp']
   
));

echo 'Le\'document doit &eacute;tre retourner le ' . $m . ' est bien returner .
si l etudiant a depasser la date plusieurs fois vous douver le penaliser  ';

    ?>   <br><br>
	<br><br><a href="aceuil.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php

}else {

echo "souyez sur de votre information que vous avez entre ch&eacute;r utilisateur ";
?>   <br><br>
<br><br><a href="retourner%20document.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php
}
