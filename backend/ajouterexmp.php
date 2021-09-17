<?php
try{
$connect = new PDO('mysql:host=localhost;dbname=ssa;charset=utf8', 'root', '');
}
catch(Exeption $exp){
	  die('Erreur : '.$e->getMessage());
}





$n=$_POST['reference'];
$reqf = $connect->prepare('SELECT * FROM docement WHERE reference= :reference');
$reqf->execute(array(
	'reference'=>$n,
));
$titre="";
while ($donnees=$reqf->fetch()) {
$titre=$donnees['titre'];}
if (empty($titre)) {
echo "Le document n'existe pas";
    ?>   <br><br>
	<a href="ajouterexmp.html"> <img  width="50" height="50" src="RETOUR.png" </a>
<?php
}
else {

$m=$_POST['refexmp'];
$reqm= $connect->prepare('SELECT * FROM exomplaire where refexmp= :refexmp ');
$reqm->execute(array(
	'refexmp'=>$m,
));
$emplacement="";
$nbrexmp="";
while ($donnees=$reqm->fetch()) {
$emplacement=$donnees['emplacement'];}

if(empty($emplacement))
 {

$req = $connect->prepare('INSERT INTO exomplaire ( refexmp, refid, emplacement, etat, nbrexmp) VALUES( :refexmp, :refid, :emplacement, :etat, :nbrexmp)');
    $req->execute(array(
	'refexmp' =>$_POST['refexmp'],
    'refid' =>$_POST['reference'],
	'emplacement' =>$_POST['emplacement'],
    'etat' =>$_POST['etat'],
    'nbrexmp' =>$_POST['nbrexmp'],
	));



echo 'l\' cet exémplaire a été bien ajouté   '        .$_POST['emplacement'];
      ?>
           <br><br>
	<a href="aceuil.html"><img src="RETOUR.png" width="50" height="50"</a>
<?php

}else { echo " ce document a deja un nombre d'exomplaire que vous avez deja entrez, vous ne pouvez rien faire en attendant une mise a jour :" ;
        ?>
                   <br><br>
	<a href="ajouterexmp.html"><img src="RETOUR.png" width="50" height="50"</a>
<?php
    }


}


         ?>
