<?php
namespace app\controller;

class baseController{
    public $model;
    public function creatModel($file,$model){
        require($file);
        $this->model=new $model();
        return $this->model;
        

    }
    public function loadView($file,$arg){
        require(__DIR__."/../../views/".$file);
        


    }

}
// $c=new baseController();
// $m=$c->creatModel(__DIR__."/../models/user.php","app\models\User");
// var_dump($m);
// $x="noha";
// $c->loadView(__DIR__."/../../views/test.html",$x);
// var_dump($c->loadView(__DIR__."/../../views/test.html",'bbb'))
?>