<?php
try{
$connect = new PDO('mysql:host=localhost;dbname=ssa;charset=utf8', 'root', '');
}
catch(Exeption $exp){
	  die('Erreur : '.$e->getMessage());
}
	


$n=$_POST['refid'];
$req = $connect->prepare('SELECT * FROM exomplaire WHERE refid= :refid');
$req->execute(array(
	'refid'=>$n,
));
$nbrexp="";
$refid="";
while ($donnees1=$req->fetch()) {
$nbrexp=$donnees1['nbrexp'];
$refid=$donnees1['refid'];
}
    
    
$p=null;
$p=$_POST['idm'];
$reqe= $connect->prepare('SELECT * FROM penaliser WHERE idm= :idm');
$reqe->execute(array(
	'idm'=>$p,
));
$idm="";
while ($donnees2=$req->fetch()) {
$idm=$donnees2['idm'];

}


$z=$_POST['idabonne'];
$reqez= $connect->prepare('SELECT * FROM emprunt WHERE idabonne= :idabonne');
$reqez->execute(array(
'idabonne'=>$z,
));
$idemp="";
$nbremp="";
while ($donnees=$req->fetch()) {
$idemp=$donnees['idemp'];
$nbremp=$donnees['nbremp'];
    
}

if (!empty($nbrexp) && empty($idm) && empty($idemp)  && ( empty($nbremp) || !empty($nbremp) < 4) ){

    
    
    echo 'La\'r&eacute;f&eacute;rence a entre   ' . $refid . '  et le matricule est  '   . $z . '';
    
    ?>   <br><br>
<html>
    
<body>
<center>

<form action= "test1.php" method="post" class="exemple-pattern-css" >
<table><caption><h3>Ajouter nouveau abonn&eacute; : </h3></caption><br>
<tr>
<td>idemp :</td><td><input type= "number" name= "idemp" pattern="[0-9]" required > </td><br>
</tr>
<tr>
<td>idexmliv:</td> <td><input type="number" name="idexmliv" required pattern="[0-9]" > </td><br>
</tr>
<tr>
<td>idabonne :</td><td><input type= "number" name= " idabonne"    pattern="[0-9]" required /> </td><br>
</tr>
<tr>
<td>date_sortie :</td><td><input type= "date" name= "date_sortie" required > </td><br>
</tr>
<tr>
<td>date_rendu :</td><td><input type= "date" name= "date_rendu" required > </td><br>
</tr>
 <tr>
<td>nbremp :</td><td><input type= "number" name= "nbremp" pattern="[0-3]" required> </td><br>
</tr>
<tr><td>
    <a href="aceuil.html"> retourner et &agrave; la page pr&eacute;cedente !</a>
<input type= "reset" value= "Annuler"  >
    </td>
<td><input type="submit" value="Ajouter" /> </td>
</tr>
</table>
</form>
</center>

</body>
</html>
<?php   
}
else{

echo "soit l etudiant est penaliser ou ce livre n a pas d exomplaire ou vouz avez passer le numbre limiter ou cet emprent exist deja  donc vous pouvez pas l emprenter et merci  " ;
?>   <br><br>
	<a href="aceuil.html"> retourner et &agrave; la page pr&eacute;cedente !</a>
<?php
}
?> 
