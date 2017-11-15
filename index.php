<?php

require_once 'twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('application/view/templates');
$twig = new Twig_Environment($loader, array(
    'cache' => 'application/view/compilation_cache',
));

echo $twig->render('index.html', array());


?>
