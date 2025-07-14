<?php

$db['host']="localhost";
$db['username']="root";
$db['password']="";
$db['db_name']="login";
 
foreach ($db as $key => $value) {
    define(strtoupper($key),$value);
}

?>