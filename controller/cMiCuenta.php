<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación del archivo: 20/01/2025
     * @since 1.0.0
     */

    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
        $_SESSION['paginaAnterior']='wip';
        header('Location: index.php');
        exit();
    }
    $idioma=isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'en';
    $oUsuarioActivo=$_SESSION['usuarioDAW208AppFinal'];
    $avMiCuenta=[
        'codigo'=>$oUsuarioActivo->getCodUsuario(),
        'descripcion'=>$oUsuarioActivo->getDescUsuario(),
        'ultimaConexion'=>$oUsuarioActivo->getFechaHoraUltimaConexion(),
        'conexionAnterior'=>strtotime($oUsuarioActivo->getFechaHoraUltimaConexionAnterior()),
        'conexiones'=>$oUsuarioActivo->getNumConexiones()
    ];
    require_once $aVistas['layout'];
?>