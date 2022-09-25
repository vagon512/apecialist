<?php
session_start();
define('AUTHOR', "vagon512");
define('YEAR', 2022);
define('DBNAME', 'specialist');
define('DBUSER', 'vagon');
define('DBPASSWD', '1');
define('DBHOST', 'localhost');

define('ITEMS_PER_PAGE', 3);

define('ADMIN', 'bigboss');
define('ADMIN_PASSWD', 'gfhjkm123');

define('ORDERS', 'orders.txt');

$db = mysqli_connect(DBHOST,DBUSER,DBPASSWD, DBNAME);
mysqli_query($db,'SET NAMES=utf-8');

if(!isset($_SESSION['basket'])){
    $_SESSION['basket'] = [];
}