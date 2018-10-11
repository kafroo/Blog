<?php
interface SessionInterface 
{
    /**
     * Start new session
     * 
     * @return void
     */
    public function start();

    
    /**
     * Add new value to session
     *  
     * @param  string $key
     * @param  mixed $value 
     * @return void
     */
    public function set(string $key, $value);
    
    /**
     * Get a value from session using the given key
     *  
     * @param  string $key
     * @return mixed
     */
    public function get(string $key);
    
    /**
     * Determine whether the given key exists in the session
     *  
     * @param  string $key
     * @return bool
     */
    public function has(string $key): bool;
    
    /**
     * Remove a value from session by key
     *  
     * @param  string $key
     * @return void
     */     
    public function remove(string $key);
    
    /**
     * Destroy session
     *  
     * @return void
     */
    public function destroy();
}