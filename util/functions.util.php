<?php

function getPayload(){
    return (array) json_decode(file_get_contents("php://input"));
}

function isGetRequest() { 
    return $_SERVER[REQUEST_METHOD] === GET;
}

function isPostRequest() { 
    return $_SERVER[REQUEST_METHOD] === POST;
}

function isPutRequest() { 
    return $_SERVER[REQUEST_METHOD] === PUT;
}

function isDeleteRequest() { 
    return $_SERVER[REQUEST_METHOD] === DELETE;
}

function sendResponse($response){
    exit(json_encode($response));
}


?>