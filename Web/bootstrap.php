<?php
const DEFAULT_APP = 'Frontend';

if(!isset($_GET['app']) || !file_exists(__DIR__.'/../JVN/'.$_GET['app'])) $_GET['app'] = DEFAULT_APP;

require __DIR__.'/../lib/JVNFram/SplClassLoader.class.php';

$JVNFramLoader = new SplClassLoader('JVNFram', __DIR__.'/../lib');
$JVNFramLoader->register();

$jvnLoader = new SplClassLoader('JVN', __DIR__.'/..');
$jvnLoader->register();

$modelLoader = new SplClassLoader('Model', __DIR__.'/../lib/vendors');
$modelLoader->register();

$entityLoader = new SplClassLoader('Entity', __DIR__.'/../lib/vendors');
$entityLoader->register();

$jvnClass = 'JVN\\'.$_GET['app'].'\\'.$_GET['app'].'Application';
$app = new $jvnClass;
$app->run();