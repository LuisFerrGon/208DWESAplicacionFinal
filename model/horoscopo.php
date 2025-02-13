<?php
/**
 * Clase horoscopo
 * 
 * Clase para crear objetos para el api de horoscopo
 * 
 * @author Luis Ferreras González
 * @version 2.0.3 Fecha última modificación: 13/02/2025
 * @since 2.0.3
 */
class horoscopo{
    /**
     * @var string $fecha Fecha del horoscopo
     * @author Luis Ferreras González
     * @version 2.0.3 Fecha última modificación: 13/02/2025
     * @since 2.0.3
     */
    private $fecha;
    /**
     * @var string $mensaje Mensaje del horoscopo
     * @author Luis Ferreras González
     * @version 2.0.3 Fecha última modificación: 13/02/2025
     * @since 2.0.3
     */
    private $mensaje;
    /**
     * Función __construct
     * 
     * Función para crear un objeto horoscopo
     * 
     * @param string $fecha
     * @param string $mensaje
     * @author Luis Ferreras González
     * @version 2.0.3 Fecha última modificación: 13/02/2025
     * @since 2.0.3
     */
    public function __construct($fecha, $mensaje) {
        $this->fecha = $fecha;
        $this->mensaje = $mensaje;
    }
    /**
     * @return string Devuelve la fecha del horoscopo
     * @author Luis Ferreras González
     * @version 2.0.3 Fecha última modificación: 13/02/2025
     * @since 2.0.3
     */
    public function getFecha() {
        return $this->fecha;
    }
    /**
     * @return string Devuelve el mensaje del horoscopo
     * @author Luis Ferreras González
     * @version 2.0.3 Fecha última modificación: 13/02/2025
     * @since 2.0.3
     */
    public function getMensaje() {
        return $this->mensaje;
    }
}
