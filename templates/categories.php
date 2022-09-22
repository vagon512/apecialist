
<h4>Категория</h4>

<div class="row"><?php
if (!count($categories)) {
    echo "категорий нет";
} else {
    $i = 0;
    while ($i < count($categories)) {

        ?>
        <a class="dropdown-item" href="#"><?php echo $categories[$i]; ?></a>

        <?php
        $i++;
    }
}
?>
</div>
