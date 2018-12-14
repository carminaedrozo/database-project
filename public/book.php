<?php
/**
 * Created by IntelliJ IDEA.
 * User: CARMINA EDROZO
 * Date: 11/23/2018
 * Time: 10:41 PM
 */

require '../vendor/autoload.php';
require '../generated-conf/config.php';

session_cache_limiter(false);
session_start();

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
    $p = InfoQuery::create()->filterByUserId($u->getId())->findOne();
    $data = null;
    $typedpword = $request->getParam("password");

    if ($u->login($typedpword)) {
        $_SESSION['user'] = $p->getFirstName();
        $_SESSION['role'] = $u->getStatus();
        $_SESSION['user_id'] = $u->getId();
        $data = array('passwordMatched' => 'true', 'email' => $_SESSION['user'],);
    } else {
        $data = array('passwordMatched' => 'false');
    }
    $newResponse = $response->withJson($data);
    return $newResponse;
});

$app->get('/storage', function ($request, $response, $args) {


    if (isset($_GET["sort"])) {
        $val = $_GET["sort"];
        if ($val == "stock_asc") {
            $storage = StorageQuery::create()->orderByCount()->find();
        } else if ($val == "stock_desc") {
            $storage = StorageQuery::create()->orderByCount('desc')->find();
        }
    } else {
        $storage = StorageQuery::create()->find();
    }

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

    if ($_SESSION['role'] == "Admin") {
        $this->view->render($response, 'home.html', [
            "data" => $_SESSION
        ]);
    } else if ($_SESSION['role'] == "Employee") {
        $product = ProductQuery::create()->find();

        $this->view->render($response, 'home-users.html', [
            "data" => $_SESSION
        ]);
    }

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
    $first = $request->getParam("first_name");
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

    $data = array('email' => $user->getEmail(), 'first_name' => $profile->getFirstName(), 'last_name' => $profile->getLastName());
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

$app->get('/users/{id}', function ($request, $response, $args) {

    $user = InfoQuery::create()->filterByUserId($args['id']);
    $this->view->render($response, 'user-profile.html', [
        "user" => $user
    ]);

    return $response;
});
$app->get('/logout', function ($request, $response, $args) {

    session_destroy();
    $this->view->render($response, 'homepage.html');
    return $response;
});

$app->get('/publishers', function ($request, $response, $args) {
    $publisher = PublisherQuery::create()->find();
    $this->view->render($response, 'publishers.html', [
        "publisher" => $publisher
    ]);

    return $response;
});
$app->get('/publisher/{id}', function ($request, $response, $args) {
    $publisher = PublisherQuery::create()->filterById($args['id']);

    $this->view->render($response, 'publisher-info.html', [
        "publisher" => $publisher
    ]);

    return $response;
});
$app->get('/request', function ($request, $response, $args) {

    $cart = CartQuery::create()->filterByUserId($_SESSION["user_id"]);
    $product = ProductQuery::create()->find();
    $this->view->render($response, 'request-employee.html', [
        "cart" => $cart,
        "product" => $product
    ]);
    return $response;
});
$app->post('/cart/{id}', function ($request, $response, $args) {

    $cart_check = CartQuery::create()->filterByStatus("Pending")->filterByUserId($_SESSION["user_id"])->findOneByProductId($args['id']);
    $cart_count_check = CartQuery::create()->filterByProductId($args['id'])->filterByStatus("Pending")->count();
    if ($cart_count_check >= 1) {
        $quantity_added = $_POST["quantity"];
        $current_quantity = $cart_check->getQuantity();
        $cart_check->setQuantity($quantity_added + $current_quantity);
        $cart_check->save();

        $cart_check->setTotalPrice($cart_check->getPrice() * $cart_check->getQuantity());
        $cart_check->save();
    } else {
        $prod_price = ProductQuery::create()->findOneById($args['id']);
        $quantity = $_POST["quantity"];
        $c = new Cart();
        $c->setProductId($args['id']);
        $c->setPrice($prod_price->getPrice());
        $c->setQuantity($quantity);
        $c->setUserId($_SESSION["user_id"]);
        $c->save();
        $c->setTotalPrice($c->getPrice() * $c->getQuantity());
        $c->save();
    }

    $cart = CartQuery::create()->filterByUserId($_SESSION["user_id"])->filterByStatus("Pending");
    $product = ProductQuery::create()->find();
    $this->view->render($response, 'cart.html', [
        "cart" => $cart,
        "product" => $product
    ]);
});

$app->get('/cart', function ($request, $response, $args) {

    $cart = CartQuery::create()->filterByUserId($_SESSION["user_id"])->filterByStatus("Pending")->find();
    $product = ProductQuery::create()->find();


    $this->view->render($response, 'cart.html', [
        "cart" => $cart,
        "product" => $product
    ]);
});

$app->post('/sub/req', function ($request, $response, $args) {

    $t = time();
    $n = new Requestslist();
    $n->setUserId($_SESSION["user_id"]);
    $n->setDateRequested(date("Y-m-d", $t));
    $n->setDateCompleted(null);
    $n->setTotal(0);
    $n->setStatusId(1);
    $n->save();

    CartQuery::create()
        ->filterByUserId($_SESSION["user_id"])
        ->filterByStatus("Pending")
        ->update(array('Status' => 'Submitted', 'Requestid' => $n->getId()));

    $cart = CartQuery::create()->filterByUserId($_SESSION["user_id"])->filterByStatus("Pending");
    $product = ProductQuery::create()->find();
    $this->view->render($response, 'cart.html', [
        "cart" => $cart,
        "product" => $product
    ]);
    return $response;

});


$app->get('/create/order', function ($request, $response, $args) {

    $publisher = PublisherQuery::create()->find();
    $this->view->render($response, 'create-order.html', [
        "publisher" => $publisher
    ]);
    return $response;
});
$app->post('/create/order', function ($request, $response, $args) {
    $title = $request->getParam("title");
    $quantity = $request->getParam("quantity");

    $o = new Orderlist();
    $o->setTitle($title);
    $o->setQuantity($quantity);
    $o->setStatus(1);
    $o->save();

    $data = array('orderid' => $o->getId());
    $newResponse = $response->withJson($data);
    return $newResponse;
});
$app->get('/requests', function ($request, $response, $args) {

    $r = RequestslistQuery::create()->find();
    $s = RequeststatusQuery::create()->find();
    $u = UserQuery::create()->find();
    $this->view->render($response, 'requests.html', [
        "requests" => $r,
        "stat" => $s,
        "user" => $u

    ]);
    return $response;
});


$app->get('/request/{id}', function ($request, $response, $args) {


    $r = RequestslistQuery::create()->filterById($args["id"]);
    $c = CartQuery::create()->filterByRequestid($args["id"])->findOne();
    $s = RequeststatusQuery::create()->find();
    $p = ProductQuery::create()->find();
    $u = UserQuery::create()->find();
    $this->view->render($response, 'request-info.html', [
        "requests" => $r,
        "stats" => $s,
        "user" => $u,
        "cart" => $c,
        "product" => $p
    ]);
    return $response;
});
$app->get('/orders', function ($request, $response, $args) {


    $o = OrderlistQuery::create()->find();
    $this->view->render($response, 'orders.html', [
        "orders" => $o

    ]);
    return $response;
});

$app->get('/orders/{id}', function ($request, $response, $args) {
    $o = OrderlistQuery::create()->findById($args['id']);
    $this->view->render($response, 'order-info.html', [
        "orders" => $o

    ]);
    return $response;
});

//////////////////////
// App run
//////////////////////

$app->run();
