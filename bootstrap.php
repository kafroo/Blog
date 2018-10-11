<?php
/**
 * include the important calsses that will be needed in every request as : Db & request
 * then create new object for each core class as : $db = new dbh;
 * it's a static method so we don't need to create new instance as : $instance = new Instance;
 * 
 */
include_once 'includes/Dbh.php';
include_once 'includes/Request.php';
include_once 'Contracts/SessionInterface.php';
include_once 'includes/Session.php';
include_once 'helpers.php';

if (Request::method() == 'POST') {
    include_once 'includes/Validation.php';
}