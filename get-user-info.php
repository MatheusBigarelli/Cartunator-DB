<?php

	require 'config.php';
	require 'connection.php';
	require 'database.php';

	$result = DBRead('users', "WHERE ra = '{$_GET['ra']}'");

	$result = implode(',', $result);
	echo $result;
?>
