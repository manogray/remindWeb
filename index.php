<?php
    include('includes/url_friendly.php'); 
    $rotasWeb = array(
	    '/'                              =>  'inicio.php',
        '/login/(?P<t>\d+)'              =>  'login.php',
        '/cadastro/paciente'             =>  'cadastro.php',
        '/dashboard'                     =>  'dashboard.php',
        '/dashboard/(?P<logout>\d+)'     =>  'dashboard.php',
        '/paciente'                      =>  'paciente.php',
        '/cadastro/terapeuta'            =>  'cadastroVoluntario.php',
        '/profile'                       =>  'profile.php',
    );
    url_response($rotasWeb);
?>