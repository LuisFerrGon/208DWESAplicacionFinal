<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación del archivo: 20/01/2025
     * @since 1.0.0
     */

    //Configuración de la aplicación
    require_once 'config/confAPP.php';
    //Configuración de la base de datos
    require_once 'config/confDB.php';
    //Se crea o inicia la sesión
    session_start();
    //Si no hay pagina en cuso en la sesion se asigna una
    if(!isset($_SESSION['paginaEnCurso'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
    }
    // Si la cookie está vacia se crea y se le pone un valor por defecto
    if(!isset($_COOKIE['idioma'])){
        setcookie('idioma', 'en', time()+60, '/');
    }
    // Si el idioma enviado está vacio o es null
    if(isset($_REQUEST['idioma'])){
        setcookie('idioma', $_REQUEST['idioma'], time() + 60, '/');
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }
    //Se carga la página
    require_once $aControladores[$_SESSION['paginaEnCurso']];
?>