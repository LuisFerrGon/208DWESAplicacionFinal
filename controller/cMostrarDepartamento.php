<?php
    /**
     * @author Luis Ferreras González
     * @version 2.0.2 Fecha última modificación del archivo: 07/02/2025
     * @since 2.0.2
     */
    $idioma=isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'en';
    require_once 'core/lValidacionFormularios.php';
    require_once 'config/confDB.php';
    $departamentoEnCurso=$_SESSION['departamentoEnCurso'];
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
        $_SESSION['paginaAnterior']='mostrarDepartamento';
        header('Location: index.php');
        exit();
    }
    require_once $aVistas['layout'];
?>