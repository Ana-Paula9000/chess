<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'chessmaster';

$external_url = '/functions.php';

$connect=mysqli_connect("localhost","root","","formulario");

if (!$connect) {

	echo "error 4004";

	exit;

}

function cleanMe($input) {
   $input = mysql_real_escape_string($input);
   $input = htmlspecialchars($input, ENT_IGNORE, 'utf-8');
   $input = strip_tags($input);
   $input = stripslashes($input);
   return $input;
}

if(!isset($_SESSION['security'])){
	$_SESSION['security'] = md5(rand()).md5(rand()).md5(rand());
}

function limitarTexto($texto, $limite){
	$texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
	return $texto;
}

function strip_tags_content($text, $tags = '', $invert = FALSE) { 

	preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags); 
	$tags = array_unique($tags[1]); 
	
	if(is_array($tags) AND count($tags) > 0) { 
		if($invert == FALSE) { 
			return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text); 
		} 
		else { 
			return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text); 
		} 
	} 
	elseif($invert == FALSE) { 
		return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text); 
	} 
	return $text; 
} 

function tirarAcentos($string){
	return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/"),explode(" ","a A e E i I o O u U n N C c"),$string);
}

?>