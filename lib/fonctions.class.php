<?php 
class fonctions {

    protected $variable;
    protected $length;
    protected $alphabet = "0123456789azertyuiopmlkjhgfdsqwxcvbnAZERTYUIOPMLKJHGFDSQWXCVBN";

    public function debug($variable){
        echo '<pre>' . print_r($variable, true) . '</pre>';
    }
    
    public function str_random($length){
        substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }

    public function logged_only(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        if(!isset($_SESSION['auth'])){
            $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
            header('Location: connexion.php');
            exit();
        }
    }

    public function reconnect_cookie(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        if(isset($_COOKIE['remember']) && !isset($_SESSION['auth'])){
            require_once ('inc/Pdo.php');
            if(!isset($pdo)){
                global $pdo;
            }
            $remember_token = $_COOKIE['remember'];
            $parts = $explode('==', $remember_token);
            $user_id = $parts(0);
            $req = $pdo->prepare('SELECT * FROM membres_jvn WHERE id = ?');
            $req->execute([$user_id]);
            $user = $req->fecth();
            if($user){
                $expected = $user_id . '==' . $user->remember_token . sha1($user_id . 'ratonlaveursdudimanchematinchezlessioux');
                if($expected == $remember_token){
                    session_start();
                    $_SESSION['auth'] = $user;
                    setcookie('remember', $remember_token, time() + 60 * 60 * 24 * 7);
                }else {
                    setcookie('remember', null, -1);
                }
            }else {
                setcookie('remember', null, -1);
            }
        }
    }
}