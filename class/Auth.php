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
	
	public function connectFromCookie(){
		
	}
}