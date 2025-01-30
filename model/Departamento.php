<?php
    /**
     * Clase Departamento
     * 
     * Clase para crear departamentos
     * 
     * @author Luis Ferreras González
     * @version 1.0.1 Fecha última modificación: 30/01/2025
     * @since 1.0.1
     */
    class Departamento {
        /**
         * @var type
         */
        private $codigo;
        /**
         * @var type
         */
        private $descripcion;
        /**
         * @var type
         */
        private $fechaCreacion;
        /**
         * @var type
         */
        private $volumenNegocio;
        /**
         * @var type
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
         * @return type
         */
        public function getCodigo() {
            return $this->codigo;
        }
        /**
         * @return type
         */
        public function getDescripcion() {
            return $this->descripcion;
        }
        /**
         * @return type
         */
        public function getFechaCreacion() {
            return $this->fechaCreacion;
        }
        /**
         * @return type
         */
        public function getVolumenNegocio() {
            return $this->volumenNegocio;
        }
        /**
         * @return type
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
         * 
         * @param type $descripcion
         */
        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
        /**
         * 
         * @param type $fechaCreacion
         */
        public function setFechaCreacion($fechaCreacion){
            $this->fechaCreacion = $fechaCreacion;
        }
        /**
         * 
         * @param type $volumenNegocio
         */
        public function setVolumenNegocio($volumenNegocio){
            $this->volumenNegocio = $volumenNegocio;
        }
        /**
         * 
         * @param type $fechaBaja
         */
        public function setFechaBaja($fechaBaja){
            $this->fechaBaja = $fechaBaja;
        }
    }
?>