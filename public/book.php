<?php
/**
 * Created by IntelliJ IDEA.
 * User: CARMINA
 * Date: 11/23/2018
 * Time: 10:41 PM
 */

require '../vendor/autoload.php';
require '../generated-conf/config.php';

//////////////////////
// Slim Setup
//////////////////////

$settings = ['displayErrorDetails' => true];

$app = new \Slim\App(['settings' => $settings]);

$container = $app->getContainer();
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('../templates');

    $basePath = rtrim(str_ireplace('index.php', '',
        $container->get('request')->getUri()->getBasePath()), '/');

    $view->addExtension(
        new Slim\Views\TwigExtension($container->get('router'), $basePath));

    return $view;
};

//////////////////////
// Routes
//////////////////////

// home page route
$app->get('/', function ($request, $response, $args) {
    $this->view->render($response, 'homepage.html');
    return $response;
});

//////////////////////
// AJAX Handlers
//////////////////////

$app->post('/login', function ($request, $response, $args) {

    $u = UserQuery::create()->filterByUserEmail($request->getParam("email"))->findOne();

    $data = null;
    $typedpword = $request->getParam("password");

    if ($u->login($typedpword)){
        $data = array('passwordMatched' => 'true', 'email' => $u->getUserEmail());
    } else {
        $data = array('passwordMatched' => 'false');
    }
    $newResponse = $response->withJson($data);
    return $newResponse;
});

$app->get('/storage', function ($request, $response, $args) {
    $storage = StorageQuery::create()->orderB()->find();
    $this->view->render($response, 'storage.html', [
        "storage" => $storage
    ]);

    return $response;
});
//////////////////////
// App run
//////////////////////

$app->run();
