<?php

error_reporting(E_ALL ^ E_NOTICE);

putenv("TZ=America/Sao_Paulo");
date_default_timezone_set("America/Sao_Paulo");

/**
 * Define document paths
 */
define('SERVER_ROOT' , '.');
define('SITE_ROOT' , 'http://www.talentu.com.br');

/**
 * Fetch the router
 */
require_once(SERVER_ROOT . '/controllers/' . 'router.php');