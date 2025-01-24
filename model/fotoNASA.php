<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.1 Fecha última modificación del archivo: 24/01/2025
     * @since 1.0.1
     */
    class fotoNASA{
        private $copyright;
        private $fecha;
        private $descripcion;
        private $titulo;
        private $url;
        public function __construct($copyright, $fecha, $descripcion, $titulo, $url) {
            $this->copyright = $copyright;
            $this->fecha = $fecha;
            $this->descripcion = $descripcion;
            $this->titulo = $titulo;
            $this->url = $url;
        }
        public function getCopyright() {
            return $this->copyright;
        }
        public function getFecha() {
            return $this->fecha;
        }
        public function getDescripcion() {
            return $this->descripcion;
        }
        public function getTitulo() {
            return $this->titulo;
        }
        public function getUrl() {
            return $this->url;
        }
    }
?>