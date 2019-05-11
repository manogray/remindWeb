<?php
    include('includes/url_friendly.php'); 
    $rotasWeb = array(
	    //'/'                     =>  'inicio.php',
        '/'                     =>  'login.php',
        '/cadastro/paciente'    =>  'cadastro.php',
        '/dashboard'            =>  'dashboard.php',
        //'/dashboard/(?P<logout>\d+)'     =>  'dashboard.php',
        '/paciente'             =>  'paciente.php',
        '/cadastro/terapeuta'   =>  'cadastroVoluntario.php',
        '/profile'              =>  'profile.php',
        '/meusPacientes' => 'meusPacientes.php',
    );
    url_response($rotasWeb);
?>