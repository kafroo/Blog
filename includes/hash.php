<?php
function salt($pwd){
            $salt = 'dsfsdbfhjsdfhbsjrfhuwe1232342@%#%^#&@sdfjsdfs';
            $pwd = sha1($pwd, $salt);
            return $pwd;
        }