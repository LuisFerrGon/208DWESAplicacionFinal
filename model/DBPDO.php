<?php
    require_once 'config/confDB.php';
    /**
     * Clase DBPDO
     * 
     * Clase para crear conexiones con una base de datos
     * 
     * @author Luis Ferreras González
     * @version 1.0.1 Fecha última modificación: 31/01/2025
     * @since 1.0.0
     * @since 1.0.1 Modificación del phpDOC, función ejecutarConsulta
     */
    class DBPDO implements DB{
        /**
         * Funcion ejecutarConsulta
         * 
         * Funcion que devuelve un objeto o una excepción dadas una sentenciaSQL
         * y un array de paramteros
         * 
         * @param string $sentenciaSQL Cadena en la que se pone la sentencia a
         *                              seguir.
         * @param mixed[] $aParametros Opcional. Array en el que se ponen los
         *                              paramteros en el orden deseado.
         * @param boolean $devolverPrimeraLinea Opcional, por defecto true.
         *                                      Si es true devuelve con fetchObject.
         *                                      Si es false lo devuelve sin haberlo hecho.
         * @return object|PDOException Devuelve un objeto si no hay error; sino
         *                              un PDOException.
         * @author Luis Ferreras González
         * @version 1.0.1 Fecha última modificación: 31/01/2025
         * @since 1.0.0
         * @since 1.0.1 Variable $volverObjeto añadido.
         */
        public static function ejecutarConsulta($sentenciaSQL, $aParametros=null, $devolverPrimeraLinea=true){
            try{
                $conexion=new PDO(SERVIDOR, USUARIO, CONTRASENA);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query=$conexion->prepare($sentenciaSQL);
                $query->execute($aParametros);
                if($devolverPrimeraLinea){
                    return $query->fetchObject();
                }else{
                    return $query;
                }
            }catch(PDOException $ex){
                return $ex;
            }finally{
                unset($conexion);
            }
        }
    }
?>