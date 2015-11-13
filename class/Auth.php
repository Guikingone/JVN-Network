<?php
class Auth{
	
	private $pdo;
	
	public function __construct($pdo){
		$this->pdo = $pdo;
	}
	
	public function register($pseudo, $password, $email){
		$password = password_hash($password, PASSWORD_BCRYPT);
		$token = Str::random(60);
		$this->pdo->query("INSERT INTO membres SET pseudo = ?, password = ?, email = ?, confirmation_token = ?", $pseudo, $password, $email, $token]);
		
		$user_id = $this->pdo->lastInsertId();
		mail($email, "Confirmation de votre compte", "Afin de valider votre compte, merci de cliquer sur ce lien\n\n:http://localhost/JVN/Fichiers/confirm.php?id=$user_id&token=$token");
		
	}
	
	public function confirm($user_id, $token, $Session){
		
		$pseudo = $this->pdo->query('SELECT * FROM membres WHERE id = ?', [$user_id])->fetch();

	if ($user && $user->confirmation_token == $token){
		
		$this->pdo->query('UPDATE membres SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?', ([$user_id]));
		$Session->write('auth', $user);
		return true;
	}
	return false;
	}
}