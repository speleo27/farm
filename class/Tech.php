<?php

require_once '../controller/connectdb.php';

class Tech{

    private $id, $name, $price,$value;

    public function __construct($id){
        global $bdd;
        $req=$bdd->prepare("SELECT * from techno");
        $req->execute(array());
        $data=$req->fetch();

        $this->id= $data['techno_id'];
        $this->name= $data['techno_name'];
        $this->price= $data['techno_price'];
        $this->value= $data['techno_value'];
        
    }

    public function get_Price(){
       return $this->price;

    }

    public function get_value(){
        return $this->value;
    }
    
    public static function buyTech($id){
        $newTech = new Tech($id);
            global $bdd;
        $req=$bdd->prepare('INSERT into farmTechno(farm_id, techno_id, techno_time) VALUES(?,?,?)');
        $req->execute(array(
            intval($_POST['farm_id']),
            intval($_POST['techno']),
            time()
        ));
        //  recupération du solde joueur
        $req = $bdd->prepare('SELECT account_amount from account WHERE connect_id=?');
        $req->execute(array($_SESSION['user']['connect_id']));
        $amount = $req->fetch();
        // calcul du nouveaux montant de solde
        $newamount = $amount['account_amount'] - $newTech->get_Price();
        // mise a jour de compte joueur
        $req = $bdd->prepare('UPDATE account set account_amount=? WHERE connect_id=?');
        $req->execute(array($newamount, $_SESSION['user']['connect_id']));
        

        //la valeur de la ferme
        $req=$bdd->prepare('SELECT farm_value FROM farm WHERE connect_id=? and farm_id=?');
        $req->execute(array($_SESSION['user']['connect_id'], $_POST['farm_id'] ));
        $actualValue= $req->fetch();
    
        $valueFarm= $actualValue['farm_value'];
        $techVal= $newTech->get_value();
        // var_dump($valueFarm);
        // var_dump($techVal);
        $newFarmVal= $valueFarm + $techVal ;
        //var_dump($newFarmVal);
        $req=$bdd->prepare("UPDATE farm SET farm_value=? WHERE connect_id=? AND farm_id=?");
        $req->execute(array($newFarmVal, $_SESSION['user']['connect_id'], $_POST['farm_id'] ));

        return $newTech;

    }
    
}