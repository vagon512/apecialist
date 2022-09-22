
<h4>Издательство</h4>

<div class="row">
    <?php
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
<?php } else{ echo "издательств нет"; }
?>
</div>
<hr>
