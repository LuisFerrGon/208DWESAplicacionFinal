<?php
    /**
     * @author Luis Ferreras González
     * @version 2.0.3 Fecha última modificación del archivo: 11/02/2025
     * @since 2.0.3
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
    define('TAM_COD', 3);
    define('MAX_DESC', 255);
    define('MIN_DESC', 1);
    define('MAX_VOLUMEN', PHP_FLOAT_MAX);
    define('MIN_VOLUMEN', 0);
    $aErrores=[
        'codigoDepartamento'=>null,
        'descripcionDepartamento'=>null,
        'volumenDepartamento'=>null
    ];
    $entradaOK=true;
    if(isset($_REQUEST['codigoDepartamento'])){
        $_REQUEST['codigoDepartamento']=strtoupper($_REQUEST['codigoDepartamento']);
    }
    if(isset($_REQUEST['crear'])){
        $aErrores['codigoDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['codigoDepartamento'], TAM_COD, TAM_COD, OBLIGATORIO);
        $aErrores['descripcionDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['descripcionDepartamento'], MAX_DESC, MIN_DESC, OBLIGATORIO);
        $aErrores['volumenDepartamento']= validacionFormularios::comprobarFloat($_REQUEST['volumenDepartamento'], MAX_VOLUMEN, MIN_VOLUMEN, OBLIGATORIO);
        if($aErrores['codigoDepartamento']==null){
            $resultado= DepartamentoPDO::buscarPorCodigo($_REQUEST['codigoDepartamento']);
            if($resultado!=null){
                $aErrores['codigoDepartamento']="Este código de departamento ya está en uso.";
            }
        }
        foreach($aErrores as $value){
            if($value!=null){
                $entradaOK=false;
            }
        }
    }else{
        $entradaOK=false;
    }
    if($entradaOK){
        DepartamentoPDO::crearDepartamento($_REQUEST['codigoDepartamento'], $_REQUEST['descripcionDepartamento'], $_REQUEST['volumenDepartamento']);
        $_SESSION['paginaEnCurso']='mtoDepartamento';
        $_SESSION['paginaAnterior']='crearDepartamento';
        header('Location: index.php');
        exit();
    }
    require_once $aVistas['layout'];
?>