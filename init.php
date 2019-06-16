<?php
    

    session_start();
    require 'vendor/autoload.php'; // include Composer's autoloader;
    include 'classes/Users.php';
    include 'classes/Books.php';
    include 'classes/Orders.php';
    //connection to the server
    $uri = "mongodb://admin:123asd@ds131737.mlab.com:31737/php_bookstore";

    $connection = new MongoDB\Client($uri);
    //connection to the database
    $db = $connection->php_bookstore;
    //connection to the collection users
    $collection_users = $db->users;
    $collection_books = $db->books;
    $collection_orders = $db->orders;

    //object of User class
    // $userClass = new Users($collection_users);
    // $booksClass = new Books($collection_books);
    // $ordersClass = new Orders($collection_orders);
    


    // $userClass->public = 400;

    // var_dump($userClass->getCollection());
        // var_dump($userClass->collection_users); //-> can't access to protected
    // var_dump($userClass->public); 
    // var_dump($connection); 
    // var_dump($collection_users);




?>
