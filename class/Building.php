<?php

require_once '../controller/connectdb.php';

class Building{

    private $id, $name,$price,$img, $newbuild;
    
    public function __construct($id){
        global $bdd;
        $req=$bdd-> prepare('SELECT * from building ');
        $req->execute(array());
        $build=$req->fetch();

        $this->id= $build['building_id'];
        $this->name= $build['building_name'];
        $this->price= $build['building_price'];
    }

    public function get_price(){
        return $this->price;
    }   
    public static function  createBuilding($id){
       
        $newbuild= new Building($id);
        // insertion du batiment dans la table farm
       global $bdd;
        //var_dump($_SESSION['user']['connect_id']);
        var_dump($id);
       $req=$bdd->prepare('UPDATE farm set (building_id=?) WHERE connect_id=?');
       $req->execute(array(
            $id,
           intval($_SESSION['user']['connect_id'])

       )); 
    //  recupération du solde joueur
       $req = $bdd ->prepare('SELECT account_amount from account WHERE connect_id=?');
       $req->execute(array($_SESSION['user']['connect_id']));
       $amount=$req->fetch();
       // calcul du nouveaux montant de solde
       $newamount= $amount['account_amount'] - $newbuild->get_price() ;
       // mise a jour de compte joueur
       $req= $bdd ->prepare('UPDATE account set account_amount=? WHERE connect_id=?');
       $req->execute(array($newamount, $_SESSION['user']['connect_id'] ));

       return $newbuild;
    }
    

}
