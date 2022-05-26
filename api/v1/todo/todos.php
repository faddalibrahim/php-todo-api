
<?php

/**
 * * handle null exceptions for getPayload() to avoid making queries for null column name
 *
 * * create constants for 
 */

require_once(__DIR__."/../../../util/headers.util.php");

require_once(__DIR__."/../../../util/constants.util.php");

require_once(__DIR__."/../../../util/functions.util.php");

require_once(__DIR__."/../../../controller/Todo.controller.php");




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
        setResponseCode(BAD_REQUEST);
        sendResponse(EMPTY_PAYLOAD);
    }
    
    
    // contains unexpected keys
    if(!array_key_exists(TASK, $payload)) {
        setResponseCode(BAD_REQUEST);
        sendResponse(UNEXPECTED_PAYLOAD);
    }


    sendResponse(createTodo($payload[TASK]));
}


// DELETE REQUESTS
if(isDeleteRequest()){
    
    $payload = getPayload();

    // check if payload is empty
    if(!$payload) {
        setResponseCode(BAD_REQUEST);
        sendResponse(EMPTY_PAYLOAD);
    }
    
    // contains expected keys/values
    if(!array_key_exists(ID, $payload) or !is_numeric($payload[ID])) {
        setResponseCode(BAD_REQUEST);
        sendResponse(UNEXPECTED_PAYLOAD);
    }
    

    sendResponse(deleteTodo($payload[ID]));
}

// PUT REQUESTS

if(isPutRequest()){
    $payload = getPayload();
    
    // check if payload is empty
    if(!$payload) {
        setResponseCode(BAD_REQUEST);
        sendResponse(EMPTY_PAYLOAD);
    }

    if(!array_key_exists(ID, $payload) or !is_numeric($payload[ID])) {
        setResponseCode(BAD_REQUEST);
        sendResponse(UNEXPECTED_PAYLOAD);
    }
    
    sendResponse(updateTodo($payload[ID], $payload[TASK], $payload[STATUS]));

}



?>