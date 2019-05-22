<?php

	//diretório do projeto
	if(!defined('PROJECT_DIR'))
		define('PROJECT_DIR', 'http://127.0.0.1');
		
	// diretório da aplicacao
             if(!defined('APPLICATION_DIR'))	
		define('APPLICATION_DIR', '');

	// URL enviado
            if(!defined('REQUEST_URI'))	
		define('REQUEST_URI',str_replace(PROJECT_DIR,'',$_SERVER['REQUEST_URI']));

	
 
	function url_response($urlpatterns){
			foreach($urlpatterns as $pcre=>$app){
				if(preg_match("@^{$pcre}$@",REQUEST_URI,$_GET)){
						include($app);
						exit();
				}else{
					$msg = '<h1>404 Página não existe</h1>';
				}
			}
			echo $msg;
		return;		
	}

?>