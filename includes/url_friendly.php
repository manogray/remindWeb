<?php

	//diretório do projeto
	if(!defined('PROJECT_DIR'))
		define('PROJECT_DIR', 'PsySchool');
		
	// diretório da aplicacao
             if(!defined('APPLICATION_DIR'))	
		define('APPLICATION_DIR', 'pages');

	// URL enviado
            if(!defined('REQUEST_URI'))	
        define('REQUEST_URI'	,str_replace('/'.PROJECT_DIR,'',$_SERVER['REQUEST_URI']));
        
	function url_response($rotasWeb){
			foreach($rotasWeb as $pcre=>$app){
				if(preg_match("@^{$pcre}$@",REQUEST_URI,$_GET)){
						include(APPLICATION_DIR.'/'.$app);
						exit();
				}else{
					$msg = '<h1>404 Página não existe</h1>';
				}
			}
			echo $msg;
		return;		
	}

?>