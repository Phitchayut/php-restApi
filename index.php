<?php
use AltoRouter as Router;

require_once realpath(__DIR__ . "/vendor/autoload.php");

$router = new Router();

$router->map('GET', '/api/v1/user', function () {
    require __DIR__ . '/api/user/get_all.php';
});


$match = $router->match();

if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}

