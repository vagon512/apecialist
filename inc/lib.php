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