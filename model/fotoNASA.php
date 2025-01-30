<?php
    /**
     * Clase fotoNASA
     * 
     * Clase para crear objetos para el api de la nasa
     * 
     * @author Luis Ferreras González
     * @version 1.0.1 Fecha última modificación del archivo: 30/01/2025
     * @since 1.0.1
     */
    class fotoNASA{
        /**
         * @var string $copyright Persona que tiene el copyright de la foto.
         */
        private $copyright;
        /**
         * @var string $fecha Fecha cuando se tomó la foto.
         */
        private $fecha;
        /**
         * @var string $descripcion Descripcion de la foto.
         */
        private $descripcion;
        /**
         * @var string $titulo Título de la foto.
         */
        private $titulo;
        /**
         * @var string $url Url de la foto.
         */
        private $url;
        /**
         * Funcion __construct
         * 
         * Funcion para crear un objeto Usuario
         * 
         * @param string $copyright
         * @param string $fecha
         * @param string $descripcion
         * @param string $titulo
         * @param string $url
         */
        public function __construct($copyright, $fecha, $descripcion, $titulo, $url) {
            $this->copyright = $copyright;
            $this->fecha = $fecha;
            $this->descripcion = $descripcion;
            $this->titulo = $titulo;
            $this->url = $url;
        }
        /**
         * @return string Devuelve el copyright de la oto
         */
        public function getCopyright() {
            return $this->copyright;
        }
        /**
         * @return string Devuelve la fecha de la oto
         */
        public function getFecha() {
            return $this->fecha;
        }
        /**
         * @return string Devuelve la descripcion de la oto
         */
        public function getDescripcion() {
            return $this->descripcion;
        }
        /**
         * @return string Devuelve el titulo de la oto
         */
        public function getTitulo() {
            return $this->titulo;
        }
        /**
         * @return string Devuelve el url de la oto
         */
        public function getUrl() {
            return $this->url;
        }
    }
?>