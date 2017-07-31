<?php
include 'demo.php';
/**
 * Created by PhpStorm.
 * User: hu
 * Date: 2017/7/31
 * Time: 下午1:30
 */
class  Student extends  Person{
    public function __construct($name, $age)
    {
        echo 'class Student </br>';

        parent::__construct($name, $age);
    }
}

new Student('hubing',34);