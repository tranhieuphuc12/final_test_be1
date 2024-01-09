<?php
session_start();
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'be1');
define('DB_PORT', '3306');
define('BASE_URL', $_SERVER['DOCUMENT_ROOT'] . '/final_test_be1/');

spl_autoload_register(function ($className) {
    require_once(BASE_URL . 'app/models/' . $className . '.php');
});