<?php
// web/index.php
require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.class_path'       => __DIR__ . '/vendor/Twig/lib',
   'twig.path'             =>  __DIR__ . '/views',
   'twig.options'          => array(
       'charset'           => 'utf-8',
       'strict_variables'  => true
   )
));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'dbs.options' => array (
      'mysql' =>array(
            'driver'    => 'pdo_mysql',
            'host'      => 'localhost',
            'dbname'    => 'noethys_data',
            'user'      => 'root',
            'password'  => 'pwd',
            'charset'   => 'utf8mb4'
          )
    ),
));
$app->register(new Silex\Provider\SessionServiceProvider());
///print_r($app['db']->fetchAll('SELECT * FROM individus'));

$app->get('/', function () use ($app) {
  return $app['twig']->render('blog.twig', array(
        'name' => 'toto',
    ));
});
$app->get('/coordonnees', function () use ($app) {
  return $app['twig']->render('coordonnees.twig', array(
        'nb'=>sizeof($app['db']->fetchAll('SELECT * FROM individus'))
    ));
});
$app->run();
