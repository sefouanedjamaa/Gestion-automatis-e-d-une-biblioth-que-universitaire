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

$n=$_POST['matricule'];
$req = $connect->prepare('SELECT * FROM abonne WHERE matricule= :matricule');
$req->execute(array(
	'matricule'=>$n,
));
$nom="";
while ($donnees=$req->fetch()) {
$nom=$donnees['nom'];
}
if (!empty($nom)) {

    if(isset($_POST['suivant'])){



    $code=$_POST['matricule'];
    $result = $connect->prepare('select * from abonne where matricule=?' );
    $result->execute(array($code ));
  //  if($result)

       $info=$result->fetch(PDO::FETCH_ASSOC);


   }

 if(isset($_POST['modifier'])){
   echo "Vous Avez Bien Modifier le abonn&eacute;  ";
     ?>
<br>
	<a href="aceuil.html"> <img src=RETOUR.png width="50" height="50"> </a></td>
<?php
     echo "<script type=\"text/javascript\">  if (confirm('Vous confirmez?')){" ;
		       $nom=$_POST['nom'];
           $prenom=$_POST['prenom'];
           $email=$_POST['email'];
           $telephone=$_POST['telephone'];
           $matricule=$_POST['matricule'];

        $sql = "UPDATE abonne SET nom=:nom, prenom=:prenom, email=:email, telephone=:telephone WHERE  matricule=:matricule";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":telephone", $telephone, PDO::PARAM_STR);
        $stmt->bindValue(":matricule", $matricule, PDO::PARAM_STR);
        $stmt->execute();

		   $req = $connect->exec('UPDATE  abonne SET nom=$nom,prenom=$prenom,email=$email,telephone=$telephone
                                 WHERE matricule=$matricule ');
     

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

<h3>Modifier Abonn&eacute;</h3>
       <form role="form" method="POST" actoin="">
      
           <table>
           <tr><td>matricule : </td><td><input type= "number" name="matricule" required   value="<?php echo $info['matricule']?>"/> </td></tr>
           <tr><td>nom : </td><td><input type="text"  name="nom"  maxlength="30" required value="<?php echo $info['nom']?>"/> </td></tr>
           <tr><td>pr&eacute;nom : </td><td><input type="text" name="prenom"  maxlength="30" required value="<?php echo $info['prenom']?>"/></td></tr>

    	     <tr><td>email :</td><td><input type= "text" name= "email" required value="<?php echo $info['email']?>" /> </td><br></tr>
           <tr><td>telephone :</td><td><input type= "number" required name= "telephone" value="<?php echo $info['telephone']?>" /> </td><br></tr>
<td><br><input     type= "reset" value= "Annuler"   style=" border-radius:2px; margin-left: 10px;border: none;
        box-shadow:10px 10px 10px rgba(0,0,0,0.1); size: 50px;  background-color:green; color: white;text-align: center; height: 42px;width: 50%;  " />
    <br>
<input type="submit" value="modifier"  name="modifier" style=" border-radius:2px; margin-left: 10px;border: none;
        box-shadow:10px 10px 10px rgba(0,0,0,0.1); size: 50px;  background-color:green; color: white;text-align: center;  height: 42px;width: 50%;"/>
               <br>
	<a href="aceuil.html"> <img src=RETOUR.png width="50" height="50"> </a></td>



 </body>
</html>
<?php               
}else{
    
    echo "L'abonn&eacute; n'existe pas";
    ?>   <br><br>
	<a href="modifier12.html"> <img src=RETOUR.png width="50" height="50"> </a></td>
<?php   
    
}
    ?>