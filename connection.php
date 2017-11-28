<?php

	//Abre conexão com mysql
	function DBConnect() {
		$link = @mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die(mysqli_connect_error());
		mysqli_set_charset($link, DB_CHARSET) or die(mysqli_error($link));
		return $link;
	}
	//Fecha conexão
	function DBClose($link) {
		@mysqli_close($link) or die(mysqli_error($link));
	}
?>
