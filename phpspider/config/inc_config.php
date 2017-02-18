<?php

$GLOBALS['config']['db'] = array(
    'host'  => '127.0.0.1',
    'port'  => 8889,
    'user'  => 'root',
    'pass'  => 'root',
    'name'  => 'wenzhangqu',
);

$GLOBALS['config']['redis'] = array(
    'host'      => '127.0.0.1',
    'port'      => 6379,
    'pass'      => '',
    'prefix'    => 'wenzhangqu',
    'timeout'   => 30,
);

include "inc_mimetype.php";
