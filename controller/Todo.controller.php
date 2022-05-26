<?php

require_once(__DIR__."/../util/autoloader.util.php");

function getAllTodos(){
    $todo = new Todo();

    try{
        $stmt = $todo->getAllTodos();
    }catch(Exception $e){
        setResponseCode(INTERNAL_SERVER_ERROR);
        return SOMETHING_WENT_WRONG;
    }


    if (!$stmt->rowCount()) return EMPTY_RESULT;

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
    
    try{
        $stmt = $todo->getTodo($id);
    }catch(Exception $e){
        setResponseCode(INTERNAL_SERVER_ERROR);
        return SOMETHING_WENT_WRONG;
    }

    if (!$stmt->rowCount()) return EMPTY_RESULT;

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
    
    try{
        $stmt = $todo->searchTodos($param);
    }catch(Exception $e){
        setResponseCode(INTERNAL_SERVER_ERROR);
        return SOMETHING_WENT_WRONG;
    }

    if (!$stmt->rowCount()) return EMPTY_RESULT;

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
    
    try{
        $result = $todo->createTodo($task);
    }catch(Exception $e){
        setResponseCode(INTERNAL_SERVER_ERROR);
        return SOMETHING_WENT_WRONG;
    }

    setResponseCode(CREATED);
    return $result;

}

function deleteTodo($id){

    $todo = new Todo();

    try{
        $result = $todo->deleteTodo($id);
    }catch(Exception $e){
        setResponseCode(INTERNAL_SERVER_ERROR);
        return SOMETHING_WENT_WRONG;
    }


    return $result;
}

function updateTodo($id, $task, $status){
    $todo = new todo();
    
    try{
        $result = $todo->updateTodo($id, $task, $status);
    }catch(Exception $e){
        setResponseCode(INTERNAL_SERVER_ERROR);
        return SOMETHING_WENT_WRONG;
    }

    return $result;
}



?>