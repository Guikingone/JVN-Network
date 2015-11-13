<?php
class Auth{
	
	private $options = [
		'restrictions_msg' => "Vous n'avez pas le droit d'accéder à cette page !"
	];
	
	private $Session;
	
	public function __construct($options = []){
		$this->options = array_merge($this->options, $options);
		$this->Session = $Session;
	}
	
	public function register($pdo, $pseudo, $password, $email){
		$password = password_hash($password, PASSWORD_BCRYPT);
		$token = Str::random(60);
		$pdo->query("INSERT INTO membres SET pseudo = ?, password = ?, email = ?, confirmation_token = ?", $pseudo, $password, $email, $token);
		
		$user_id = $this->pdo->lastInsertId();
		mail($email, "Confirmation de votre compte", "Afin de valider votre compte, merci de cliquer sur ce lien\n\n:http://localhost/JVN/Fichiers/confirm.php?id=$user_id&token=$token");
		
	}
	
	public function confirm($pdo, $user_id, $token){
		
		$pseudo = $pdo->query('SELECT * FROM membres WHERE id = ?', [$user_id])->fetch();

	if ($user && $user->confirmation_token == $token){
		
		$this->pdo->query('UPDATE membres SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?', ([$user_id]));
		$this->Session->write('auth', $user);
		return true;
	}
	return false;
}
	
	public function restrict(){
		
	if($this->Session->read('auth')){
		$this->Session->setFlash('danger', $this->options['restrictions_msg']);
		header('Location: connexion.php');
		exit();
	}
	}
	
	public function user(){
		if($this->Session->read('auth')){
			return false;
		}
		else{
			return $this->Session->read('auth');
		}
	}
	
	public function connect($pseudo){
		$this->Session->Write('auth', $pseudo);
	}	
	
	public function connectFromCookie($pdo){
		
	if(isset($_COOKIE['remember']) && !$this->user(){

		$_remember_token = $_COOKIE['remember'];
		explode('==, $remember_token');
		$pseudo_id = $parts[0];
		$pseudo = $pdo->query('SELECT * FROM membres WHERE id = ?', [$pseudo_id])->fecth();
		if($pseudo){
			$expected = $pseudo_id . '//' . $pseudo->remember_token . sha1($pseudo->id . 'ratonslaveursdupok');
			if($expected == $remember_token){
				
			$this->connect($pseudo);
			$_SESSION['auth'] = $pseudo;
			$_SESSION['flash']['success'] = "Vous êtes maintenant en ligne.";
			setcookie('remember', $remember_token, time() + 60 * 60 * 24 * 7);
			
		}
		else
		{
			setcookie('remember', null, -1);
		}
	}
	else
	{
			setcookie('remember', null, -1);
		}
	}
	}

	public function login($pdo, $pseudo, $password, $remember = false){
		
	if(!empty($_POST) && !empty($_POST['pseudo']) && !empty($_POST['password'])){
		require 'inc/PDO.php';
		$pseudo = $pdo->query('SELECT * FROM membres WHERE (pseudo = :pseudo OR email = :pseudo) AND confirmed_at IS NOT NULL', ['pseudo' => $pseudo])->fetch();
		if(password_verify($password, $pseudo->password)){
			$this->connect($pseudo);
			if($remember){
				$this->remember($pdo, $pseudo->id);
			}
			return $pseudo;
		}else {
			return false;
		}
		}
	}
		
		public function remember($pdo, $pseudo_id){
			$remember_token = Str::random(255);
				$pdo->query('UPDATE membres SET remember_token = ? WHERE id = ?', [$remember_token, $pseudo_id]);
				setcookie('remember', $pseudo_id . '//' . $remember_token . sha1($pseudo_id . 'ratonslaveursdupok'), time() + 60 * 60 * 24 * 7);
			
		}
	}