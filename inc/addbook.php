<?php

if (!$_SESSION['admin']){
    echo "<h2>Для использования этой страницы войдит под админом</h2>";
}
else{
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = delTags($_POST['title']);
    $price = (double)delTags($_POST['price']);
    $author = delTags($_POST['author']);
    $description = delTags($_POST['description']);
    $query = "INSERT INTO book (`id_book`, `author`, `title`, `price`, `description`) VALUES (0, '$author', '$title', {$price}, '$description' )";
//    echo $query;
    mysqli_query($db, $query);
    if (mysqli_errno($db)) {
        echo "Ошибка при добавлении книги" . mysqli_errno($db);
    } else {
        echo "ALL OK";
    }
}
?>

<div class="row">
    <div class="col-md-6">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt explicabo labore totam quaerat nulla
            consequatur, quisquam quos voluptate. Labore soluta sequi at ratione? Quidem eveniet temporibus nemo iste
            delectus culpa?</p>
        <p>Accusantium eius aliquam quo illo mollitia doloribus cumque voluptas odit iusto maxime, dicta quaerat
            voluptatem harum id! Sapiente quidem totam esse quas quos, atque odit possimus reiciendis saepe magnam
            impedit!</p>
        <p>Iusto, quod, deserunt eveniet ipsam ab accusamus incidunt minima sed doloremque molestias hic perferendis
            natus necessitatibus repellat quam omnis, magnam suscipit quae. Commodi eaque mollitia quas ipsa accusamus
            sint voluptatibus!</p>
        <p>Debitis molestiae consequatur sapiente soluta consectetur. Magni ipsa dignissimos ut quod unde eaque
            asperiores cumque! Reprehenderit numquam voluptatibus nesciunt tenetur, unde ut architecto est magni alias,
            harum natus. Aperiam, placeat?</p>
    </div>
    <div class="col-md-6">
        <form class="form-signin" method="post" action="/?page=addbook">


            <div class="form-label-group">
                <label for="inp1">НАзвание книги</label>
                <input type="text" id="inp1" class="form-control" name="title" placeholder="Название книги" required
                       autofocus autocomplete="off">

            </div>

            <div class="form-label-group">
                <label for="inp2">цена</label>
                <input type="text" id="inp2" class="form-control" name="price" placeholder="цена" required autofocus
                       autocomplete="off">

            </div>

            <div class="form-label-group">
                <label for="inp3">Автор</label>
                <input type="text" id="inp3" class="form-control" name="author" placeholder="Автор" required autofocus
                       autocomplete="off">

            </div>

            <div class="form-label-group">
                <label for="inp4">Описание</label>
                <input type="text" id="inp4" class="form-control" name="description" placeholder="Описание" required
                       autofocus autocomplete="off">

            </div>


            <button class="btn btn-lg btn-primary btn-block" type="submit">Добавить</button>

        </form>


    </div>
    <?php
    }

    ?>
