<?php
try{
$connect = new PDO('mysql:host=localhost;dbname=ssa;charset=utf8', 'root', '');
}
catch(Exeption $exp){
	  die('Erreur : '.$e->getMessage());
}
$u=null;
$u=$_POST['reference'];
$n=$_POST['reference'];
$req = $connect->prepare('SELECT * FROM docement WHERE reference= :reference');
$req->execute(array(
	'reference'=>$n,
));
$titre="";
while ($donnees=$req->fetch()) {
$titre=$donnees['titre']; }

$reqe = $connect->prepare('SELECT * FROM exomplaire where refid= :refid ');
$reqe->execute(array(
	'refid'=>$u,
));
$nbrexp="";
while ($donnees=$req->fetch()) {
$nbrexp=$donnees['nbrexp'];
}

if(empty($nbrexp) && empty($titre)){
$_POST['reference'];
$e=$_POST['nbrexp'];
$req = $connect->prepare('INSERT INTO exomplaire(refid, nbrexp) VALUES(:refid, :nbrexp)');
$req->execute(array(
	'refid' => $_POST['reference'],
	'nbrexp' => $_POST['nbrexp']
	));
echo 'l\' exomplaire est bien ajoute   '        .$_POST['nbrexp'];
      ?>     
           <br><br>
	<a href="aceuil.html"> retourner et &agrave; la page pr&eacute;cedente !</a>
<?php 
    
}else {
    echo " cet docement a deja un nombre d exomplair vou pouver le modifier ici comme vous voullez :" ;
        ?>     
                   <br><br>
	<a href="mer.php"> retourner et &agrave; la page pr&eacute;cedente !</a>
<?php
}
?>