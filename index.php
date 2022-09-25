<?php
include_once "inc/config.php";
include_once  "inc/lib.php";
ob_start();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])){
    $login   = delTags($_POST['login']);
    $passwd  = md5(delTags($_POST['passwd']));
//echo $login, "<hr>", $passwd, "<hr>";
    if( $login == ADMIN && $passwd == md5(ADMIN_PASSWD)){
        $_SESSION['admin'] = 1;
        header('location:/?page=addbook');
    }
    else{
        echo "<h3>Неверный логин или пароль</h3>";
    }
}

$numPage = getParam('numpage')*1;
$search = getParam('search');
$query = "SELECT * FROM book ";
if($search){
    $query .= " WHERE author LIKE '$search%' ";
}
$query .= " LIMIT ". ($numPage * ITEMS_PER_PAGE).",".ITEMS_PER_PAGE ;

$result = mysqli_query($db, $query);
if(!mysqli_errno($db)){
    $books = mysqli_fetch_all($result, MYSQLI_ASSOC );
}

//для логина
if($_GET['page'] == 'logout'){
   session_regenerate_id();
   session_destroy();
   unset($_SESSION['admin']);
   header('location:/?page=index');

}

if(!empty($_GET['add2basket'])){
    $add2basket = $_GET['add2basket'];
    if(array_key_exists($add2basket, $_SESSION['basket'])){
        $_SESSION['basket'][$add2basket]++;
    }
    else{
        $_SESSION['basket'][$add2basket] = 1;
    }
    header('location:/?page=index');
}

if(!empty($_GET['delete'])){
    $delete = $_GET['delete'];
    if(array_key_exists($delete, $_SESSION['basket'])){
        unset($_SESSION['basket'][$delete]);
        header('location: ?page=basket');
    }
}
//echo "<pre>";
//print_r($_SESSION['basket']);
//echo "</pre>";

//$firstName = delTags("Ivan");
//$lastName = delTags("Ivanov");
//$email = delTags('i.ivanov@test.ru');
//$address = delTags('Rostov-on-Don, Nagibina st. 51');
//$succesOrder = "order for $firstName delivery address: $address";

$categories = ['fantastic', 'prose', 'fantasy', 'triller', 'poesia'];
$publisher = ['эксмо', 'первый издательский дом', 'белая бумага', 'моя книга', 'большой миф'];

$book = ['id_book'=>1,
         'title'=>'first book',
         'author'=>'Petrosyan',
         'price'=>1590,
         'description'=>'описание жизни одного человека'];
//$books = [];
//$books[0] = $book;
//$books[] =['id_book'=>2,
//    'title'=>'magic book',
//    'author'=>'Merlin',
//    'price'=>2590,
//    'description'=>'рецепты магической кухни'];
//
//$books[] =['id_book'=>3,
//    'title'=>'my weapon book',
//    'author'=>'J. Rambo',
//    'price'=>2790,
//    'description'=>'Любимое оружие Рэмбы :)'];
//
//$books[] =['id_book'=>4,
//    'title'=>'fire in the sky',
//    'author'=>'C. Douglas',
//    'price'=>1890,
//    'description'=>'воздушные бои в небе над Британией'];
//
//$books[] =['id_book'=>5,
//    'title'=>'Deep blue sea',
//    'author'=>'Poseidon',
//    'price'=>2590,
//    'description'=>'Акулы всех сожрали'];
//
//$books[] =['id_book'=>6,
//    'title'=>'Jasmin`s dreams',
//    'author'=>'L.Freeman',
//    'price'=>2590,
//    'description'=>'О любви, мечтах и горькой реальности'];

$menu = ['index'=>'главная',
    'delivery'=>'доставка',
    'contacts'=>'контакты',
    'basket'=>'корзина',
    'dorpdown'=>'dropdown',
    'login'=>'вход',];

if($_SESSION['admin']){
    $menu['logout'] = "Выход";
    unset($menu['login']);
}

//$page = !empty($_GET['page']) ? $_GET['page'] : 'index' ;
$page = getParam('page') ? getParam('page') : 'index';

switch($page){
    case 'index': $pageName = "Каталог товаров";
    break;
    case 'delivery': $pageName = "ДОствака заказа";
    break;
    case 'login': $pageName = "Вход";
    break;
    case 'contacts': $pageName = "Контакты";
    break;
    case 'basket': $pageName = "Корзина";
    break;
    case 'addbook': $pageName = "ДОбавление книги";
        break;
    default: $pageName = "Каталог товаров";
    break;
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <!-- <link href="starter-template.css" rel="stylesheet"> -->

    <title>PHP часть 1. Основы PHP</title>

    <style>
        .card-deck{
            margin-top: 20px
        }

        .card-body img{
            display: block;
            margin: 0 auto 15px;

        }
        .card-footer{
            background: transparent;
            border: 0;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">Интернет-магазин Книжка</a>
        <form class="form-inline my-2 my-lg-0" method="get">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="книгу.." aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Найти!</button>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            getMenu('templates/menu', $menu);
            ?>
        </div>
    </div>
</nav>

<div class="container">
<?php if($page == 'index'){
    include "inc/leftpart.php";

}
?>

      <?php
      if(file_exists("inc/$page.php")){
          include "inc/$page.php";
      }
      include "inc/footer.php";
      ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   </body>
</html>