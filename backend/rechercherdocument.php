<?php
try{
	$bdd=new PDO('mysql:host=localhost;dbname=ssa;charset=utf8','root','');
}
catch (Exception $e){
die('ERREUR: '.$e->getMessage());
}
echo "<title>Rechercher un docement</title><center><link rel=\"stylesheet\" type=\"text/css\" href=\"style2.css\">";
$x=$_POST['a'];
if ($x=='reference') {
	$req = $bdd->prepare('SELECT * FROM docement WHERE reference= :reference');
$req->execute(array(
	'reference'=>$_POST['b'],
));
	$req = $bdd->prepare('SELECT * FROM docement WHERE reference= :reference');
$req->execute(array(
	'reference'=>$_POST['b'],
));
}elseif ($x=='titre') {
		$req = $bdd->prepare('SELECT * FROM docement WHERE titre= :titre');
$req->execute(array(
	'titre'=>$_POST['b'],
));
}elseif ($x=='auteur') {
		$req = $bdd->prepare('SELECT * FROM docement WHERE auteur= :auteur');
$req->execute(array(
	'auteur'=>$_POST['b'],
));
}
$nbr=$req->rowCount();
if ($nbr==0) {

    ?>
<body style="background-color: green; padding: 0px; margin: 0px;">
<div  style=" background-color: white; margin-left: 10%;margin-right: 10%;border: 2 solid white; margin-top: 25ex;
             border-radius: 4px;  margin-bottom:25ex; height:90%;">
              <img alt="" src="logo.png" style=" height: 100px; width: 100px; border-radius: 50ex; margin-left: 3%;margin-top: 5ex;">
    <br> <a href="aceuil.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php
    echo "<h3>Aucun document trouvé<h3><br>";
}else{
   ?>
    <style>
    table{
    border-style:solid;
     border-color:green;
        border-width:10px;
    }</style>
<body style="background-color: green; padding: 0px; margin: 0px;">
<div  style=" background-color: white; margin-left: 10%;margin-right: 10%;border: 2 solid white; margin-top: 25ex;
             border-radius: 4px;  margin-bottom:25ex; height:90%;">
              <img alt="" src="logo.png" style=" height: 100px; width: 100px; border-radius: 50ex; margin-left: 3%;margin-top: 5ex;">
    <br> <a href="aceuil.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php
echo'<table border=1  >';
echo '<tr>';
	echo '<th> Référence </th>';
	echo '<th> Titre </th>';
	echo '<th> Auteur </th>';
    echo '<th> Edition </th>';
    echo '<th> Annee </th>';
echo'</tr>';
while ($donnees=$req->fetch()) {
	$re=$donnees['reference'];

		$reqb = $bdd->prepare('SELECT * FROM emprunt WHERE reference= :reference');
$reqb->execute(array(
	'reference'=>$re,
));
$nbrb=$reqb->rowCount();

	echo '<tr>';
	echo '<td>'.$re.'</td>';
	echo '<td>'.$donnees['titre'].'</td>';
	echo '<td>'.$donnees['auteur'].'</td>';
    echo '<td>'.$donnees['edition'].'</td>';
    echo '<td>'.$donnees['anne'].'</td>';
	echo'</tr>';
}
echo'</table>';
}

?>
