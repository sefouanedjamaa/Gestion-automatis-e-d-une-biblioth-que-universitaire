<?php
try{
$connect = new PDO('mysql:host=localhost;dbname=ssa;charset=utf8', 'root', '');
}
catch(Exeption $exp){
	  die('Erreur : '.$e->getMessage());
}

$n=$_POST['idm'];
$req = $connect->prepare('SELECT * FROM penaliser WHERE idm= :idm');
$req->execute(array(
	'idm'=>$n,
));
$idm="";
while ($donnees=$req->fetch()) {
$idm=$donnees['idm'];

}
if (empty($idm)) {
echo "Le matricule n'existe pas";
    ?>   <br><br>
	<a href="despa.html"><img src="RETOUR.png" width="50" height="50"</a>
<?php
}
else{
$a = $connect->prepare('DELETE FROM penaliser WHERE idm= :idm');
$a->execute(array(
	'idm'=>$n,

));
echo 'L\'abonne  ' . $idm . ' a été bien dep&eacute;nalisé';
?>   <br><br>
	<a href="aceuil.html"><img src="RETOUR.png" width="50" height="50" </a>
<?php

}


?>
