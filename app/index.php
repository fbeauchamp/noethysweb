<?php
// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.class_path'       => __DIR__ . '/../vendor/Twig/lib',
   'twig.path'             => array(
       __DIR__ . '/../views',
       __DIR__ . '/../web/content'
   ),
   'twig.options'          => array(
       'charset'           => 'utf-8',
       'strict_variables'  => true
   )
));


$app->get('/', function () use ($app) {
  return $app['twig']->render('blog.twig', array(
        'name' => 'toto',
    ));
});
$app->get('/coordonnees', function () use ($app) {
  return $app['twig']->render('blog.twig', array(
        'name' => 'toto',
    ));
});
$app->run();
