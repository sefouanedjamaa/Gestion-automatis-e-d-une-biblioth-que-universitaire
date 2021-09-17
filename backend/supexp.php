<?php
try{
$connect = new PDO('mysql:host=localhost;dbname=ssa;charset=utf8', 'root', '');
}
catch(Exeption $exp){
	  die('Erreur : '.$e->getMessage());
}

$n=$_POST['refexmp'];
$req = $connect->prepare('SELECT * FROM exomplaire WHERE refexmp= :refexmp');
$req->execute(array(
	'refexmp'=>$n,
));
$nbrexp="";
while ($donnees=$req->fetch()) {
$nbrexmp=$donnees['nbrexmp'];}
if (empty($nbrexmp)) {
echo "Le document n'existe pas";
    ?>   <br><br>
	<a href="aceuil.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php
}
else{
$a= $connect->prepare('UPDATE exomplaire SET
            nbrexmp = nbrexmp - 1
            WHERE refexmp = :refexmp');

$a->execute(array(
    'refexmp' => $_POST['refexmp']
));
echo 'Le\'nombre  document  ' . $nbrexmp . ' a ete bien d&eacute;grade ';
?>   <br><br>
	<a href="aceuil.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php

}


?>
