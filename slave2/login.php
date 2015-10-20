<?php 
	if($_GET['username'] != '' && $_GET['password'] != ''){
		$username = $_GET['username'];
		$password = $_GET['password'];
		if($username == 'admin' && $password == '123qwe'){
			echo 'client 2: success';
		}else{
			echo 'failed: incorrect username and/or password';
		}
	}else{
		echo 'failed: please fill in your username and/or password';
	}
?>
