<?php

require_once(__DIR__."/../model/Todo.model.php");


function runTodoTest(){
    $todo = new Todo();
    return $todo->todoTest();
}

function getAllTodos(){
    $todo = new Todo();
    $stmt = $todo->getAllTodos();

    if (!$stmt->rowCount()) exit(json_encode(array('ok' => false, 'data' => array())));

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

    return json_encode(array('data' => $all_todos));
}

function getTodo($id){
    $todo = new Todo();
    $stmt = $todo->getTodo($id);

    if (!$stmt->rowCount()) return json_encode(array('ok' => false, 'message' => "no such todo"));

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

    return json_encode(array('data' => $todo));
}


function createTodo($task, $status){

    $todo = new Todo();
    $result = $todo->createTodo($task, $status);

    return $result;

}

function deleteTodo($id){

    $todo = new Todo();
    $result = $todo->deleteTodo($todo_id);

    return $result;
}

function updateTodo($id, $task, $status){
    $todo = new todo();
    $result = $todo->updateTodo($id, $task, $status);

    return $result;
}



?>