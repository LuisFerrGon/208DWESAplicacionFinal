<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación del archivo: 20/01/2025
     * @since 1.0.0
     */

    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación del archivo: 20/01/2025
     * @since 1.0.0
     */
    class ErrorApp{
        private $codError;
        private $descError;
        private $archivoError;
        private $lineaError;
        private $paginaSiguiente;
        public function __construct($codError, $descError, $archivoError, $lineaError, $paginaSiguiente) {
            $this->codError = $codError;
            $this->descError = $descError;
            $this->archivoError = $archivoError;
            $this->lineaError = $lineaError;
            $this->paginaSiguiente = $paginaSiguiente;
        }
        public function getCodError(){
            return $this->codError;
        }
        public function getDescError(){
            return $this->descError;
        }
        public function getArchivoError(){
            return $this->archivoError;
        }
        public function getLineaError(){
            return $this->lineaError;
        }
        public function getPaginaSiguiente(){
            return $this->paginaSiguiente;
        }
    }
?>