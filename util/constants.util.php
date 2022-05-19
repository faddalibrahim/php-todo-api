<?php

// requests

define('REQUEST_METHOD','REQUEST_METHOD');
define('GET','GET');
define('POST','POST');
define('DELETE','DELETE');
define('PUT','PUT');


// TODO TABLE COLUMNS

define('ID','id');
define('TASK','task');
define('STATUS','status');

// error responses
define('INVALID_ID', array('ok' => false, 'message' => 'invalid id'));
define('UNEXPECTED_KEY', array('ok' => false, 'message' =>'unexpected key'));


?>