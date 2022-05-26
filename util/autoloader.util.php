<?php

spl_autoload_register('myAutoloader');

function myAutoloader($classname){
    $path = "/../model/";
    $ext = ".model.php";
    $fullPath = __DIR__ . $path . $classname . $ext;

    include_once($fullPath);
}

?>