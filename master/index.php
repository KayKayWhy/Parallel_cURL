<?php
	if(isset($_GET['submit'])){
		$data['client1']['url'] = 'http://192.168.19.157/kaukeanyuen/client1/login.php';
		$data['client1']['post']['username'] = $_GET['username'];
		$data['client1']['post']['password'] = $_GET['password'];
		
		$data['client2']['url'] = 'http://192.168.19.157/kaukeanyuen/client2/login.php';
		$data['client2']['get']['username'] = $_GET['username'];
		$data['client2']['get']['password'] = $_GET['password'];
		
		include('curl.php');
		
		$responses = multi_curl($data);
		$result = '';
		
		foreach($responses as $response){
			$result .= $response . '<br/>';
		}
	}
?>
<html>
	<head>
		<title>LOGIN</title>
		<style>
			div, .msg{
				margin: 5px 5px 5px 5px;
			}
			.msg{
				float: left;
				color: red;
				font-family: 'Courier New', Times, serif;
				font-weight: bold;
			}
			input{
				margin: auto;
				width: 100%;
				border: 1px solid #8AC007;
				padding: 10px;
			}
			input[type=submit]{
				background-color: #FF953D;
				font-family: 'Courier New', Times, serif;
				font-weight: bold;
			}
			fieldset{
				width: 30%;
				border: 3px solid #8AC007;
			}
			input::-webkit-input-placeholder {
				font-family: 'Courier New', Times, serif;
				font-weight: bold;
			}

			input:-ms-input-placeholder {
				font-family: 'Courier New', Times, serif;
				font-weight: bold;
			}

			input:-moz-placeholder {
				font-family: 'Courier New', Times, serif;
				font-weight: bold;
			}

			input::-moz-placeholder {
				font-family: 'Courier New', Times, serif;
				font-weight: bold;
			}
			input{
				font-family: 'Courier New', Times, serif;
				font-weight: bold;
			}
		</style>
	</head>
	
	<body>
		<form action='?' method='get'>
			<fieldset>
				<div>
					<input type='text' name='username' placeholder='Username' />
				</div>
				<div>
					<input type='password' name='password' placeholder='Password' />
				</div>
				<div>
					<input type='submit' name='submit' value='Submit' />
				</div>
				<label class='msg'><?php if(isset($result)) echo $result; ?></label>
			</fieldset>
		</form>
	</body>
</html>
