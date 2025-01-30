<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.1 Fecha última modificación del archivo: 30/01/2025
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
    $aCondiciones=[
        ':descripcion' => "%".$_SESSION['descripionDep']."%"
    ];
    $aDepartamentos=[];
    try{
        $consulta=<<<QUERY
            SELECT * FROM T02_Departamento
            WHERE T02_DescDepartamento LIKE :descripcion
            ;
        QUERY;
        $resultado=DBPDO::ejecutarConsulta($consulta, $aCondiciones);
        do{
            array_push($aDepartamentos, new Departamento(
                $resultado["T02_CodDepartamento"],
                $resultado["T02_DescDepartamento"],
                $resultado["T02_FechaCreacionDepartamento"],
                $resultado["T02_VolumenDeNegocio"],
                $resultado["T02_FechaBajaDepartamento"]
            ));
        }while($resultado->fetchObject());
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