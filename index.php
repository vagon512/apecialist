<?php
include "inc/config.php";
include_once  "inc/lib.php";

$firstName = delTags("Ivan");
$lastName = delTags("Ivanov");
$email = delTags('i.ivanov@test.ru');
$address = delTags('Rostov-on-Don, Nagibina st. 51');
$succesOrder = "order for $firstName delivery address: $address";

$categories = ['fantastic', 'prose', 'fantasy', 'triller', 'poesia'];
$publisher = ['эксмо', 'первый издательский дом', 'белая бумага', 'моя книга', 'большой миф'];

$book = ['id_book'=>1,
         'title'=>'first book',
         'author'=>'Petrosyan',
         'price'=>1590,
         'description'=>'описание жизни одного человека'];
$books = [];
$books[0] = $book;
$books[] =['id_book'=>2,
    'title'=>'magic book',
    'author'=>'Merlin',
    'price'=>2590,
    'description'=>'рецепты магической кухни'];

$books[] =['id_book'=>3,
    'title'=>'my weapon book',
    'author'=>'J. Rambo',
    'price'=>2790,
    'description'=>'Любимое оружие Рэмбы :)'];

$books[] =['id_book'=>4,
    'title'=>'fire in the sky',
    'author'=>'C. Douglas',
    'price'=>1890,
    'description'=>'воздушные бои в небе над Британией'];

$books[] =['id_book'=>5,
    'title'=>'Deep blue sea',
    'author'=>'Poseidon',
    'price'=>2590,
    'description'=>'Акулы всех сожрали'];

$books[] =['id_book'=>6,
    'title'=>'Jasmin`s dreams',
    'author'=>'L.Freeman',
    'price'=>2590,
    'description'=>'О любви, мечтах и горькой реальности'];

$menu = ['index'=>'главная',
    'delivery'=>'доставка',
    'sign'=>'вход',
    'contacts'=>'контакты',
    'basket'=>'корзина',
    'dorpdown'=>'dropdown'];

$page = $_GET['page'];

saveOrder($firstName, $lastName, $email, $address);

switch($page){
    case 'index': $pageName = "Каталог товаров";
    break;
    case 'delivery': $pageName = "ДОствака заказа";
    break;
    case 'sign': $pageName = "Вход";
    break;
    case 'contacts': $pageName = "Контакты";
    break;
    case 'basket': $pageName = "Корзина";
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
  <a class="navbar-brand" href="/">Интернет-магазин Книжка</a>    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="книгу.." aria-label="Search">
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

<div class="row">
<div class="col-md-3 col-sm-3 ">
        

      <?php
      getCategories("templates/categories", $categories);
      ?>


      <!--    <a class="dropdown-item" href="#">Something else here</a>-->
<!--    <a class="dropdown-item" href="#">Action</a>-->
<!--    <a class="dropdown-item" href="#">Another action</a>-->
<!--    <a class="dropdown-item" href="#">Something else here</a>-->

 <hr>
         
 <h4>Цена</h4>
  
  <div class="row">
    <div class="input-group mb-1">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-default">от</span>
    </div>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> &nbsp;
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-sm">до</span>
    </div>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">&nbsp;

    <button type="button" class="btn btn-success">Найти</button>    
  </div>
  </div>
 <hr>  
      <?php
      //echo "<h1>".count($publisher)."</h1>";
      getPublisher("templates/publisher",$publisher);
       ?>

</div>

<div class="col-md-9 col-sm-9 ">
  <h1><?= $pageName; ?></h1>
<?php
$bookCounter = ceil(count($books)/3)*3;
for($i = 0; $i < $bookCounter; $i += 3){
?>
  <div class="card-deck">
      <?php
      for($j = $i; $j < $i+3; $j++){
          if(isset($books[$j])){
      ?>
      <div class="card">        
        <div class="card-body">
          <img src="http://placehold.it/150x220"  alt="...">
          <h3 class="card-title"><?php echo $books[$j]['price']; ?>руб</h3>
          <p class="card-text"><small class="text-muted">Автор: <?php echo $books[$j]['author'];?></small></p>
            <p class="card-text"><small class="text-muted">Название: <?php echo $books[$j]['title'];?></small></p>
          <p class="card-text"><?php echo $books[$j]['description']; ?>. Издательство: <a href="#">Полезное</a></p>
        </div>
          <div class="card-footer">
              <!--          <button type="button" class="btn btn-primary">В корзину</button>-->
              <a href="?add2basket=<?php echo $books[$j]['id_book']; ?>">В корзину</a>
          </div>

       </div>
      <?php }
          else{
              ?>
              <div class="card">
                  <div class="card-body">
                      <img src="http://placehold.it/150x220"  alt="...">
                      <h3 class="card-title"></h3>
                      <p class="card-text"><small class="text-muted">Автор</small></p>
                      <p class="card-text"><small class="text-muted">Название: </small></p>
                      <p class="card-text">. Издательство: <a href="#">Полезное</a></p>
                  </div>

              </div>
      <?php
          }
      }?>


  </div>
    <?php
}
?>

</div>

<div class="container">
     

  </div><!-- /.container -->

      <?php
      include "inc/footer.php";
      ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   </body>
</html>