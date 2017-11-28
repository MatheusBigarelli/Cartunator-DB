<?php

	require 'config.php';
	require 'connection.php';
	require 'database.php';

	$user=array(
		'ra'      => $_GET['ra'],
		'nome'    => $_GET['nome'],
		'credito' => $_GET['credito'],
		'senha'   => $_GET['senha']
	);

	var_dump($user);
	echo '<br>';

	var_dump(DBCreateUser('users', $user));

?>
