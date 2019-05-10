<?php
    include('includes/url_friendly.php'); 
    $urlpatterns = array(
	    '/'=>'inicio.php',
        '/login/(?P<t>\d+)'=>'login.php',
        '/cadastro'=>'cadastro.php',
        '/dashboard' => 'dashboard.php',
        '/paciente' => 'paciente.php',
        '/cadastroVoluntario' => 'cadastroVoluntario.php',
        '/profile' => 'profile.php',
    );
    url_response($urlpatterns);
?>