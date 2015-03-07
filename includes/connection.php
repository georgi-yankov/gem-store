<?php

define('SQL_HOST', 'localhost');
define('SQL_USER', 'user');
define('SQL_PASS', 'qwerty');
define('SQL_DB', 'gem_store');

$connection = mysqli_connect(SQL_HOST, SQL_USER, SQL_PASS, SQL_DB);

if (!$connection) {
	echo 'No database connection.';
	exit;
}

mysqli_set_charset($connection, 'utf8');