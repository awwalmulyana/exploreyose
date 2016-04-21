<?php

require('../vendor/autoload.php');

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
  //return $app['twig']->render('minesweeper.twig');
    $test =  '<p id="title">Minesweeper</p><br>';
    $test .=  '<table border="1" width="300px" height="300px">';
for($i = 1; $i < 9; $i++){
    $test .= '<tr>';
    for($x = 1; $x < 9; $x++){
        $test .= '<td id="cell-'.$i.'x'.$x.'"></td>';
    }
    $test .= '</tr>';
}
$test .= '</table>';
return $test;
});


$app->run();
