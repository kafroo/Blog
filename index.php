<?php
/*echo "<pre>";
print_r ($_SERVER);
echo "/<pre>";
*/
// include the bootstrap file
include_once 'bootstrap.php';


//echo Request::baseUrl(); die;

//die;

// if you're going to use same method many times, then put it in a variable
$uri = Request::uri();
// var_dump($uri);
// die();
$routes = [
    '/login' => 'Login',
    '/signup' => 'Signup',
    '/logout' => 'Logout',
    '/' => 'Home',
    '/posts' => 'Posts',
    '/posts/new' => 'Posts',
    '/posts/submit' => 'Posts',
    '/posts/edit/{id}' => 'Posts',
    '/posts/save/{id}' => 'Posts',
    '/posts/delete/{id}' => 'Posts',
];

if (! isset($routes[$uri])) {
    $uri = '/';
}

$page = $routes[$uri];
new_page($page);






/* if (current-router is home) 
    call the `HomePage` class
but if (current-router is login)
    call the `LoginPage` class
*/

// run the router
// call the proper controller for the current router
// Enjoy xD

// A enjoy eh bas wa7d allah kda wahda wahda Please :D
// Bootstrab file da elly hwa el css file w ha3mlo includ sah kda ?
