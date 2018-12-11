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
$app->get('/home-login', function ($request, $response, $args) {

    $this->view->render($response, 'index.html');
    return $response;
});

$app->post('/login', function ($request, $response, $args) {

    $u = UserQuery::create()->filterByEmail($request->getParam("email"))->findOne();

    $data = null;
    $typedpword = $request->getParam("password");

    if ($u->login($typedpword)) {
        $data = array('passwordMatched' => 'true', 'email' => $u->getEmail());
    } else {
        $data = array('passwordMatched' => 'false');
    }
    $newResponse = $response->withJson($data);
    return $newResponse;
});

$app->get('/storage', function ($request, $response, $args) {

    $storage = StorageQuery::create()->find();

    $product = ProductQuery::create()->find();
    $this->view->render($response, 'storage.html', [
        "product" => $product,
        "storage" => $storage
    ]);

    return $response;
});

$app->get('/book/{id}', function ($request, $response, $args) {

    $product = ProductQuery::create()->filterById($args['id']);
    $this->view->render($response, 'book.html', [
        "product" => $product,
    ]);

    return $response;
});

$app->get('/home', function ($request, $response, $args) {


    $this->view->render($response, 'home.html');

    return $response;
});

$app->get('/create/book', function ($request, $response, $args) {


    $this->view->render($response, 'create-book.html');

    return $response;
});

$app->post('/create/book', function ($request, $response, $args) {
    $title = $request->getParam("title");
    $author = $request->getParam("author");
    $edition = $request->getParam("edition");
    $isbn10 = $request->getParam("isbn10");
    $isbn13 = $request->getParam("isbn13");
    $publisher = $request->getParam("publisher");
    $price = $request->getParam("price");
    $image = $request->getParam("image");
    $quantity = $request->getParam("quantity");

    $product = new Product();
    $product->setTitle($title);
    $product->setAuthor($author);
    $product->setEdition($edition);
    $product->setIsbn10($isbn10);
    $product->setIsbn13($isbn13);
    $product->setPublisher($publisher);
    $product->setPrice($price);
    $product->setImageUrl($image);
    $product->save();

    $lastId = $product->getId();

    $s = StorageQuery::create()->filterByProductId($lastId)->findOne();
    $s->setCount($quantity);
    $s->save();

    $data = array('title' => $product->getTitle());
    $newResponse = $response->withJson($data);
    return $newResponse;
});

$app->get('/create/account', function ($request, $response, $args) {


    $this->view->render($response, 'create-account.html');

    return $response;
});

$app->post('/create/account', function ($request, $response, $args) {

    $role = $request->getParam("role");
    $first=$request->getParam("first_name");
    $last = $request->getParam("last_name");
    $email = $request->getParam("email");
    $password = $request->getParam("password");

    $user = new User();
    $user->setEmail($email);
    $user->setPasswordHash($password);
    $user->setStatus($role);
    $user->save();

    $lastId = $user->getId();

    $profile = InfoQuery::create()->filterByUserId($lastId)->findOne();
    $profile->setFirstName($first);
    $profile->setLastName($last);
    $profile->save();

    $data = array('email' => $user->getEmail(), 'first_name' => $profile->getFirstName(), 'last_name' =>$profile->getLastName() );
    $newResponse = $response->withJson($data);
    return $newResponse;
});

$app->get('/users', function ($request, $response, $args) {

    $user = UserQuery::create()->find();

    $info = InfoQuery::create()->find();

    $this->view->render($response, 'users.html', [
        "user" => $user,
        "info" => $info
    ]);

    return $response;
});
//////////////////////
// App run
//////////////////////

$app->run();
