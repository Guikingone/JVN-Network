<?php
    foreach($listeNews as $news){
?>
<h2><a href"news-<?= $news['id'] ?>.html"><?= $news['titre']?>></a></h2>
<?php
}