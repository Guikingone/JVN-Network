<?php
require ('inc/functions.php');

if(isset($_POST['pseudo']) && isset($_POST['message'])){
    mail('soutien_technique@jvn_network.fr', "Demande de soutien technique", $_POST['message']);
    $_SESSION['flash']['success'] = "Votre demande a bien été transmise au service technique";
    header('Location: account.php');
    exit();
}else {
    $_SESSION['flash']['danger'] = "Oups, il semble y avoir un soucis dans votre demande, merci de vérifier votre message/pseudo.";
}