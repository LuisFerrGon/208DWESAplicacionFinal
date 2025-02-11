<?php
    /**
     * @author Luis Ferreras González
     * @version 2.0.3 Fecha última modificación del archivo: 11/02/2025
     * @since 1.0.1
     * @since 1.0.2
     * @since 2.0.2 Modificación a modificar
     *              Mostrar
     * @since 2.0.3 Eliminar
     *              Crear
     */
    require_once 'model/Departamento.php';
    require_once 'model/DepartamentoPDO.php';
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
    if($resultado=preg_grep('/eliminar[A-Z]{3}/', array_keys($_REQUEST))){
        $_SESSION['departamentoEnCurso']=DepartamentoPDO::buscarPorCodigo(substr($resultado[0], -3));
        $_SESSION['paginaEnCurso']='eliminarDepartamento';
        $_SESSION['paginaAnterior']='mtoDepartamento';
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['crear'])){
        $_SESSION['paginaEnCurso']='crearDepartamento';
        $_SESSION['paginaAnterior']='mtoDepartamento';
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso']='inicioPrivado';
        $_SESSION['paginaAnterior']='mtoDepartamento';
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['descripcionDep'])){
        $_SESSION['descripcionDep']=$_REQUEST['descripcionDep'];
    }
    if(!isset($_SESSION['descripcionDep'])){
        $_SESSION['descripcionDep']=null;
    }
    $aCondicionesBusqueda=[
        ':descripcion' => "%".$_SESSION['descripcionDep']."%"
    ];
    $aDepartamentos= DepartamentoPDO::buscarDepartamentos($aCondicionesBusqueda);
    $idioma=isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'en';
    $oUsuarioActivo=$_SESSION['usuarioDAW208AppFinal'];
    require_once $aVistas['layout'];
    
?>