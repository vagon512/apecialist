<div class="col-md-9 col-sm-9 ">
    <h1><?php echo $pageName; ?></h1>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            $query = "SELECT count(*) FROM book";
            $result = mysqli_query($db, $query);
            $countOfPage = ceil(mysqli_fetch_row($result)[0]/ITEMS_PER_PAGE);

            if($countOfPage > 1){

                for($i=0; $i < $countOfPage; $i++){
                    if(getParam('numpage') == $i){ ?>

                        <li class="page-item active"><a class="page-link" href="/?page=<?= $page ?>&numpage=<?= $i ?><?php echo isset($search) ? "&search=".$search : ""; ?>"><?= $i+1 ?></a></li>
                        <?php
                    }
                    else{
                        ?>

                        <li class="page-item"><a class="page-link" href="/?page=<?= $page ?>&numpage=<?= $i ?><?php echo isset($search) ? "&search=".$search : ""; ?>"><?= $i+1 ?></a></li>

                        <?php
                    }
                }
            }
//            echo isset($search) ? "&search=".$search : "nothing";
            ?>
        </ul>
    </nav>




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
