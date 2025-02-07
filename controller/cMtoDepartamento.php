<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.2 Fecha última modificación del archivo: 06/02/2025
     * @since 1.0.1
     * @since 1.0.2
     */
    $clavesRequest= array_keys($_REQUEST);
    if($resultado=preg_grep('/modificar\([A-Z]{3}\)/', $clavesRequest)){
        $_SESSION['departamentoEnCurso']=DepartamentoPDO::buscarPorCodigo(substr($resultado[0], -4, 3));
        $_SESSION['paginaEnCurso']='modificarDepartamento';
        $_SESSION['paginaAnterior']='mtoDepartamento';
        header('Location: index.php');
        exit();
    }    
    require_once 'model/Departamento.php';
    require_once 'model/DepartamentoPDO.php';
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
        $_SESSION['paginaAnterior']='wip';
        header('Location: index.php');
        exit();
    }
    if(!isset($_REQUEST['descripionDep'])){
        $_SESSION['descripionDep']=null;
    }else{
        $_SESSION['descripionDep']=$_REQUEST['descripionDep'];
    }
    $aCondicionesBusqueda=[
        ':descripcion' => "%".$_SESSION['descripionDep']."%"
    ];
    $aDepartamentos= DepartamentoPDO::cargarArrayDepartamentos($aCondicionesBusqueda);
    $idioma=isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'en';
    $oUsuarioActivo=$_SESSION['usuarioDAW208LoginLogoff'];
    require_once $aVistas['layout'];
    
?>