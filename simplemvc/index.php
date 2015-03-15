<?php
require_once './lib/simplemvcwf/route.php';
require_once './lib/simplemvcwf/router.php';
require_once './model/dbconfig.php';

// We need to require each controller for use later down the line.
// There's certainly a better way to do this so that we avoid the
//   headache of always remembering to require each controller
//   we create
require_once './controller/about_controller.php';
require_once './controller/article_controller.php';
require_once './controller/home_controller.php';
require_once './controller/user_controller.php';
require_once './controller/post_controller.php';
require_once './controller/admin_controller.php';

$baseUrl = 'http://localhost/simplemvc';

// Note: multiple routes can be matched to the same url for any url
//   that starts with the route's url property. It is therefore important
//   that routes be ordered from most specific to least specific.
$router = new Router();


$router->registerRoute(new Route('user/index', 'user', 'index'));
$router->registerRoute(new Route('user/submitLogin', 'user', 'submitLogin'));
$router->registerRoute(new Route('user/register', 'user', 'register'));
$router->registerRoute(new Route('user/login', 'user', 'login'));
$router->registerRoute(new Route('user/logout', 'user', 'logout'));
$router->registerRoute(new Route('user/editProfile', 'user', 'editProfile'));
$router->registerRoute(new Route('user/submitEditProfile', 'user', 'submitEditProfile'));
$router->registerRoute(new Route('user/succesfullRegistration', 'user', 'succesfullRegistration'));
$router->registerRoute(new Route('user/submitRegister', 'user', 'submitRegister'));
$router->registerRoute(new Route('user', 'user', 'index'));

$router->registerRoute(new Route('about/index', 'about', 'index'));
$router->registerRoute(new Route('about', 'about', 'index'));

$router->registerRoute(new Route('admin/index', 'admin', 'index'));
$router->registerRoute(new Route('admin/submitEdit', 'admin', 'submitEdit'));
$router->registerRoute(new Route('admin/editUserState', 'admin', 'editUserState'));
$router->registerRoute(new Route('admin/editUser', 'admin', 'editUser'));
$router->registerRoute(new Route('admin/editBlockedUser', 'admin', 'editBlockedUser'));
$router->registerRoute(new Route('admin', 'admin', 'index'));


$router->registerRoute(new Route('article/index', 'article', 'index'));
$router->registerRoute(new Route('article/view', 'article', 'view'));
$router->registerRoute(new Route('article/addsubmit', 'article', 'addsubmit'));
$router->registerRoute(new Route('article/add', 'article', 'add'));
$router->registerRoute(new Route('article', 'article', 'index'));

$router->registerRoute(new Route('post/index', 'post', 'index'));
$router->registerRoute(new Route('post/addPost', 'post', 'addPost'));
$router->registerRoute(new Route('post/addsubmit', 'post', 'addsubmit'));
$router->registerRoute(new Route('post/postComment', 'post', 'postComment'));
$router->registerRoute(new Route('post/postWithComments', 'post', 'postWithComments'));
$router->registerRoute(new Route('post', 'post', 'index'));


$router->registerRoute(new Route('home/index', 'home', 'index'));
$router->registerRoute(new Route('home', 'home', 'index'));
$router->registerRoute(new Route('', 'home', 'index'));


// Now that the routes have been registered in specifc to least specific
//   order, we can call the matching controller's action
$router->callControllerAction();
?>