<?php
session_start();
if(!isset($_SESSION['user'])){
header("Location:admin.php");	
}

?>

<html>


<head><link rel="stylesheet" media="all" href="code.css"></head>
    
<body>
    <form action="rechercherdocument.php" method="POST" style="margin-left:10% margin-top:10%  width: 10%;">
<select name="a" id="a" style="  box-shadow:10px 10px 10px rgba(0,0,0,0.1); size: 50px;  background-color:green; color: white;text-align: center;  height: 42px;width: 10%; ">
<option value="reference">R&eacute;f&eacute;rence</option>
	<option value="titre">Titre</option>
	<option value="auteur">Auteur</option>
</select>
<input type="text" name="b" id="b" required><br>
<input type="submit" name="Rechercher" value="chercher" style=" border-radius:2px; margin-left: 10px;border: none;
        box-shadow:10px 10px 10px rgba(0,0,0,0.1); size: 50px;  background-color:green; color: white;text-align: center;  height: 42px;width: 12%;">
<center><h1><u>Bienvenue au bibliotheque de TI </u></h1></center>
<center>
<div id="menu">

<ul>
        <li>
                <a href="#">abonne</a>
				 <ul>
				 <li><a href="ajoutEtud.html" target="f3"><img width="50" height="50" src="ajout.PNG" alt="Avatar" class="avatar">Ajouter abonne </a></li>
				 <li><a href="supprimerEtud.html" target="f3"><img width="50" height="50" src="sup.PNG" alt="Avatar" class="avatar"> Supprimer abonne  </a></li>
				 <li><a href="modifier12.html"><img width="50" height="50" src="modif.PNG" alt="Avatar" class="avatar"> Modifier abonne </a></li>
                      <li><a href="penaliser.html" target="f3"><img width="50" height="50" src="erreur.gif" alt="Avatar" class="avatar">Penalise abonne</a></li>
                             <li><a href="despa.html" target="f3"><img width="50" height="50" src="dep.PNG" alt="Avatar" class="avatar">Depenalise abonne</a></li>
				 </ul>
        </li>
</ul>
<ul>
        <li>
                <a href="#">docement</a>
                <ul>
                        <li><a href="ajouteENS.html" target="f3"><img width="50" height="50" src="ajt.jpg" alt="Avatar" class="avatar">Ajouter livre</a></li>
                        <li><a href="supprimerENS.html" target="f3">Supprimer livre</a></li>
						<li><a href="modifilivre.html" target="f3">Modifier livre </a></li>
                       <li><a href="expl.html" target="f3"><img width="50" height="50" src="ajt.jpg" alt="Avatar" class="avatar">Ajouter Exemplaire</a></li>
                     <li><a href="supexp.html" target="f3">Supprimer Exemplaire</a></li>
                </ul>
        </li> 
    
      <li>
                <a href="#">emprunt</a>
                <ul>
                        <li><a href="preter document.html" target="f3"><img width="50" height="50" src="ajt.jpg" alt="Avatar" class="avatar">Preter document </a></li>
                     <li><a href="retourner document.html" target="f3"><img width="50" height="50" src="ret.jpg"r alt="Avatar" class="avatar">Retourner document </a></li>
                        
                </ul>
        </li> 
    
</ul>
<a class="deconexion" href="page1.html">deconnexion</a>
</div></center><br>

<center><img src="lom.jpeg"/></center> 
</body>
</html>