<?php
require_once '../../twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../../app/view/templates');
$twig = new Twig_Environment($loader, array(
    'cache' => '../../app/view/compilation_cache',
));

require_once '../model/db-web.php';

$dbh = new DB_WEB();


?>
