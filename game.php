<?php
include 'template/header.php';
$req = $bdd->prepare("SELECT * from farmBuildings INNER JOIN farm on (farm.farm_id= farmBuildings.farm_id) INNER JOIN building on (building.building_id= farmBuildings.building_id) WHERE farm.connect_id=?");
$req->execute(array($_SESSION['user']['connect_id']));
$data = $req->fetchAll(PDO::FETCH_ASSOC);
//var_dump($data);
?>
<div style="background:url('img/07c2b8bcad9fb6a6efb8d3c62e5f3080.jpg');">

    <div class="container ">
        <div class="row">

            <?php foreach ($data as $farm) : ?>
                <div class="col-4">
                    <img src="<?= $farm['building_img'] ?>" width="45%" />
                    <p style="color:yellow;"><?= $farm['building_descr'] ?></p>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>




<?php require_once 'template/footer.php';
?>