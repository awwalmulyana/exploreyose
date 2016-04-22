<?php

require('../vendor/autoload.php');
require('../web/views/function.php');

use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('index.twig');
});

$app->get('/ping ', function() use($app) {

  	$response = new Response(json_encode(array('alive' => true)));
	$response->headers->set('Content-Type', 'application/json');
	//return $response;
	return $response;
});

$app->get('/astroport', function() use($app) {
  return $app['twig']->render('index.twig');
});

$app->get('/minesweeper ', function() use($app) {
  require('../web/views/minesweeper.php');

  return '';
});

$app->get('/primeFactors', function() use($app) {
  //return $app['twig']->render('minesweeper.twig');
    if(!isset($_GET['number'])){
        $response = "No numbers with assinged value in URL";
    }
    else{
        if(!intval($_GET['number'])){
            $calculation = calculation($_GET['number']);
            $response = new Response(json_encode(array('number' => $_GET['number'],'error' => 'not a number')));
            $response->headers->set('Content-Type', 'application/json');
        }
        else {
            $calculation = calculation($_GET['number']);
            $response = new Response(json_encode(array('number' => intval($_GET['number']),'decomposition' => $calculation)));
            $response->headers->set('Content-Type', 'application/json');
        }
    }
	//return $response;
    return $response;
});


$app->run();
