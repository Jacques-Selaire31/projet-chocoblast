<?php 
?>
<html>
<h1> Bonjour <?= $_SESSION["firstname"] ?></h1>
<h3>Voici vos informations utilisateurs :</h3>
<ul>
    <li>Prenom : <?= $_SESSION["firstname"] ?></li>
    <li>Nom : <?= $_SESSION["lastname"] ?></li>
    <li>Pseudo : <?= $_SESSION["pseudo"] ?></li>
    <li>Email : <?= $_SESSION["email"] ?></li>
    <li>Status : <?= $_SESSION["status"] ?></li>
</ul>

</html>