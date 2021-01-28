<?php
require_once '../controller/connectdb.php';

class Building{

    private $id, $name,$price,$img;
    
    function __construct($id, $name){
        global $bdd;
        $req=$bdd-> prepare('SELECT * from building ');
        $req->execute(array());
        $build=$req->fetch();

        $this->id= $build['id'];
        $this->name= $build['name'];

    }



}
