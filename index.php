<?php
    include('includes/url_friendly.php'); 
    $urlpatterns = array(
	    '/'=>'inicio.php',
        '/login/(?P<t>\d+)'=>'login.php', 
        '/cadastro'=>'cadastro.php',
        '/cadastroVoluntario' => 'cadastroVoluntario.php',
    );
    url_response($urlpatterns);
?>