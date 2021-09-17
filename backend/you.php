<?php
$info=null;
$code=null;
include "ajouterexmp.php"; 
$h=$_POST['nbrexmp'];
$req = $connect->prepare('SELECT * FROM exomplaire');
$req->execute(array(
	'nbrexmp'=>$h,
));
$refid="";
while ($donnees=$req->fetch()) {
$refid=$donnees['refid'];

}


if(empty($refid))
{ $reponse=$connect->query('SELECT * FROM exomplaire');
    $refid="";
while ($donnees=$req->fetch()) {
$refid=$donnees['refid'];

}$_POST['reference'];

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
 
}else { echo " cet docement a deja un nombre d exomplair vou pouver le modifier ici comme vous voullez :" ;
        
        
    }