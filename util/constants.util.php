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
define('UNEXPECTED_PAYLOAD', array('ok' => false, 'message' =>'payload contains expected data'));

// status codes

define('CREATED',201);
define('BAD_REQUEST',400);
define('NOT_FOUND',404);


?>