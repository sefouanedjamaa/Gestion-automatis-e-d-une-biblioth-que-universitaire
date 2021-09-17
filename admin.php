<?php
   session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    

    <title>Etudiant</title>
  </head>
  <body>

    <?php
    try{
    $DB= new PDO('mysql:host=localhost;dbname=deliberation;charset=utf8','root','',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    }catch(Exception $e)
    {
    die('erreur :'.$e->getMessage());
    }

    ?>

    

    
      
    <div class="formulaire" >
      <form method="post" class="form" action="" >
      <table  cellspacing=10>
        <tr>
          <td><label for="nom">Identifiant :</label></td>
          <td><input type="text" name="nomad" placeholder="ex: ID" id="id"required></td>
        </tr>
        <tr>
          <td><label for="password">Password :</label></td>
          <td><input type="password" name="passwordad" placeholder="ex: PASSWORD" id="psw"required></td>
        </tr>
        <tr>
          <td></td><td align=center><button style="margin-right:20px;" type="submit" name="send" >Valider</button><button  >Retour</button></td>


        </tr>
      </table>


    </form>
    <?php

if(isset($_POST['nomad'],$_POST['passwordad']))
    {
      $id=$_POST['nomad'];$psw=$_POST['passwordad'];
      $res=$DB->query("SELECT User,Password FROM admin WHERE User='".$id."' and Password='".$psw."'");
      while($result=$res->fetch())
          {  if($result >0)
            $_SESSION['user'] = $id;
            header( "Location: aceuil.php" );
          }
          echo "<script>document.getElementById('id').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
          echo "<script>document.getElementById('psw').style.boxShadow = '0px 0px 2px 1px  red'; </script>";

}

    ?>
    

    </div>
 

  </body>
</html>

