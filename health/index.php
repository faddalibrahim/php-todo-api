<?php


require_once(__DIR__."/../util/headers.util.php");
require_once(__DIR__."/../model/Todo.model.php");
require_once(__DIR__."/../util/functions.util.php");

$todo = new Todo();

$health = array(
        'database' => '', 
        'getAllTodos' => '', 
        'getTodo' => '', 
        'searchTodos' => '',
        'createTodo' => '',
        'deleteTodo' => '',
        'updateTodo' => ''
);

sendResponse($health);






?>