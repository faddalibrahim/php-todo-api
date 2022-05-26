<?php

// requests
define('REQUEST_METHOD','REQUEST_METHOD');
define('GET','GET');
define('POST','POST');
define('DELETE','DELETE');
define('PUT','PUT');


// database table columns
define('ID','id');
define('TASK','task');
define('STATUS','status');

define('SEARCH','search');

// error responses
define('INVALID_ID', array('ok' => false, 'message' => 'invalid id'));
define('UNEXPECTED_KEY', array('ok' => false, 'message' =>'unexpected key'));
define('EMPTY_PAYLOAD', array('ok' => false, 'message' =>'payload is empty'));
define('UNEXPECTED_PAYLOAD', array('ok' => false, 'message' =>'payload contains unexpected data'));

define('SOMETHING_WENT_WRONG', array('ok' => false, 'message' => "something went wrong"));
define('EMPTY_RESULT',array('ok' => true, 'data' => array()));

define('SUCCESSFULLY_DELETED',array('ok' => true, 'message' => 'todo was successfully deleted'));
define('FAILED_TO_DELETE', array('ok' => false, 'message' => 'failed to delete todo'));

define('TODO_SUCCESSFULLY_CREATED', array('ok' => true, 'message' => 'todo was successfully added'));
define('FAILED_TO_ADD_TODO', array('ok' => false, 'message' => 'failed to add todo'));

define('TODO_SUCCESSFULLY_UPDATED', array('ok' => true, 'message' => 'todo was successfully updated'));
define('FAILED_TO_UPDATE_TODO', array('ok' => false, 'message' => 'failed to update todo'));

// status codes

define('CREATED',201);
define('BAD_REQUEST',400);
define('NOT_FOUND',404);
define('INTERNAL_SERVER_ERROR',500);


?>