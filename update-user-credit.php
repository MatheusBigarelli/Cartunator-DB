<?php
	require 'config.php';
	require 'connection.php';
	require 'database.php';

	$user_to_update = $_GET['ra'];
	$ammount_to_put = $_GET['credito'];

	$data = array('credito'=>$ammount_to_put);
	$where = "WHERE ra=".$user_to_update;

	$old_user = DBRead('users', "WHERE ra = '{$user_to_update}'", 'credito');
	echo 'Credito antes (array): ';
	var_dump($old_user);
	echo '<br>';

	$old_user = implode(',' ,$old_user);
	echo 'Credito antes (string): ';
	var_dump($old_user);
	echo '<br>';

	$credit_int = intval($old_user);
	$credit_int += intval($ammount_to_put);
	echo 'Credito depois int: ';
	var_dump($credit_int);
	echo '<br>';

	$updated_user = array('credito'=>strval($credit_int));
	var_dump($updated_user);
	echo '<br>';

	var_dump(DBUpdate('users', $updated_user, $where));
?>
