<?php 
	/*	Multi cURL
	*	purpose: cURL one or more than one URL at a time
	*	example of required params:
	*		$data['client1']['url'] = 'http://xxx.xxx.xxx.xxx/login.php';
	*		$data['client1']['post']['username'] = $_GET['username'];
	*		$data['client1']['post']['password'] = $_GET['password'];
	*/
	function multi_curl($data){
		$mh = curl_multi_init();
		$query_str = '';
		
		foreach($data as $a => $b){
			$ch[$a] = curl_init();
			
			if(isset($b['post'])){
				if(is_array($b['post'])){
					if(!empty($b['post'])){
						curl_setopt($ch[$a], CURLOPT_POST, 1);
						curl_setopt($ch[$a], CURLOPT_POSTFIELDS, $b['post']);
					}
				}
			}else if(isset($b['get'])){
				$query_str .= '?';
				
				foreach($b['get'] as $c => $d){
					$query_str .= $c . '=' . $d . '&';
				}
				
				$query_str = substr($query_str, 0, -1);
			}
			
			curl_setopt($ch[$a], CURLOPT_URL, $b['url'] . $query_str);
			curl_setopt($ch[$a], CURLOPT_HEADER, 0);
			curl_setopt($ch[$a], CURLOPT_RETURNTRANSFER, 1);
			
			curl_multi_add_handle($mh, $ch[$a]);
		}
		
		$execute = null;
		
		do{
			curl_multi_exec($mh, $execute);
		}while($execute > 0);
		
		foreach($ch as $e => $f) {
			$output[$e] = curl_multi_getcontent($f);
			curl_multi_remove_handle($mh, $f);
		}
		
		curl_multi_close($mh);
		
		return $output;
	}
?>
