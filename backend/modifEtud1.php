<?php
$info=null;
$code=null;
try
{
      $connect = new PDO('mysql:host=localhost;dbname=ssa;charset=utf8', 'root', '');
  }
  catch(Exeption $exp)
{
  die('Erreur : '.$exp->getMessage());
  }

$n=$_POST['reference'];
$req = $connect->prepare('SELECT * FROM docement WHERE reference= :reference');
$req->execute(array(
	'reference'=>$n,
));
$titre=$auteur="";
while ($donnees=$req->fetch()) {
$titre=$donnees['titre'];
$auteur=$donnees['auteur'];
}

if (!empty($titre) || !empty($auteur)) {

    if(isset($_POST['suivant'])){



    $code=$_POST['reference'];
    $result = $connect->prepare('select * from docement where reference=?' );
    $result->execute(array($code ));
  //  if($result)

       $info=$result->fetch(PDO::FETCH_ASSOC);


   }

 if(isset($_POST['modifier'])){
   echo "Vous Avez Bien Modifier Le Document ";
     ?>
<br>
	<a href="aceuil.html"><img src=RETOUR.png width="50" height="50"> </a>
<?php
     echo "<script type=\"text/javascript\">  if (confirm('Vous confirmez?')){" ;
		       $titre=$_POST['titre'];
           $auteur=$_POST['auteur'];
           $edition=$_POST['edition'];
           $anne=$_POST['anne'];
           $reference=$_POST['reference'];

        $sql = "UPDATE docement SET titre=:titre, auteur=:auteur, edition=:edition, anne=:anne WHERE  reference=:reference";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":auteur", $auteur, PDO::PARAM_STR);
        $stmt->bindValue(":edition", $edition, PDO::PARAM_STR);
        $stmt->bindValue(":anne", $anne, PDO::PARAM_STR);
        $stmt->bindValue(":reference", $reference, PDO::PARAM_STR);
        $stmt->execute();

		   $req = $connect->exec('UPDATE  abonne SET titre=$titre,auteur=$auteur,edition=$edition,anne=$anne
                                 WHERE reference=$reference ');


	   }
	   elseif(isset($_POST['retour']))
	   {
	      header("Location:aceuil.html");
	   }

    $connect=null;
?>

 <html>
 <head>
 <title>Modifiez Information:        </title>
 </head>
 <body style="background-color: green; padding: 0px; margin: 0px;">

<center>
<div  style=" background-color: white; margin-left: 10%;margin-right: 10%;border: 2 solid white; margin-top: 3%;
               border-radius: 4px;  margin-bottom:25%; height:90%;">
                             <img alt="" src="logo.png" style=" height: 100px; width: 100px; border-radius: 50ex; margin-left: 3%;margin-top: 5ex;">


       <form role="form" method="POST" actoin="">
       <fieldset>
           <legend><b>Modifiez ce que vous voullez : </b></legend>
           <table>
           <tr><td>R&eacute;f&eacute;rence : </td><td><input type= "text" name="reference" required   value="<?php echo $info['reference']?>"/> </td></tr>
           <tr><td>titre : </td><td><input type="text"  name="titre"  maxlength="30" required  pattern="[a-zA-Z0-9\s]+" title="entre des lettre seulement" value="<?php echo $info['titre']?>"/> </td></tr>
           <tr><td>auteur : </td><td><input type="text" name="auteur" required="entre des lettre seulement" pattern="[A-Za-z '-]+$" title="entre des lettre seulement"  maxlength="30" required value="<?php echo $info['auteur']?>"/></td></tr>

    	     <tr><td>edition :</td><td><input type= "text" name= "edition" required pattern="[A-Za-z '-]+$" title="entre des lettre seulement" value="<?php echo $info['edition']?>" /> </td><br></tr>
           <tr><td>ann&eacute;e :</td><td><input type= "number" required name= "anne" pattern="[0-9]" title="entre des chiffre seulement " value="<?php echo $info['anne']?>" /> </td><br></tr>

      <br><br><br> <td><input     type= "reset" value= "Annuler"   style=" border-radius:2px; margin-left: 10px;border: none;
        box-shadow:10px 10px 10px rgba(0,0,0,0.1); size: 50px;  background-color:green; color: white;text-align: center; height: 42px;width: 50%;  " />
<input type="submit" value="modifier"  name="modifier" style=" border-radius:2px; margin-left: 10px;border: none;
        box-shadow:10px 10px 10px rgba(0,0,0,0.1); size: 50px;  background-color:green; color: white;text-align: center;  height: 42px;width: 50%;"/>
               <br>
	<a href="aceuil.html"> <img src=RETOUR.png width="50" height="50"> </a></td>


 </body>
</html>
<?php
}else{

    echo "Le document n'existe pas";
    ?>   <br><br>
	<a href="modifilivre.html"> <img src=RETOUR.png width="50" height="50"> </a>
<?php

}
    ?>
