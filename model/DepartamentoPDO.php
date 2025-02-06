<?php
    /**
     * Clase DepartamentoPDO
     * 
     * Clase para funciones de departamento
     * 
     * @author Luis Ferreras González
     * @version 1.0.2 Fecha última modificación: 06/02/2025
     * @since 1.0.1
     * @since 1.0.2 Función modificarDepartamento
     */
    class DepartamentoPDO{
        /**
         * Función buscarPorDescripcion
         * 
         * Función para buscar departamentos según su descripción
         * 
         * @param type $descripcion
         * @author Luis Ferreras González
         * @version 1.0.1 Fecha última modificación: 30/01/2025
         * @since 1.0.1
         */
        public static function buscarPorDescripcion($descripcion) {
            
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