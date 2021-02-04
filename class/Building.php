<?php

require_once '../controller/connectdb.php';

class Building
{

    private $id, $name, $price, $img, $newbuild;

    public function __construct($id)
    {
        global $bdd;
        $req = $bdd->prepare('SELECT * from building ');
        $req->execute(array());
        $build = $req->fetch();

        $this->id = $build['building_id'];
        $this->name = $build['building_name'];
        $this->price = $build['building_price'];
        $this->value = $build['building_value'];
    }

    public function get_price()
    {
        return $this->price;
    }
    public function get_value()
    {
        return $this->value;
    }
    public static function  createBuilding($id)
    {

        $newbuild = new Building($id);
        // insertion du batiment dans la table farm
        global $bdd;
        //var_dump($_SESSION['user']['connect_id']);
        //var_dump($id);
        $req = $bdd->prepare('INSERT INTO  farmBuildings (farm_id, building_id) VALUES(?,?)');
        $req->execute(array(
            intval($_POST['farm_id']),
            intval($id)

        ));
        //  recupération du solde joueur
        $req = $bdd->prepare('SELECT account_amount from account WHERE connect_id=?');
        $req->execute(array($_SESSION['user']['connect_id']));
        $amount = $req->fetch();
        // calcul du nouveaux montant de solde
        $newamount = $amount['account_amount'] - $newbuild->get_price();
        // mise a jour de compte joueur
        $req = $bdd->prepare('UPDATE account set account_amount=? WHERE connect_id=?');
        $req->execute(array($newamount, $_SESSION['user']['connect_id']));

        //la valeur de la ferme
        $req = $bdd->prepare('SELECT farm_value FROM farm WHERE connect_id=? and farm_id=?');
        $req->execute(array($_SESSION['user']['connect_id'], $_POST['farm_id']));
        $actualValue = $req->fetch();

        $farmVal = $actualValue['farm_value'];
        $buildVal =  $newbuild->get_value();

        $NewFarmVal = $farmVal - $buildVal;

        $req = $bdd->prepare("UPDATE farm SET farm_value=? WHERE connect_id=? AND farm_id=?");
        $req->execute(array($NewFarmVal, $_SESSION['user']['connect_id'], $_POST['farm_id']));




        return $newbuild;
    }
}
