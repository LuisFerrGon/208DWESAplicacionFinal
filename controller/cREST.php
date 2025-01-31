<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.1 Fecha última modificación del archivo: 24/01/2025
     * @since 1.0.1
     */
    require_once 'model/REST.php';
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaAnterior']='rest';
        $_SESSION['paginaEnCurso']='inicioPrivado';
        header('Location: index.php');
        exit();
    }
    $idioma=isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'en';
    $oUsuarioActivo=$_SESSION['usuarioDAW208LoginLogoff'];
    $avRest=[
        'nasa'=>[
            'copyright'=>null,
            'fecha'=>null,
            'descripcion'=>null,
            'titulo'=>null,
            'url'=>null
        ]
    ];
    if(isset($_REQUEST['fechafotoNasa'])){
        $_SESSION['fechaNASA']= date_create($_REQUEST['fechafotoNasa']);
    }else{
        $_SESSION['fechaNASA']=date_create();
    }
    $oFotoNasa=REST::apiNasa($_SESSION['fechaNASA']);
    if($oFotoNasa instanceof fotoNASA){
        $avRest['nasa']['copyright']=$oFotoNasa->getCopyright();
        $avRest['nasa']['fecha']=$oFotoNasa->getFecha();
        $avRest['nasa']['descripcion']=$oFotoNasa->getDescripcion();
        $avRest['nasa']['titulo']=$oFotoNasa->getTitulo();
        $avRest['nasa']['url']=$oFotoNasa->getUrl();
    }
    require_once $aVistas['layout'];
?>