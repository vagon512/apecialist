

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
