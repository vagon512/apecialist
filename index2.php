<?php
define('AUTHOR', "L.N. Tolstoy");
define('YEAR', 2022);
define('DBNAME', 'specialist');
define('DBUSER', 'vagon');
define('DBPASSWD', '1');
define('DBHOST', 'localhost');

$firstName = "Ivan";
$lastName = "Ivanov";
$email = 'i.ivanov@test.ru';
$address = 'Rostov-on-Don, Nagibina st. 51';

$succesOrder = "order for ".$firstName." delivery address: ".$address;

$categories = array('fantastic', 'prose', 'fantasy', 'triller', 'pesia');
$publisher = array('эксмо', 'первый издательский дом', 'белая бумага', 'моя книга', 'большой миф');

$book = array('id_book'=>1, 'title'=>'first book', 'author'=>'Petrosyan', 'price'=>1590, 'description'=>'описание жизни одного человека');

$books = array(['id_book'=>2, 'title'=>'magik book', 'author'=>'Merlin', 'price'=>2590, 'description'=>'сборник волшебных рецептов'],
    ['id_book'=>1, 'title'=>'first book', 'author'=>'Petrosyan', 'price'=>1590, 'description'=>'описание жизни одного человека']);
print_r($tst);
print_r($books);


