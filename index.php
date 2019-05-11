<?php
    include('includes/url_friendly.php'); 
    $rotasWeb = array(
	    '/'                              =>  'inicio.php',
        '/login/(?P<t>\d+)'              =>  'login.php',
        '/terapeuta'                     =>  'dashboardTerapeuta.php',
        '/terapeuta/(?P<logout>\d+)'     =>  'dashboardTerapeuta.php',
        '/terapeuta/meuperfil'           =>  'profileTerapeuta.php',
        '/cadastro/terapeuta'            =>  'cadastroTerapeuta.php',
        '/paciente'                      =>  'dashboardPaciente.php',
        '/paciente/(?P<logout>\d+)'      =>  'dashboardPaciente.php',
        '/paciente/meuperfil'            =>  'profilePaciente.php',
        '/cadastro/paciente'             =>  'cadastroPaciente.php',
    );
    url_response($rotasWeb);
?>