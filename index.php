<!DOCTYPE html>
<html lang="">
    <head>
        <?php include("includes/head.php"); ?>
        <?php include("database/populador.php"); ?>
    </head>

    <body>
        <div class="conteiner-inicio">
            <div class="filtro">
                <div class="bkg-inicio">
                    <div class="logo-remind" style="color:white;">
                        Re<span style="color: #0092ca;" >Mind</span>
                    </div>
                    <div class="box-inicio p-l-50 p-r-50 p-b-30">
                        <a class="categoria" href="login.php?t=0">
                            <div class="menu-inicio">
                                <i class="fas fa-user-md icone-inicio"></i>
                                <span class="categoria">
                                    Terapeuta
                                </span>
                            </div>
                        </a>
                        <a class="categoria" href="login.php?t=1">
                            <div class="menu-inicio">
                                <i class="fas fa-heartbeat icone-inicio"></i>
                                <span class="categoria">
                                    Paciente
                                </span>
                            </div>
                        </a>
                        <a class="categoria" href="login.php?t=2">
                            <div class="menu-inicio">
                                <i class="fas fa-chalkboard-teacher icone-inicio"></i>
                                <span class="categoria">
                                    Professor
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        
    </body>
</html> 