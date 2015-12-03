<?php 

$pdo = new PDO('mysql:host=localhost;dbname=jvn-network', 'root', '');
            $req = $pdo->prepare('INSERT INTO chat (pseudo, message, date_ajout) VALUES (?, ?, NOW())');
            $req->execute(array($_POST['pseudo'], $_POST['message']));
            header('Location: ../../Commu.php');
            exit();