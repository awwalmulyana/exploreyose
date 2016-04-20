<?php

require('../vendor/autoload.php');

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
  $data = array( 'alive' => 'true');
   //$response->headers->set('Content-Type', 'application/json');
	//return $response;
	return json_encode($data);
});

$app->get('/minesweeper ', function() use($app) {
  return $app['twig']->render('minesweeper.twig');
});


$app->run();
