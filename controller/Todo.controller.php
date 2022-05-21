<?php

require_once(__DIR__."/../model/Todo.model.php");

function runTodoTest(){
    $todo = new Todo();
    return $todo->todoTest();
}

function getAllTodos(){
    $todo = new Todo();
    $stmt = $todo->getAllTodos();

    if (!$stmt->rowCount()) return array('ok' => false, 'data' => array());

    $all_todos = array('ok' => true, 'todos' => array());

    while($data = $stmt->fetch()){
        extract($data);

        $todo = array(
            'id' => $id,
            'task' => $task,
            'status' => $status,
            'created_at' => $created_at
        );

        array_push($all_todos['todos'],$todo);
    }

    return array('data' => $all_todos);
}

function getTodo($id){
    $todo = new Todo();
    $stmt = $todo->getTodo($id);

    if (!$stmt->rowCount()) return array('ok' => false, 'message' => "no such todo");

    $todo = array('ok' => true, 'todo' => null);

    while($data = $stmt->fetch()){
        extract($data);

        $one_todo = array(
            'id' => $id,
            'task' => $task,
            'status' => $status,
            'created_at' => $created_at
        );

        $todo['todo'] = $one_todo;
    }

    return array('data' => $todo);
}

function searchTodos($param){
    $todo = new Todo();
    $stmt = $todo->searchTodos($param);

    if (!$stmt->rowCount()) return array('ok' => false, 'data' => array());

    $resulting_todos = array('ok' => true, 'todos' => array());

    while($data = $stmt->fetch()){
        extract($data);

        $todo = array(
            'id' => $id,
            'task' => $task,
            'status' => $status,
            'created_at' => $created_at
        );

        array_push($resulting_todos['todos'],$todo);
    }

    return array('data' => $resulting_todos);
}


function createTodo($task){

    $todo = new Todo();
    $result = $todo->createTodo($task);

    return $result;

}

function deleteTodo($id){

    $todo = new Todo();
    $result = $todo->deleteTodo($id);

    return $result;
}

function updateTodo($id, $task, $status){
    $todo = new todo();
    $result = $todo->updateTodo($id, $task, $status);

    return $result;
}



?>