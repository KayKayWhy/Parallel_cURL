<?php 
	if($_POST['username'] != '' && $_POST['password'] != ''){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($username == 'admin' && $password == '123qwe'){
			echo 'client 1: success';
		}else{
			echo 'failed: incorrect username and/or password';
		}
	}else{
		echo 'failed: please fill in your username and/or password';
	}
?>
