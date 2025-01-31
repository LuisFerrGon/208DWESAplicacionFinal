<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.1 Fecha última modificación del archivo: 31/01/2025
     * @since 1.0.1
     */
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
    $aDepartamentos=[];
    try{
        $consulta=<<<QUERY
            SELECT * FROM T02_Departamento
            WHERE T02_DescDepartamento LIKE :descripcion
            ;
        QUERY;
        $resultado=DBPDO::ejecutarConsulta($consulta, $aCondicionesBusqueda, false);
        while($departamento=$resultado->fetchObject()){
            array_push($aDepartamentos, new Departamento(
                $departamento->T02_CodDepartamento,
                $departamento->T02_DescDepartamento,
                $departamento->T02_FechaCreacionDepartamento,
                $departamento->T02_VolumenDeNegocio,
                $departamento->T02_FechaBajaDepartamento
            ));
        };
    }catch(Exception $ex){
        $_SESSION['paginaAnterior']='mtoDepartamento';
        $_SESSION['paginaEnCurso']='error';
        $_SESSION['error']=new ErrorApp(
            $ex->getCode(),
            $ex->getMessage(),
            $ex->getFile(),
            $ex->getLine(),
            $_SESSION['paginaAnterior']
        );
        header('Location: index.php');
        exit();
    }
    $idioma=isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'en';
    $oUsuarioActivo=$_SESSION['usuarioDAW208LoginLogoff'];
    require_once $aVistas['layout'];
    
?>