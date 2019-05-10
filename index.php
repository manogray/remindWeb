<?php
    include('includes/url_friendly.php'); 
    $urlpatterns = array(
	    '/'=>'inicio.php',
        '/login/(?P<t>\d+)'=>'login.php',
        '/cadastro'=>'cadastro.php',
        '/dashboard' => 'dashboard.php',
        '/paciente' => 'paciente.php',
    );
    url_response($urlpatterns);
?>