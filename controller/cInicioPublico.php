<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación del archivo: 20/01/2025
     * @since 1.0.0
     */

    // Redirige a la página de login si se pulsa el botón
    if(isset($_REQUEST['login'])){
        $_SESSION['paginaAnterior']='inicioPublico';
        $_SESSION['paginaEnCurso']='login';
        header('Location: index.php');
        exit();
    }
    require_once $aVistas['layout'];
?>