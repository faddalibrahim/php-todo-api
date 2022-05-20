
<?php

/**
 * * handle null exceptions for getPayload() to avoid making queries for null column name
 *
 * * create constants for 
 */

require_once(__DIR__."/../../../util/headers.util.php");

require_once(__DIR__."/../../../controller/Todo.controller.php");

require_once(__DIR__."/../../../util/functions.util.php");

require_once(__DIR__."/../../../util/constants.util.php");


// GET REQUESTS
if(isGetRequest()){

    // id key is present
    if(isset($_GET[ID])){

        (empty($_GET[ID]) or !is_numeric($_GET[ID])) ?
                    exit(json_encode(INVALID_ID)):  exit(getTodo($_GET[ID]));
    }

    // id key not present
    count($_GET) ? 
        // different key present             no key at all
        exit(json_encode(UNEXPECTED_KEY)) :  exit(getAllTodos());

}

// POST REQUESTS
if(isPostRequest()){

    $payload = getPayload();


    // check if payload is empty
    if(!$payload) exit(json_encode(EMPTY_PAYLOAD));
    

    // contains expected keys
    if(!array_key_exists(TASK, $payload)) exit(json_encode(UNEXPECTED_PAYLOAD));


    exit(createTodo($payload['task']));
}


// DELETE REQUESTS
if(isDeleteRequest()){

    $payload = getPayload();

    // check if payload is empty
    if(!$payload) exit(json_encode(EMPTY_PAYLOAD));
    
    // contains expected keys/values
    if(!array_key_exists(ID, $payload) or !is_numeric($payload[ID])) 
        exit(json_encode(UNEXPECTED_PAYLOAD));
    

    exit(deleteTodo($payload[ID]));
}

// PUT REQUESTS

if(isPutRequest()){
    $payload = getPayload();
    
    echo updateTodo($payload[ID],$payload[STATUS]);
    
}



?>