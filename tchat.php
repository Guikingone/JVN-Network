<?php
include ('inc/header.php');
require ('lib/autoload.class.php');
$db = DBFactory::getMysqlConnexionWithPDO();
$manager_tchat = new TchatManagerPDO($db);

if(isset($_POST['auteur'])){
  $chat = new Tchat([
    'auteur' => $_POST['auteur'],
    'message' => $_POST['message']
  ]);
  if(isset($_POST['id']))
  {
      $chat->setId($_POST['id']);
  }

  if ($chat->isValid())
  {
      $manager_tchat->save($chat);

      $message = $chat->isNew();
  }
}
?>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
    <form action="tchat.php" method="post">
      <label>
        <input class="form-control" type="text" name="auteur"/>
      </label>
      <label>
        <input class="form-control" type="text" name="message"/>
      </label>
      <button class="btn btn-danger" type="submit">Envoyer</button>
    </form>
    </div>
  </div>
</div>

<?php
while($donnees = $chat){
  echo '<p>' . $auteur . "</p>";
}
?>

<?php
include ('inc/footer.php');
?>
