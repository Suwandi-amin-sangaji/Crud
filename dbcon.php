<?php
require __DIR__.'/vendor/autoload.php';


use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;


// database
$factory = (new Factory)
        ->withServiceAccount('fir-php-22f1e-firebase-adminsdk-giqg5-9ad8ce9bfb.json')
        ->withDatabaseUri('https://fir-php-22f1e-default-rtdb.firebaseio.com/');

    $database = $factory->createDatabase();
    $auth = $factory->createAuth();

?>