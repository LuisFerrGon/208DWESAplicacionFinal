<?php
    /**
     * Interfaz UsuarioDB
     * 
     * Interfaz para usuarios en la base de datos
     * 
     * @author Luis Ferreras González
     * @version 1.0.1 Fecha última modificación del archivo: 30/01/2025
     * @since 1.0.0
     * @since 1.0.1 Modificación del phpDOC
     */
    interface UsuarioDB{
        /**
         * Función validarUsuario
         * 
         * Función para validar un usuario
         * 
         * @param string $codigoUsuario Código del usuario
         * @param string $contrasenaUsuario Contraseña del usuario
         */
        public static function validarUsuario($codigoUsuario, $contrasenaUsuario);
    }
?>