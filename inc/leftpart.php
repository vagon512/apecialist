
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
