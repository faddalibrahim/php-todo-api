<?php


require_once(__DIR__."/../util/headers.util.php");
require_once(__DIR__."/../model/Todo.model.php");
require_once(__DIR__."/../util/functions.util.php");

$todo = new Todo();

$health = array(
        'database' => $todo->healthDB(), 
        'getAllTodos' => true, 
        'getTodo' => true, 
        'searchTodos' => true,
        'createTodo' => true,
        'deleteTodo' => true,
        'updateTodo' => true
);


try{

    $pdo_object = $todo->getAllTodos();
}catch(Exception $e){
    $health['getAllTodos'] = false;
    
}

try{

    $pdo_object = $todo->getTodo(1);
}catch(Exception $e){
    $health['getTodo'] = false;
}

try{

    $pdo_object = $todo->searchTodos('pending');
}catch(Exception $e){
    $health['searchTodos'] = false;
}


sendResponse($health);






?>