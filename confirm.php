<?php
require 'inc/bootstrap.php';
$pdo = App::getDatabase();

if (App::getAuth()->confirm($pdo, $_GET['id'], $_GET['token'], Session::getInstance())){

		$_SESSION::getInstance()->setFlash('success', "Votre compte est validé !");
		App::redirect('account.php');
	}
	else {
		$_SESSION::getInstance()->setFlash('danger', "Ce token n'est plus valide !");
		App::redirect('login.php');
	}