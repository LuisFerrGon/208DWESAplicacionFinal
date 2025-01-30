<?php
    /**
     * Interfaz DB
     * 
     * Interfaz para conexiones con bases de datos
     * 
     * @author Luis Ferreras González
     * @version 1.0.1 Fecha última modificación del archivo: 30/01/2025
     * @since 1.0.0
     * @since 1.0.1 Modificación del phpDOC
     */
    interface DB{
        /**
         * Función ejecutarConsulta
         * 
         * Función para ejecutar la consulta
         * 
         * @param string $sentenciaSQL Sentencia sql
         * @param array $aParametros Array de los parametros
         */
        public static function ejecutarConsulta($sentenciaSQL, $aParametros);
    }
?>