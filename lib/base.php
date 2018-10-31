<?php
/**
 * Created by PhpStorm.
 * User: alexz
 * Date: 31.10.2018
 * Time: 15:43
 */

class ctrl{

    public  function __construct()
    {
        $this->db = new db();
    }

    public function out($tplname,$nested = false)
    {
        if(!$nested){
            $this->tpl = $tplname;
            require_once "tpl/main.php";
        }else{
            require_once  "tpl/".$tplname;
        }

    }
}

class app{
    public function __construct($path)
    {
        $this->route = explode('/',$path);

        $this->run();
    }


    private  function run()
    {
        $url = array_shift($this->route);

        if (!preg_match('#^[a-zA-Z0-9.,-]*$#',$url)){
            throw new Exception("Invalid pathname!");
        }
        $ctrlName = 'ctrl'.ucfirst($url);
        if (file_exists('app/'.$ctrlName)){
            $this->runController($ctrlName);
        }else {
            array_unshift($this->route,$url);
            $this->runController('ctrlIndex');
        }
    }

    private function runController($ctrlName)
    {
        require_once 'app/'.$ctrlName.'.php';

        $ctrl = new $ctrlName();

        if (empty($this->route)|| empty($this->route[0])){
            $ctrl->index();
        }else{
            if (empty($this->route))
                $method = 'index';
            else
                $method = array_shift($this->route);
            if (method_exists($ctrl,$method)){
                if (empty($this->route))
                $ctrl->$method();
                else
                    call_user_func_array([$ctrl,$method],$this->route);
            }else
                throw new Exception("Error 404!");

        }

    }
}