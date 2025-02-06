<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.2 Fecha última modificación del archivo: 06/02/2025
     * @since 1.0.2
     */
    $idioma=isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'en';
    require_once 'core/lValidacionFormularios.php';
    require_once 'config/confDB.php';
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
        $_SESSION['paginaAnterior']='wip';
        header('Location: index.php');
        exit();
    }
    define('OBLIGATORIO', 1);
    define('MAX_DESC', 255);
    define('MIN_DESC', 1);
    define('MAX_VOLUMEN', PHP_FLOAT_MAX);
    define('MIN_VOLUMEN', 0);
    $aErrores=[
        'descripcionDepartamento'=>null,
        'volumenDepartamento'=>null
    ];
    $entradaOK=true;
    if(isset($_REQUEST['modificar'])){
        $aErrores['descripcionDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['descripcionDepartamento'], MAX_DESC, MIN_DESC, OBLIGATORIO);
        $aErrores['volumenDepartamento']= validacionFormularios::comprobarFloat($_REQUEST['volumenDepartamento'], MAX_VOLUMEN, MIN_VOLUMEN, OBLIGATORIO);
        foreach($aErrores as $value){
            if($value!=null){
                $entradaOK=false;
            }
        }
    }else{
        $entradaOK=false;
    }
    if($entradaOK){
        DepartamentoPDO::modificarDepartamento($codigo, $_REQUEST['descripcionDepartamento'], $_REQUEST['volumenDepartamento']);
        $_SESSION['paginaEnCurso']='mtoDepartamento';
        $_SESSION['paginaAnterior']='modificarDepartamento';
        header('Location: index.php');
        exit();
    }
    require_once $aVistas['layout'];
?>