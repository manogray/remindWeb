<?php
    include('includes/url_friendly.php'); 
    $urlpatterns = array(
	    '/'=>'inicio.php',
        '/login/(?P<t>\d+)'=>'login.php', 
        '/cadastro'=>'cadastro.php',
        '/cadastroVoluntario' => 'cadastroVoluntario.php',
        '/dashboard' => 'dashboard.php',
        '/profile' => 'profile.php',
    );
    url_response($urlpatterns);
?>