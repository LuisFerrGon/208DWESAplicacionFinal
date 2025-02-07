<?php
    /**
     * Clase Departamento
     * 
     * Clase para crear departamentos
     * 
     * @author Luis Ferreras González
     * @version 1.0.2 Fecha última modificación: 06/02/2025
     * @since 1.0.1
     * @since 1.0.2 Modificación documentación
     */
    class Departamento {
        /**
         * @var string $codigo Código del departamento
         */
        private $codigo;
        /**
         * @var string $descripcion Descripción del departamento
         */
        private $descripcion;
        /**
         * @var string $fechaCreacion Fecha de creación del departamento
         */
        private $fechaCreacion;
        /**
         * @var float $volumenNegocio Volumen del departamento
         */
        private $volumenNegocio;
        /**
         * @var string $fechaBaja Fecha de baja del departamento
         */
        private $fechaBaja;
        public function __construct($codigo, $descripcion, $fechaCreacion, $volumenNegocio, $fechaBaja=null) {
            $this->codigo = $codigo;
            $this->descripcion = $descripcion;
            $this->fechaCreacion = $fechaCreacion;
            $this->volumenNegocio = $volumenNegocio;
            $this->fechaBaja = $fechaBaja;
        }
        /**
         * @return string Devuelve el código del departamento
         */
        public function getCodigo() {
            return $this->codigo;
        }
        /**
         * @return string Devuelve la descripción del departamento
         */
        public function getDescripcion() {
            return $this->descripcion;
        }
        /**
         * @return string Devuelve la fecha de creación del departamento
         */
        public function getFechaCreacion() {
            return $this->fechaCreacion;
        }
        /**
         * @return float Devuelve el volumen del departamento
         */
        public function getVolumenNegocio() {
            return $this->volumenNegocio;
        }
        /**
         * @return string Devuelve la fecha de baja del departamento
         */
        public function getFechaBaja() {
            return $this->fechaBaja;
        }
        /**
         * @param type $codigo
         */
        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }
        /**
         * @param type $descripcion
         */
        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
        /**
         * @param type $fechaCreacion
         */
        public function setFechaCreacion($fechaCreacion){
            $this->fechaCreacion = $fechaCreacion;
        }
        /**
         * @param type $volumenNegocio
         */
        public function setVolumenNegocio($volumenNegocio){
            $this->volumenNegocio = $volumenNegocio;
        }
        /**
         * @param type $fechaBaja
         */
        public function setFechaBaja($fechaBaja){
            $this->fechaBaja = $fechaBaja;
        }
    }
?>