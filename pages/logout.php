<?php
class logout
{
    
    public function Logout()
    {
        $session = new Session;
        
        $session->remove('user');
        $session->destroy();
        redirect_to('/home');

    }
}