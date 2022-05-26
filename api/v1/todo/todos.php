
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
    $param = isset($_GET[ID]) ? ID : (isset($_GET[SEARCH]) ? SEARCH : NULL);

    // echo($param);

    switch($param){
        case ID:
            (empty($_GET[ID]) or !is_numeric($_GET[ID])) ?
                sendResponse((INVALID_ID)):  sendResponse(getTodo($_GET[ID]));
            break;
        case SEARCH:
            sendResponse(searchTodos($_GET[$param]));
            break;
        default:
            count($_GET) ? 
                // different key present             no key at all
                sendResponse(UNEXPECTED_KEY) :  sendResponse(getAllTodos());
    }

}

// POST REQUESTS
if(isPostRequest()){

    $payload = getPayload();


    // check if payload is empty
    if(!$payload) {
        http_response_code(400);
        exit(json_encode(EMPTY_PAYLOAD));
    }
    

    // contains expected keys
    if(!array_key_exists(TASK, $payload)) exit(json_encode(UNEXPECTED_PAYLOAD));


    http_response_code(201);
    sendResponse(createTodo($payload[TASK]));
}


// DELETE REQUESTS
if(isDeleteRequest()){
    
    $payload = getPayload();

    // check if payload is empty
    if(!$payload) {
        http_response_code(400);
        exit(json_encode(EMPTY_PAYLOAD));
    }
    
    // contains expected keys/values
    if(!array_key_exists(ID, $payload) or !is_numeric($payload[ID])) {
        // bad request
        http_response_code(400);
        exit(json_encode(UNEXPECTED_PAYLOAD));
    }
    

    sendResponse(deleteTodo($payload[ID]));
}

// PUT REQUESTS

if(isPutRequest()){
    $payload = getPayload();
    
    http_response_code(201);
    sendResponse(updateTodo($payload[ID], $payload[TASK], $payload[STATUS]));

}



?>