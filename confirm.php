<?php
require 'inc/pdo.php';
$user_id = $_GET['id'];
$token = $_GET['token'];
$req = $pdo->prepare('SELECT * FROM membres_jvn WHERE id = ?');
$req->execute([$user_id]);
$user = $req->fetch();
session_start();
if($user && $user_id->confirmation_token == $token){

    session_start();
    $pdo->prepare('UPDATE membres_jvn SET confirmation_token = NULL, confirmed_at = NOM() WHERE id = ?')->execute([$user_id]);
    $_SESSION['flash']['success'] = "Votre compte a bien été validé.";
    $_SESSION['auth'] = $user;
    header('Location: account.php');
   }
else {

    $_SESSION['flash']['danger'] = "Ce token n'est plus valide";
    header('Location: connexion.php');
    exit();
   }
?>
