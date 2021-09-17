   <?php

        
        $sql = "UPDATE exomplaire SET nbrexp=:nbrexp WHERE  refid=:refid" ;
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(":nbrexp", $nbrexp, PDO::PARAM_STR);
      
		   $meme = $connect->exec('UPDATE exomplaire SET nbrexp=$nbrexp WHERE refid=$refid ');
     

	   
    $connect=null;
?>

 <html>
 <head>
 <title>Modifiez Information:        </title>
 </head>
 <body>
       <form role="form" method="POST" actoin="">
       <fieldset>
           <legend><b>Modifiez ce que vous voullez : </b></legend>
           <table>
           <tr><td>nombre d exommplaire : </td><td><input type= "number" name="nbrexp" required   value="<?php echo $info['nbrexp']?>"/> </td></tr>
 </body>
</html>
        
