<?php
class LogIn
{
    /**
    * @var array $errors
    *
    */
    private $errors = [];

    /**
    * construction
    *
    * if the request method is post go to LogInTheUser function
    * else go to display form
    */

    public function __construct()
    {
        if (Request::method() == 'POST') {
            $this->LogInTheUser();
        } else {
            $this->displayForm();
        }
    }
    /**
    * Function displayForm To show the errors that happened during the login
    *
    */
    private function displayForm()
    {
        $data = [
            'LogInErrors' => $this->errors,
        ];
        
        view('signup', $data);
        
    }
     /**
    * Function LogInTheUser, If the valid form is correct go to isValidLogin
    * else go to displayForm to show the error
    */
    private function LogInTheUser()
    {
        if ($this->isValidForm()) {
            if ($this->isValidLogin()) {
                // grant access
                // store a logged in key in the session
                $_SESSION['user'] = true;
                header("Location:" . url('/'));
                
            } else {
                $this->errors['wrong'] = 'Invalid Login';

                $this->displayForm();
            }
        } else {
            $this->displayForm();
        }
    }
    /**
    * method isValidForm to check the validations rules
    * Function isEmpty To check if the value of input for paswword and user fields is empty or not
    *
    * @return bool isEmpty
    */
    private function isValidForm()
    {
        if (Validation::isEmpty('pwd')) {
            $this->errors['pwd'] = 'pwd is required';
        }
        if (Validation::isEmpty('user')) {
            $this->errors['user'] = 'User Name Is Required';
        }
        return empty($this->errors);
    }
    /**
    * Function errors to show the errors
    * @return bool errors
    */
    public function errors()
    {
        return $this->errors;
    }

    public function isValidLogin()
    {
        /**
         * function isValidLogin 
         * @var string $user
         * @var string $pwd
         * @var  $sql
         * @var  $database
         * @var  $query
         */

        $database = db();
        $result =  $database->fetch('users', [
            
            'user'  => Request::input('user'),
            'pwd'   => Request::input('pwd'),  
        ]);
        return !empty($result);
    }
}
