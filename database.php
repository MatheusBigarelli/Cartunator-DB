<?php
	//Faz query
	function DBMakeQuery($query) {
		$link   = DBConnect();
		$result = @mysqli_query($link, $query) or die(mysqli_error($link));

		DBCLose($link);
		return $result;
	}


	function DBCreateUser($table, array $user) {
		$table = DB_PREFIX.'_'.$table;

		$fields = implode(', ' ,array_keys($user));
		$values = "'".implode("', '", $user)."'";

		$query = "INSERT INTO {$table} ( {$fields} ) VALUES ( {$values} )";

		return DBMakeQuery($query);
	}


	function DBRead($table, $params = null, $fields = 'ra, nome, credito') {
		$table = DB_PREFIX.'_'.$table;

		//Coloca espaço entre argumento do from e params caso eles existam
		$params = ($params) ? " {$params}" : null;

		$query = "SELECT {$fields} FROM {$table}{$params}";
		$result = DBMakeQuery($query);

		if (!mysqli_num_rows($result))
			return false;

		$data = mysqli_fetch_assoc($result);

		return $data;
	}


	function DBUpdate($table, array $data, $where=null) {
		$table = DB_PREFIX.'_'.$table;
		$where = ($where) ? " {$where}" : null;

		foreach ($data as $key => $value) {
			$fields[] = "{$key} = '{$value}'";
		}

		$fields = implode(", ", $fields);


		$query = "UPDATE {$table} SET {$fields}{$where}";
		
		return DBMakeQuery($query);
	}


	function DBDelete($table, $where) {
		$table = DB_PREFIX.'_'.$table;
		$where = ($where) ? " {$where}" : null;

		$query = "DELETE FROM {$table}{$where}";
		var_dump($query);
		return DBMakeQuery($query);
	}
?>
