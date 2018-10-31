<?php
/**
 * Created by PhpStorm.
 * User: alexz
 * Date: 01.11.2018
 * Time: 16:30
 */

class db {

    public function  __construct()
    {
        $this->mysqli = new mysqli("localhost","root","","blog");

    }

    public function query($sql)
    {

        $args = func_get_args();

        $sql = array_shift($args);

        $link = $this->mysqli;

        $args = array_map(function ($param) use ($link){
            return "'".$link->escape_string($param)."'";

        },$args);

        $sql = str_replace(['%','?'],['%%','%s'],$sql);

        array_unshift($args,$sql);

        $sql = call_user_func_array('sprintf',$args);

        $this->last = $this->mysqli->query($sql);

        if ($this->last === false){
            throw new Exception("DB error: ",$this->mysqli->error);
        }

        return $this;
    }

    public function assoc()
    {
        return $this->last->fetch_assoc();
    }

    public function all()
    {

        $result = [];
        while($row = $this->last->fetch_assoc())$result[]=$row;
        return $result;
    }
}