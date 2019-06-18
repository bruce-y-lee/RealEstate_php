<?php 

    include 'init.php';
    //projection example 1-> contain 0-> not contain
    //searching one document and using projection
    $document = $collection_users->findOne(['username'=>"ali", 'password'=>"123asd"],[
        // 'projection'=>['_id'=>1, 'admin'=>1]]);
        'projection'=>['_id'=>0, 'admin'=>0]]);
    
    //create a cursor and iterate to see the data that was retrieved from Mongodb
    $document = $collection_users->find();

    foreach($document as $val){
       var_dump($val->username); 
    }
    echo "<br/>";
    //user projection together with limit functionality

    $document = $collection_users->find([],['skip'=>1,'limit'=>2, 'projection'=>['_id'=>0,'admin'=>0]]);

    foreach($document as $val){
        echo "<pre>";
        var_dump($val);
        echo "</pre>";



    }

    echo date('Y-m-d',1559768009);
    

    $document = $collection_books->findOne(['bookTitle'=>'test1',
    'bookCategory'=>'test2'], ['projection'=>['_id'=>1]]);

    var_dump($document->_id);

    echo "<br/>";

    var_dump($_SESSION['user_id']);

    $query = $collection_books->find([],['projection'=>['bookCategory'=>1,
             '_id' => 0]]);

    $distinct = $collection_books->distinct('bookCategory', $query);

          foreach($distinct as $val){
            var_dump($val);
          }

    $search = 'ring'; //to contain equvalent to %trip% in SQL

    $searched_result = $collection_books->find([
        'bookTitle' => new MongoDB\BSON\Regex($search, 'i')],
         ['projection'=> ['bookTitle'=>1, '_id'=>0]]);

         foreach($searched_result as $val){
             print_r($val);
         }
    

         echo "<br/>";

         //let check out our SESSION['orders']
         echo "<pre>";
         var_dump($_SESSION['order']);
         echo "</pre>";


        //  $insert = $collection_orders->insertOne(["customerID"=> "test", "totalPrice"=>["value1"]]);

        //  $insert = $collection_orders->findOneAndUpdate(["customerID"=>"test"], ['$push'=>
        //     ["totalPrice"=> "value3"]] );

        // $insert = $collection_orders->findOneAndUpdate(["customerID"=>"test"], ['$push'=>
        //     ["totalPrice"=> ["nested array"]]] );

        // $insert = $collection_orders->findOneAndUpdate(["customerID"=>"test"], ['$push'=>
        // ["totalPrice.2"=> "nested value"]] );    

        // $insert = $collection_orders->findOneAndUpdate(["customerID"=>"test"], ['$push'=>
        // ["totalPrice.2"=> ["nested array again"]]] );   

        $find = $collection_orders->findOne(["customerID"=>"test"]);

        echo $find->totalPrice[2][2][0]."<br/>";


        $cursorPag = $collection_books->find([],['limit'=>4,'skip'=>2, 'sort'=>['bookTitle'=>1] ]);//sort acendent by booktitle

        foreach($cursorPag as $val){
            echo $val->bookTitle;
        }

        //test array pass
        echo " array pass test <br/>";
        function foo($a){
            $a = 3;
            echo "<br/>";
        }

        $b = array(1,2);
        var_dump($b);
        foo($b);
        var_dump($b);
        echo "<br/>";
        // echo $_SESSION['SERVER_NAME'];
        // echo $_SERVER['SERVER_NAME'];
        echo "<br/>";
        echo $_SERVER['HTTP_HOST']
?>
