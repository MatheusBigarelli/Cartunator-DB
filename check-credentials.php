<?php
	require 'config.php';
	require 'connection.php';
	require 'database.php';

	$ra = $_GET['ra'];
	$password = $_GET['senha'];

	//Passamos null como parâmetro para não dar pau na hora de estabelecer quais são realmente os parâmetros da função no database.php
	$queryResult = DBRead('users', null, "ra, senha");


	if ($queryResult['ra'] == $ra)
		if ($queryResult['senha'] == $password)
			echo 'ok';
	else
		echo 'ko';
?>
