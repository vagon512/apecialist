<?php
include "inc/config.php";

$firstName = "Ivan";
$lastName = "Ivanov";
$email = 'i.ivanov@test.ru';
$address = 'Rostov-on-Don, Nagibina st. 51';
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
$books[1] =['id_book'=>2,
    'title'=>'magic book',
    'author'=>'Merlin',
    'price'=>2590,
    'description'=>'рецепты магической кухни'];
$menu = ['index'=>'главная',
    'delivery'=>'доставка',
    'sign'=>'вход',
    'contacts'=>'контакты',
    'basket'=>'корзина',
    'dorpdown'=>'dropdown'];

$page = $_GET['page'];

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
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="?page=delivery"><?php echo $menu['delivery']; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=contacts"><?php echo $menu['contacts']; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=sign"><?php echo $menu['sign']; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=basket"><?php echo $menu['basket']; ?></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $menu['dorpdown']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>

  </div>
  </div>
</nav>

<div class="container">

<div class="row">
<div class="col-md-3 col-sm-3 ">
        
  <h4>Категория</h4>

  <div class="row">
      <?php

      if(!count($categories)){
          echo "категорий нет";
  }
      else{
          $i = 0;
          while($i < count($categories)){

      ?>
    <a class="dropdown-item" href="#"><?php echo $categories[$i]; ?></a>

      <?php
          $i++;
          }
      }
      ?>
      <!--    <a class="dropdown-item" href="#">Something else here</a>-->
<!--    <a class="dropdown-item" href="#">Action</a>-->
<!--    <a class="dropdown-item" href="#">Another action</a>-->
<!--    <a class="dropdown-item" href="#">Something else here</a>-->
  </div>
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
  <h4>Издательство</h4>

  <div class="row">
      <?php
      //echo "<h1>".count($publisher)."</h1>";
      if(count($publisher)){

      ?>
  <ul class="list-group col-md-12 col-sm-12">
    <?php for($i = 0; $i < count($publisher); $i++){ ?>
      <li class="list-group-item">
      <input type="checkbox"   id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1"><?php echo $publisher[$i];?></label>
    </li>
      <?php } ?>
    
    <li class="list-group-item">
      <button type="button" class="btn btn-success">Найти</button>    
    </li>
  </ul>
      <?php } else{ echo "издательств нет"; } ?>

  </div>
 <hr>

 
</div>

<div class="col-md-9 col-sm-9 ">
  <h1><?= $pageName; ?></h1>

  <div class="card-deck"> 
      <div class="card">        
        <div class="card-body">
          <img src="http://placehold.it/150x220"  alt="...">
          <h3 class="card-title"><?php echo $book['price']; ?>руб</h3>
          <p class="card-text"><small class="text-muted">Автор: <?php echo $book['author'];?></small></p>
            <p class="card-text"><small class="text-muted">Название: <?php echo $book['title'];?></small></p>
          <p class="card-text"><?php echo $book['description']; ?>. Издательство: <a href="#">Полезное</a></p>
        </div>
          <div class="card-footer">
              <!--          <button type="button" class="btn btn-primary">В корзину</button>-->
              <a href="?add2basket=<?php echo $book['id_book']; ?>">В корзину</a>
          </div>
       </div>

      <div class="card">
        <div class="card-body">
          <img src="http://placehold.it/150x220"  alt="...">
          <h3 class="card-title">800руб</h3>
          <p class="card-text"><small class="text-muted">Автор: sdgfgfg</small></p>
          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-primary">В корзину</button>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <img src="http://placehold.it/150x220"  alt="...">
          <h3 class="card-title">2100руб</h3>
          <p class="card-text"><small class="text-muted">Автор: dfgd</small></p>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-primary">В корзину</button>
        </div>
      </div>
      
  </div>


  <div class="card-deck">

      <div class="card">        
        <div class="card-body">
          <img src="http://placehold.it/150x220"  alt="...">
          <h3 class="card-title">1200руб</h3>
          <p class="card-text"><small class="text-muted">Автор: dfgdfg</small></p>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. Издательство: <a href="#">Полезное</a></p>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-primary">В корзину</button>
        </div>
       </div>

      <div class="card">
        <div class="card-body">
          <img src="http://placehold.it/150x220"  alt="...">
          <h3 class="card-title">800руб</h3>
          <p class="card-text"><small class="text-muted">Автор: sdgfgfg</small></p>
          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-primary">В корзину</button>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <img src="http://placehold.it/150x220"  alt="...">
          <h3 class="card-title">2100руб</h3>
          <p class="card-text"><small class="text-muted">Автор: dfgd</small></p>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-primary">В корзину</button>
        </div>
      </div>
      
  </div>


</div>

   
</div>

  
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