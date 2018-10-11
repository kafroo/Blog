<?php

/**
 * Generate full path for files
 *
 * @param  string $filePath
 * @return string
 */
function path($filePath)
{
    return __DIR__ . '/' . $filePath;
}

/**
 * Call a view file
 *
 * @param  string $view_name
 * @return void
 */
function view($view_name, $data = [])
{
    extract($data);
    require_once path('views/' . $view_name) . '.php';
}

$database = new Dbh;
$database->connect();

/**
 * function db so we can access the database from any file as we make database as a Global Variable
 *
 */
function db()
{
    return $GLOBALS['database'];
}

/**
 * Create new object of the given page name
 *
 * @param  string $page_name
 * @return mixed
 */
function new_page($page_name)
{
    include_once 'pages/' . $page_name . '.php';

    return new $page_name;
}

/**
 * Generate full url
 *
 * @param  string $route
 * @return string
 */
function url($route)
{
    return Request::baseUrl() . $route;
}
/*echo Request::baseUrl();
die; */
function redirect_to($route)
{
    header("Location:" . url($route));
}

if (!function_exists('pre')) {
    /**
     * Pretty print the given value in the browser
     *
     * @param  mixed $var
     * @return void
     */
    function pre($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}

if (!function_exists('pred')) {
    /**
     * Pretty print the given value in the browser then stop the script execution.
     *
     * @param  mixed $var
     * @return void
     */
    function pred($var)
    {
        pre($var);
        die;
    }
}

$session = new Session;
$session->start();
function session()
{
    return $GLOBALS['session'];
}
