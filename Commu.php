<?php 
    require ('lib/autoload.class.php');
	include ("inc/header.php");
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Introduction -->
            <h1 class="text-center">Bienvenue dans la Communauté</h1>
            <p class="text-center">La communauté est VOTRE hub, ici, pas de faux-semblants, vous êtes libre et lâché complètement</p>
            <div class="row">
        <div class="col-lg-3 col-xs-6 col-sm-6">
            <!-- Tchat -->
            <h3 class="text-center">Il est là, tout beau, tout chaud, le tchat en temps réel !</h3>
            <form action="Commu.php" method="post">
                <label>Pseudo : 
                    <input class="form-control" type="text" name="pseudo"/>
                </label>
                <label>Message : 
                    <input class="form-control" type="text" name="message"/>
                </label>
                <button class="form-control" type="submit" value="Envoyer">Envoyer</button>
            </form>
            <?php
                $pdo = new PDO('mysql:host=localhost;dbname=jvn-network', 'root', '');
                $reponse = $pdo->query('SELECT pseudo, message FROM chat ORDER BY ID DESC LIMIT 0, 10');

                while($donnees = $reponse->fetch()){
                    echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong>: ' . htmlspecialchars($donnees['message']) . '</p>';
                }
                $reponse->closeCursor();

                $req = $pdo->prepare('INSERT INTO chat (pseudo, message) VALUES (?, ?)');
                $req->execute(array($_POST['pseudo'], $_POST['message']));
            ?>
        </div>
        <div class="col-lg-3">

        </div>
           </div>
        </div>
    </div>
</div>
<?php
    include ('inc/footer.php');
?>