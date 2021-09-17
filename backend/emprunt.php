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
$nbrexmp="";
$refexmp="";
while ($donnees1=$req->fetch()) {
$refexmp=$donnees1['refexmp'];
}

$g=$_POST['matricule'];
$reqe= $connect->prepare('SELECT * FROM abonne WHERE matricule= :matricule');
$reqe->execute(array(
	'matricule'=>$g,
));
$pol="";
while ($donnees2=$reqe->fetch()) {
$pol=$donnees2['matricule'];

}


$p=$_POST['matricule'];
$reqe= $connect->prepare('SELECT * FROM penaliser WHERE idm= :idm');
$reqe->execute(array(
	'idm'=>$p,
));
$idm="";
while ($donnees2=$reqe->fetch()) {
$idm=$donnees2['idm'];

}
if (!empty($refexmp) && empty($idm) && !empty($pol) ){
    
$re = $connect->prepare('INSERT INTO emprunt ( refexmp, matricule, date_sortie, date_rendu)values(:refexmp,:matricule,:date_sortie,:date_rendu)');
$re->execute(array(
	'refexmp'=>$_POST['refexmp'],
	'matricule'=>$_POST['matricule'],
	'date_sortie'=>$_POST['date_sortie'],
	'date_rendu'=>$_POST['date_rendu'],

));
    
$y = $connect->prepare('UPDATE exomplaire SET 
            nbrexmp =nbrexmp-1
            WHERE refexmp = :refexmp');

$y->execute(array(
    'refexmp' => $_POST['refexmp']
));
    echo "vous avez bien assurez votre emprunte cher utilisateur " ;
    
    ?>   <br><br>
	<br><br><a href="aceuil.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php    
    
} 
else {

    echo"emprunt impossible assurez les information a remplire " ;
    
    ?>   <br><br>
	<br><br><a href="aceuil.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php    
    
}