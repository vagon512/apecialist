<?php

function getCategories($template, array $categories)
{
    include "$template.php";

}

function getPublisher($template, array $publisher){
    include "$template.php";
}

function getMenu($template, $menu){
    include "$template.php";
}

function saveOrder($firstName, $lastName, $email, $address){
    file_put_contents(ORDERS, "$firstName| $lastName| $email| $address\n", FILE_APPEND)  ;
    return true;
}

function getBooksByCategories( $category ){
    $books = [];
    $books[] =['id_book'=>test,
        'title'=>'test`s dreams',
        'author'=>'test',
        'price'=>2590000,
        'description'=>'test test test'];

    return $books;
}

function delTags($myString){
    return trim(strip_tags($myString));
}

function calcAmount( $delta = 0){
    static $cost = 0;
    return $cost += $delta;
}

//получение параметров запроса get
function getParam(string $param = '') :? string{
    return filter_input(INPUT_GET, $param, FILTER_SANITIZE_STRING) ?? null;
    //if(isset($_GET['$param'])){


//        return delTags($_GET['param']) ;
//        return filter_input(INPUT_GET, $param, FILTER_SANITIZE_STRING);
//    }
//    return null;

}
//получение параметров запроса post
function postParam(string $param = '') :? string{
    return filter_input(INPUT_POST, $param, FILTER_SANITIZE_STRING) ?? null;
//    if(isset($_POST['$param'])){
//        return delTags($_POST['param']) ;
//        return filter_input(INPUT_POST, $param, FILTER_SANITIZE_STRING);
//    }
//    return null;
}