<?php
        include('url_response.php'); 
        $urlpatterns = array(
		''=>'index.php',
		'/'=>'index.php',
		'/Xadrez-Online'=>'online.php',
		
		'/Registro'=>'registro.php',
		'/Cidades'=>'cidades.php',

		'/Desenvolvimento'=>'desenvolvimento.php',

	

		'/Xadrez_Aovivo/(?P<players>\S+)/(?P<id>\S+)'=>'online_game.php',



		
         );
        url_response($urlpatterns);
?>