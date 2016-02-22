<?php 
//lista erro do valitron
function validationErrorsList($erros, $separador){
	$string = [];
	foreach ($erros as $key => $value) {
		if (is_array($erros)) {
			$string[] = $value[0];
		}else{
			$string[] = $value;
		}
	}
	return join($string, $separador);
}

//pega vairavel por querystring
function pega_query($key){
	return isset($_GET[$key]) ? $_GET[$key] : null;
}

//pega vairavel por metodo post
function pega_post($key){
	return isset($_POST[$key]) ? $_POST[$key] : null;
}

?>