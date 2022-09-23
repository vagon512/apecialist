<?php
$summa = 0;
$i = 0;
$i++;
//echo $i < 10;

$order = "Имя:".$firstName.", фамилия: ". $lastName. ", email: ". $email. ", адрес: ". $address. "<br>";


$num = rand(101, 999);
$res = $num % 100;
//echo "<br>".$res."<br>";
//echo $res < 5 || $res > 20;
//echo $num % 10 == 1;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $firstName   = delTags($_POST['firstName']);
    $lastName    = delTags($_POST['lastName']);
    $email       = delTags($_POST['email']);
    $address     = delTags($_POST['address']);
    $query = "INSERT INTO book VALUES (NULL, 'автор', 'название', 123, 'описание', 'категория')";
    saveOrder($firstName, $lastName, $email, $address);
}

$count = 0;
foreach($_SESSION['basket'] as $value){
    $count += $value;
}
?>

  <div class="py-5 text-center">
    <h2>Оформление заказа</h2>
    <p class="lead">Внимательно заполните поля формы, проверьте корректность введённых данных и позиции товаров и их количество.</p>
  </div>

  <div class="row">
    <div class="col-md-6 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Корзина</span>
        <span class="badge badge-secondary badge-pill"><?php echo $count; ?></span>
      </h4>

      <ul class="list-group mb-3">
          <?php

          $summa = 0;
          if(count($_SESSION['basket'])){
          foreach($_SESSION['basket'] as $key => $value){
              for($i = 0; $i < count($books); $i++){
                  if($books[$i]['id_book'] == $key){
                      $id            = $books[$i]['id_book'];
                      $name          = $books[$i]['title'];
                      $description   = $books[$i]['description'];
                      $price         = $books[$i]['price'];
                      $summa += $price * $value;
                  }
              }
              ?>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"><?= $name ?> </h6>
            <small class="text-muted"><?= $description ?></small>
          </div>
          <span class="text-muted"><?= $price ?>руб. * <?= $value ?>шт</span>
          <span class="text-muted"><?= $price*$value ?>руб.</span>
          <span ><a href="?delete=<?= $key ?>" class="btn btn-success btn-sm ">Удалить</a></span>
        </li>
        <?php }
          }?>

        <li class="list-group-item d-flex justify-content-between">
          <span>Всего: </span>
          <strong><?= $summa ?>руб.</strong>
        </li>
      </ul>

    </div>
    <div class="col-md-6 order-md-1">
      <h4 class="mb-3">Информация</h4>
      <form class="needs-validation" method="post" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Имя</label>
            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Укажите корректное имя
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Фамилия</label>
            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Укажите корректную фамилию
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(опционально)</span></label>
          <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Укажите корректный email 
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Адрес доставки</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="город, улица, дом, квартира" required>
          <div class="invalid-feedback">
            Укажите адрес доставки
          </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Оформить заказ!</button>
      </form>
    </div>
  </div>

