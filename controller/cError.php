<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación del archivo: 20/01/2025
     * @since 1.0.0
     */

    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
        $_SESSION['paginaAnterior']='error';
        header('Location: index.php');
        exit();
    }
    if(isset($_SESSION['error'])){
        $error=$_SESSION['error'];
    }else{
        $error=new ErrorApp('0', 'Prueba de error', 'Archivo', 'Linea', 'inicioPrivado');
    }
    $avError=[
        'codigo'=>$error->getCodError(),
        'descripcion'=>$error->getDescError(),
        'archivo'=>$error->getArchivoError(),
        'linea'=>$error->getLineaError(),
        'paginaSiguiente'=>$error->getPaginaSiguiente()
    ];
    $idioma=isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'en';
    require_once $aVistas['layout'];
?>