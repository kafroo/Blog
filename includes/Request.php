<?PHP

class Request
{
    /**
     * The params list for dynamic route segments
     * 
     * @var array 
     */
    private static $params = [];

    public static function input($key)
    {
        /**
         * Function input to check if this variable $key is exsist or not then to check that this variable is set or not
         * @var bool $key
         * return bool|null
         */
        if (isset($_POST[$key])) { //return isset($_POST[$ey]) ? $_POST[$ey] : null; this is equavilent to this if condition

            return $_POST[$key];
        } else {
            return null;
        }
    }
    public static function method()
    {
        /**
         * Function method that Returns the request method used to access the page
         * @Super Global Variable $_SERVER
         * return string
         */
        return $_SERVER['REQUEST_METHOD'];
    }
    public static function uri()
    {
        $script = $_SERVER['SCRIPT_NAME']; // /folder-name/index.php

        $script = rtrim($script, '/index.php'); // /folder-name

        $requestUri = $_SERVER['REQUEST_URI']; // /folder-name/batee5
        
        $requestUri = str_replace($script, '', $requestUri); // /batee5

        if(preg_match_all('~[0-9]+~', $requestUri, $matches)){
            static::$params = $matches[0];
            $requestUri = preg_replace('/[0-9]+/u', '{id}', $requestUri);
        } 

        return $requestUri;  
    }

    /**
     * Get request params
     * 
     * @return array
     */
    public static function params(): array
    {
        return static::$params;
    }

    /**
     * Generate the full base url for the application
     * 
     * @return string
     */
    public static function baseUrl()
    {
        // $_SERVER
        // http://localhost/usingController 
        $script = $_SERVER['SCRIPT_NAME']; // /folder-name/index.php
        $script = rtrim($script, '/index.php'); // /folder-name
        return $_SERVER ['REQUEST_SCHEME'] . "://" .  $_SERVER ['HTTP_HOST'] . $script;
    }
}
