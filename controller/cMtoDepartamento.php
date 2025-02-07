<?php
    /**
     * @author Luis Ferreras González
     * @version 2.0.2 Fecha última modificación del archivo: 07/02/2025
     * @since 1.0.1
     * @since 1.0.2
     * @since 2.0.2 Modificación a modificar
     *              Mostrar, eliminar
     */
    if($resultado=preg_grep('/modificar[A-Z]{3}/', array_keys($_REQUEST))){
        $_SESSION['departamentoEnCurso']=DepartamentoPDO::buscarPorCodigo(substr($resultado[0], -3));
        $_SESSION['paginaEnCurso']='modificarDepartamento';
        $_SESSION['paginaAnterior']='mtoDepartamento';
        header('Location: index.php');
        exit();
    }
    if($resultado=preg_grep('/mostrar[A-Z]{3}/', array_keys($_REQUEST))){
        $_SESSION['departamentoEnCurso']=DepartamentoPDO::buscarPorCodigo(substr($resultado[0], -3));
        $_SESSION['paginaEnCurso']='mostrarDepartamento';
        $_SESSION['paginaAnterior']='mtoDepartamento';
        header('Location: index.php');
        exit();
    }
//    if($resultado=preg_grep('/eliminar[A-Z]{3}/', array_keys($_REQUEST))){
//        $_SESSION['departamentoEnCurso']=DepartamentoPDO::buscarPorCodigo(substr($resultado[0], -3));
//        DepartamentoPDO::eliminarDepartamento($_SESSION['departamentoEnCurso']->getCodigo());
//        header('Location: index.php');
//        exit();
//    }
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