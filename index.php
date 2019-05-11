<?php
    include('includes/url_friendly.php'); 
    $rotasWeb = array(
	    '/'                              =>  'inicio.php',
        '/login/(?P<t>\d+)'              =>  'login.php',
        '/cadastro/paciente'             =>  'cadastroPaciente.php',
        '/terapeuta'                     =>  'dashboardTerapeuta.php',
        '/terapeuta/(?P<logout>\d+)'     =>  'dashboardTerapeuta.php',
        '/paciente'                      =>  'dashboardPaciente.php',
        '/cadastro/terapeuta'            =>  'cadastroTerapeuta.php',
        '/profile'                       =>  'profile.php',
    );
    url_response($rotasWeb);
?>