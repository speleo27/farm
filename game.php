<?php
include 'template/header.php';
$req = $bdd->prepare("SELECT * from farmBuildings INNER JOIN farm on (farm.farm_id= farmBuildings.farm_id) INNER JOIN building on (building.building_id= farmBuildings.building_id) WHERE farm.connect_id=?");
$req->execute(array($_SESSION['user']['connect_id']));
$data = $req->fetchAll(PDO::FETCH_ASSOC);

$req2=$bdd->prepare("SELECT * FROM farmtechno INNER JOIN farm on (farm.farm_id= farmtechno.farm_id) INNER JOIN techno on (farmtechno.techno_id= techno.techno_id) WHERE farm.connect_id=?");
$req2->execute(array($_SESSION['user']['connect_id']));
$tech= $req2->fetchAll(PDO::FETCH_ASSOC);
//var_dump($tech);
if(!empty($tech)){
$timeduration=  $actualTime - (intval($tech['techno_time'])) ;
}
//var_dump($timeduration);
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
            <?php foreach ($tech as $tech) : 
                if($timeduration  <5400){ ?>
                <div class="col-4">
                    <img src="<?= $tech['techno_img'] ?>" width="45%" />
                    <p style="color:yellow;">Nettoyage en cour</p>
                </div>
            <?php } endforeach ?>
        </div>
    </div>
</div>




<?php require_once 'template/footer.php';
?>