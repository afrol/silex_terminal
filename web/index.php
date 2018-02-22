<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Autoloader
require __DIR__ . '/../vendor/autoload.php';

$config = require __DIR__ . '/../config/web.php';

var_dump('test'.time());


$test = new App\Models\Test();
$config = App\Config\Config::getInstance()->create($config);


$silexConfig = $config->getConfig('silex');
$app = new Silex\Application();
if (isset($silexConfig['debug'])) {
    $app['debug'] = $silexConfig['debug'];
}

$app->register(new Silex\Provider\DoctrineServiceProvider(), [
    'db.options' => [
        'driver' => 'pdo_mysql',
        'dbname' => $config->getConfig('db')['dbname'],
        'host' => $config->getConfig('db')['host'],
        'user' => $config->getConfig('db')['user'],
        'password' => $config->getConfig('db')['password'],
    ],
]);

var_dump($app['db']);

$id = 29;

$sql = "SELECT * FROM oc_product WHERE product_id = ?";
$post = $app['db']->fetchAssoc($sql, [(int) $id]);

var_dump($post);



$app->get('/?id={id}', function ($id) use ($app) {
    $sql = "SELECT * FROM oc_product WHERE product_id = ?";
    $post = $app['db']->fetchAssoc($sql, array((int) $id));

    return  "<h1>{$post['title']}</h1>".
    "<p>{$post['body']}</p>";
});





$blogPosts = array(
    1 => array(
        'date'      => '2011-03-29',
        'author'    => 'igorw',
        'title'     => 'Using Silex',
        'body'      => '...',
    ),
);

$app->get('/?r=blog&={id}', function (Silex\Application $app, $id) use ($blogPosts) {
    if (!isset($blogPosts[$id])) {
        $app->abort(404, "Post $id does not exist.");
    }

    $post = $blogPosts[$id];

    return  "<h1>{$post['title']}</h1>".
    "<p>{$post['body']}</p>";
});
