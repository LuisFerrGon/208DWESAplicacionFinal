<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación del archivo: 20/01/2025
     * @since 1.0.0
     */

    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 20/01/2025
     * @since 1.0.0
     */
    interface DB{
        public static function ejecutarConsulta($sentenciaSQL, $aParametros);
    }
?>