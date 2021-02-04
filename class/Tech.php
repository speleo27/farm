<?php

require_once '../controller/connectdb.php';

class Tech{

    private $id, $name, $price,$value;

    public function __construct($id){
        global $bdd;
        $req=$bdd->prepare("SELECT * from techno");
        $req->execute(array());
        $data=$req->fetchAll(PDO::FETCH_ASSOC);

        $this->id= $data['techno_id'];
        $this->name= $data['techno_name'];
        $this->price= $data['techno_price'];
        
    }

    public function get_Price(){
       return $this->price;

    }
    
    public static function buyTech($id){
        $newTech = new Tech($id);
            global $bdd;
        $req=$bdd->prepare('INSERT into farmTechno(farm_id, techno_id');
        $req->execute(array(
            $_POST['farm_id'],
            $_POST['techno_id']
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

        return $newTech;

    }
    
}