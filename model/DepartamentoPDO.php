<?php
    /**
     * Clase DepartamentoPDO
     * 
     * Clase para funciones de departamento
     * 
     * @author Luis Ferreras González
     * @version 1.0.2 Fecha última modificación: 06/02/2025
     * @since 1.0.1
     * @since 1.0.2 Función modificarDepartamento, buscarPorCodigo
     */
    class DepartamentoPDO{
        /**
         * Función cargarArrayDepartamentos
         * 
         * Funcion para cargar el array de departamentos
         * 
         * @param array $aCondiciones Array con las condiciones de busqueda
         * @return array Array con todos los departamentos que se adhieren a las condiciones
         * @author Luis Ferreras González
         * @version 1.0.2 Fecha última modificación: 06/02/2025
         * @since 1.0.2
         */
        public static function cargarArrayDepartamentos($aCondiciones){
            try{
                $aDepartamentos=[];
                $consulta=<<<QUERY
                    SELECT * FROM T02_Departamento
                    WHERE T02_DescDepartamento LIKE :descripcion
                    ;
                QUERY;
                $resultado=DBPDO::ejecutarConsulta($consulta, $aCondiciones, false);
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
         * @version 1.0.2 Fecha última modificación: 06/02/2025
         * @since 1.0.2
         */
        public static function buscarPorCodigo($codigo) {
            $consulta=<<<SQL
                SELECT * FROM T02_Departamento
                WHERE T02_CodDepartamento='{$codigo}';
            SQL;
            $resultado=DBPDO::ejecutarConsulta($consulta, null, false);
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
    }
?>