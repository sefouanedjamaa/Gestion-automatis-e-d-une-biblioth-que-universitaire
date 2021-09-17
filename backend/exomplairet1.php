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
$titre=$donnees['titre'];}
    
   if (empty($titre)) {
echo "Le document n'existe pas";
    ?>   <br><br>
	<a href="ajouterexmp.html"> retourner et &agrave; la page pr&eacute;cedente !</a>
<?php    
} 
   else {
$m=$_POST['refid'];
$reqm = $connect->prepare('SELECT * FROM exomplaire WHERE refid= :refid');
$req->execute(array(
	'reference'=>$n,
));
$nbrexp="";
while ($donnees=$req->fetch()) {
$nbrexp=$donnees['nbrexp'];}
            if (empty($nbrexp)) {
                
    $_POST['reference'];

$e=$_POST['nbrexp'];
$reqh = $connect->prepare('INSERT INTO exomplaire(refid, nbrexp) VALUES(:refid, :nbrexp)');
$reqh->execute(array(
	'refid' => $_POST['reference'],
	'nbrexp' => $_POST['nbrexp']
	));
echo 'l\' exomplaire est bien ajoute   '        .$_POST['nbrexp'];
      ?>     
           <br><br>
	<a href="aceuil.html"> retourner et &agrave; la page pr&eacute;cedente !</a>
<?php 
                
                
            }else{
            echo "Le document existe deja avec un nombre d exomplaire que vous avve entre deja vous ne pouvez pas ajoute jusqua en a un moyen pour devloper notre application merci " ;
            }
    
    
}
     ?>