<?php
function debug($variable) {
		echo '<pre>' . print_r($variable, true) . '</pre>';
	}

function logged_only(){
	if(session_status() == PHP_SESSION_NONE)
{
	session_start();
}
	if(!isset($_SESSION['auth'])){
		$_SESSION['flash']['danger'] = "Vous n'êtes pas autorisé à accéder à cette page !";
		header('Location: connexion.php');
		exit();
	}
}

function reconnect_cookie(){
	
	if(session_status() == PHP_SESSION_NONE)
			{
				session_start();
			}
	if(isset($_COOKIE['remember']) && !isset($_SESSION['auth'])){
		require_once ('PDO.php');
		if(isset($pdo)) {
			global $pdo;
		}
		$_remember_token = $_COOKIE['remember'];
		explode('==, $remember_token');
		$pseudo_id = $parts[0];
		$req = $pdo->prepare('SELECT * FROM membres WHERE id = ?');
		$req->execute([$pseudo_id]);
		$pseudo = $req->fetch();
		
		if($pseudo){
			$expected = $pseudo_id . '//' . $pseudo->remember_token . sha1($pseudo->id . 'ratonslaveursdupok');
			if($expected == $remember_token){
		
			session_start();
			$_SESSION['auth'] = $pseudo;
			$_SESSION['flash']['success'] = "Vous êtes maintenant en ligne.";
			setcookie('remember', $remember_token, time() + 60 * 60 * 24 * 7);
			}
		}else {
			setcookie('remember', null, -1);
		}
	}else {
			setcookie('remember', null, -1);
		}
}