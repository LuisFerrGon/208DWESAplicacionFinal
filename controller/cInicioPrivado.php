<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación del archivo: 20/01/2025
     * @since 1.0.0
     * @since 1.0.1 Cambio nombre variable
     */

    if(isset($_REQUEST['cerrarsesion'])){
        $_SESSION['paginaAnterior']='inicioPrivado';
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['detalle'])){
        $_SESSION['paginaAnterior']='inicioPrivado';
        $_SESSION['paginaEnCurso']='detalle';
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['rest'])){
        $_SESSION['paginaAnterior']='inicioPrivado';
        $_SESSION['paginaEnCurso']='rest';
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['mtoDepartamento'])){
        $_SESSION['paginaAnterior']='inicioPrivado';
        $_SESSION['paginaEnCurso']='mtoDepartamento';
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['cuenta'])){
        $_SESSION['paginaAnterior']='inicioPrivado';
        $_SESSION['paginaEnCurso']='miCuenta';
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['error'])){
        $_SESSION['paginaAnterior']='inicioPrivado';
        $_SESSION['paginaEnCurso']='error';
        header('Location: index.php');
        exit();
    }
    
    $idioma=isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'en';
    $oUsuarioActivo=$_SESSION['usuarioDAW208LoginLogoff'];
    $avInicioPrivado=[
        'descripcion'=>$oUsuarioActivo->getDescUsuario(),
        'fecha'=>strtotime($oUsuarioActivo->getFechaHoraUltimaConexionAnterior()),
        'conexiones'=>$oUsuarioActivo->getNumConexiones()
    ];
    require_once $aVistas['layout'];
?>