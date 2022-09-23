<?php
session_start();
define('AUTHOR', "vagon512");
define('YEAR', 2022);
define('DBNAME', 'specialist');
define('DBUSER', 'vagon');
define('DBPASSWD', '1');
define('DBHOST', 'localhost');

define('ORDERS', 'orders.txt');

if(!isset($_SESSION['basket'])){
    $_SESSION['basket'] = [];
}