<?php

/**
 * fetches and converts into an associative array the json data sent from the client
 * 
 * @return array 
 */

function getPayload(){
    return (array) json_decode(file_get_contents("php://input"));
}

/**
 * checks if incoming request type is GET
 * 
 * @return boolean true or false
 */

function isGetRequest() : bool { 
    return $_SERVER[REQUEST_METHOD] === GET;
}

/**
 * checks if incoming request type is POST
 * 
 * @return boolean true or false
 */

function isPostRequest() : bool { 
    return $_SERVER[REQUEST_METHOD] === POST;
}

/**
 * checks if incoming request type is PUT
 * 
 * @return boolean true or false
 */

function isPutRequest() : bool { 
    return $_SERVER[REQUEST_METHOD] === PUT;
}

/**
 * checks if incoming request type is DELETE
 * 
 * @return boolean true or false
 */

function isDeleteRequest() : bool { 
    return $_SERVER[REQUEST_METHOD] === DELETE;
}

/**
 * encodes ands sends response to the client
 * 
 * @param array { response } the response to be sent to the client
 */

function sendResponse(array $response) : void{
    exit(json_encode($response));
}

/**
 * sets the appropriate response code for each request
 * 
 * @param int { code } the response code
 */

function setResponseCode(int $code) : void{
    http_response_code($code);
}


?>