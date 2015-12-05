<?php 
require '../../lib/autoload.class.php';

$pdo = new DBFactory;
$pdo::getMysqlConnexionWithPDO();
$req = $pdo->prepare('INSERT INTO chat (pseudo, message, date_ajout) VALUES (?, ?, NOW())');
$req->execute(array($_POST['pseudo'], $_POST['message']));
header('Location: ../../Commu.php');
exit();