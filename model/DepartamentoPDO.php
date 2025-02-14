<?php
    /**
     * Clase DepartamentoPDO
     * 
     * Clase para funciones de departamento
     * 
     * @author Luis Ferreras González
     * @version 2.0.3 Fecha última modificación: 14/02/2025
     * @since 1.0.1
     * @since 1.0.2 Función modificarDepartamento, buscarPorCodigo
     * @since 2.0.2 Modificación a buscarPorCodigo
     *              Función eliminarDepartamento
     * @since 2.0.3 Función crearDepartamento
     *              Función bajaLogica
     *              Función altaLogica
     *              Modificacion buscarDepartamentos
     */
    class DepartamentoPDO{
        /**
         * Función buscarDepartamentos
         * 
         * Funcion buscar departamentos dadas unas condiciones
         * 
         * @param array $aCondiciones Array con las condiciones de busqueda
         * @return array Array con todos los departamentos que se adhieren a las condiciones
         * @author Luis Ferreras González
         * @version 2.0.3 Fecha última modificación: 14/02/2025
         * @since 1.0.2
         * @since 2.0.3 Devuelve enBaja y anAlta
         */
        public static function buscarDepartamentos($aCondiciones){
            try{
                $aDepartamentos=[];
                $consultaInicio=<<<QUERY
                    SELECT * FROM T02_Departamento
                    WHERE T02_DescDepartamento LIKE '{$aCondiciones['descripcion']}'
                QUERY;
                switch($aCondiciones['altaBaja']){
                    case 'En alta':
                        $consultaMedio="AND T02_FechaBajaDepartamento IS NULL";
                        break;
                    case 'En baja':
                        $consultaMedio="AND T02_FechaBajaDepartamento IS NOT NULL";
                        break;
                    default:
                        $consultaMedio="";
                        break;
                }
                $consultaFin=<<<QUERY
                    ;
                QUERY;
                $consulta=$consultaInicio.$consultaMedio.$consultaFin;
                $resultado=DBPDO::ejecutarConsulta($consulta, null, false);
                while($departamento=$resultado->fetchObject()){
                    array_push($aDepartamentos, new Departamento(
                        $departamento->T02_CodDepartamento,
                        $departamento->T02_DescDepartamento,
                        $departamento->T02_FechaCreacionDepartamento,
                        $departamento->T02_VolumenDeNegocio,
                        $departamento->T02_FechaBajaDepartamento
                    ));
                }
                return $aDepartamentos;
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
        }
        /**
         * Función buscarPorCodigo
         * 
         * Función para buscar departamentos según su código
         * 
         * @param string $codigo Código del departamento a buscar
         * @author Luis Ferreras González
         * @version 2.0.2 Fecha última modificación: 07/02/2025
         * @since 1.0.2
         * @since 2.0.2 Cambio de variable resultado
         */
        public static function buscarPorCodigo($codigo){
            $consulta=<<<SQL
                SELECT * FROM T02_Departamento
                WHERE T02_CodDepartamento='{$codigo}';
            SQL;
            $resultado=DBPDO::ejecutarConsulta($consulta);
            if($resultado instanceof PDOException){
                $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
                $_SESSION['error']=new ErrorApp(
                    $resultado->getCode(),
                    $resultado->getMessage(),
                    $resultado->getFile(),
                    $resultado->getLine(),
                    $_SESSION['paginaAnterior']
                );
                $_SESSION['paginaEnCurso']='error';
                header('Location: index.php');
                exit();
            }else{
                if($resultado!=null){
                    return new Departamento(
                        $codigo,
                        $resultado->T02_DescDepartamento,
                        $resultado->T02_FechaCreacionDepartamento,
                        $resultado->T02_VolumenDeNegocio,
                        $resultado->T02_FechaBajaDepartamento
                    );
                }else{
                    return null;
                }
            }
        }
        /**
         * Función modificarDepartamento
         * 
         * Función opara modificar la descripción y volumen de un departamento
         * 
         * @param string $codigo Código del usuario a modificar
         * @param string $descripcion Nueva descripción del departamento
         * @param float $volumen Nuevo volumen del departamento
         * @author Luis Ferreras González
         * @version 1.0.2 Fecha última modificación: 06/02/2025
         * @since 1.0.2
         */
        public static function modificarDepartamento($codigo, $descripcion, $volumen){
            $consulta=<<<SQL
                UPDATE T02_Departamento SET
                    T02_DescDepartamento='{$descripcion}',
                    T02_VolumenDeNegocio={$volumen}
                WHERE T02_CodDepartamento='{$codigo}';
            SQL;
            $resultado=DBPDO::ejecutarConsulta($consulta);
            if($resultado instanceof PDOException){
                $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
                $_SESSION['error']=new ErrorApp(
                    $resultado->getCode(),
                    $resultado->getMessage(),
                    $resultado->getFile(),
                    $resultado->getLine(),
                    $_SESSION['paginaAnterior']
                );
                $_SESSION['paginaEnCurso']='error';
                header('Location: index.php');
                exit();
            }
        }
        /**
         * Función eliminarDepartamento
         * 
         * Función para eliminar un departamento dado su código.
         * 
         * @param string $codigo Código del departamento a eliminar
         * @author Luis Ferreras González
         * @version 2.0.2 Fecha última modificación: 07/02/2025
         * @since 2.0.2
         */
        public static function eliminarDepartamento($codigo){
            $consulta=<<<SQL
                DELETE FROM T02_Departamento
                WHERE T02_CodDepartamento='{$codigo}';
            SQL;
            $resultado=DBPDO::ejecutarConsulta($consulta);
            if($resultado instanceof PDOException){
                $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
                $_SESSION['error']=new ErrorApp(
                    $resultado->getCode(),
                    $resultado->getMessage(),
                    $resultado->getFile(),
                    $resultado->getLine(),
                    $_SESSION['paginaAnterior']
                );
                $_SESSION['paginaEnCurso']='error';
                header('Location: index.php');
                exit();
            }
        }
        /**
         * Función crearDepartamento
         * 
         * Función para crear un departamento
         * 
         * @param string $codigo Código del departamento
         * @param string $descripcion Descripción del departamento
         * @param float $volumen Volumen del departamento
         * @author Luis Ferreras González
         * @version 2.0.3 Fecha última modificación: 10/02/2025
         * @since 2.0.3
         */
        public static function crearDepartamento($codigo, $descripcion, $volumen){
            $consulta=<<<SQL
                INSERT INTO DB208DWESAppFinal.T02_Departamento
                    (T02_CodDepartamento, T02_DescDepartamento, T02_VolumenDeNegocio)
                VALUES
                    ('{$codigo}', '{$descripcion}', {$volumen})
                ;
            SQL;
            $resultado=DBPDO::ejecutarConsulta($consulta);
            if($resultado instanceof PDOException){
                $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
                $_SESSION['error']=new ErrorApp(
                    $resultado->getCode(),
                    $resultado->getMessage(),
                    $resultado->getFile(),
                    $resultado->getLine(),
                    $_SESSION['paginaAnterior']
                );
                $_SESSION['paginaEnCurso']='error';
                header('Location: index.php');
                exit();
            }
        }
        /**
         * Función bajaLogica
         * 
         * Función que pone en estado de baja lógica un departamento dado su código
         * 
         * @param string $codigo Código del departamento
         */
        public static function bajaLogica($codigo){
            $consulta=<<<SQL
                UPDATE T02_Departamento SET
                    T02_FechaBajaDepartamento=CURRENT_TIMESTAMP()
                WHERE T02_CodDepartamento='{$codigo}'
                AND ISNULL(T02_FechaBajaDepartamento);
            SQL;
            $resultado=DBPDO::ejecutarConsulta($consulta);
            if($resultado instanceof PDOException){
                $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
                $_SESSION['error']=new ErrorApp(
                    $resultado->getCode(),
                    $resultado->getMessage(),
                    $resultado->getFile(),
                    $resultado->getLine(),
                    $_SESSION['paginaAnterior']
                );
                $_SESSION['paginaEnCurso']='error';
                header('Location: index.php');
                exit();
            }
        }
        /**
         * Función altaLogica
         * 
         * Función que pone en estado de alta lógica un departamento dado su código
         * 
         * @param string $codigo Código del departamento
         */
        public static function altaLogica($codigo){
            $consulta=<<<SQL
                UPDATE T02_Departamento SET
                    T02_FechaBajaDepartamento=NULL
                WHERE T02_CodDepartamento='{$codigo}'
                AND T02_FechaBajaDepartamento IS NOT NULL;
            SQL;
            $resultado=DBPDO::ejecutarConsulta($consulta);
            if($resultado instanceof PDOException){
                $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
                $_SESSION['error']=new ErrorApp(
                    $resultado->getCode(),
                    $resultado->getMessage(),
                    $resultado->getFile(),
                    $resultado->getLine(),
                    $_SESSION['paginaAnterior']
                );
                $_SESSION['paginaEnCurso']='error';
                header('Location: index.php');
                exit();
            }
        }
    }
?>