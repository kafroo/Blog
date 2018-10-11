<?php
class Session implements SessionInterface
{
    public function start()
    {
        session_start();
    }
    public function set(string $key, $value)
    {

        $_SESSION[$key] = $value;

    }
    public function get(string $key)
    {
        if (isset($_SESSION[$key])) {
            return ($_SESSION[$key]);
        } else {
            return (null);
        }

    }
    public function has(string $key): bool
    {

        return isset($_SESSION[$key]);

    }

    public function remove(string $key)
    {
        unset($_SESSION[$key]);
    }

    public function destroy()
    {
        session_destroy();
    }
}
