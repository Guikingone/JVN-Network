<?php 
$bdd = new PDO('mysql:host=localhost;dbname=jvn', 'root', '');
$req = $bdd->prepare('INSERT INTO tchat (pseudo, message) VALUES (?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));

// Redirection
header ('Location: ../Blog_inscrit.php');
?>