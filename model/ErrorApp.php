<?php
    /**
     * Clase ErrorApp
     * 
     * Clase para los crear errores
     * 
     * @author Luis Ferreras González
     * @version 1.0.1 Fecha última modificación: 30/01/2025
     * @since 1.0.0
     * @since 1.0.1 Modificación del phpDOC
     */
    class ErrorApp{
        /**
         * @var string $codError Código del error
         */
        private $codError;
        /**
         * @var string $descError Descripción del error
         */
        private $descError;
        /**
         * @var string $archivoError Archivo donde ocurrió el error
         */
        private $archivoError;
        /**
         * @var string $lineaError Linea del archivo donde ocurrió el error
         */
        private $lineaError;
        /**
         * @var string $paginaSiguiente Página a la que ir al darle a volver
         */
        private $paginaSiguiente;
        /**
         * Funcion __construct
         * 
         * Funcion para crear un objeto errorApp
         * 
         * @param string $codError Código del error
         * @param string $descError Descripción del error
         * @param string $archivoError Archivo donde ocurrió el error
         * @param string $lineaError Linea del archivo donde ocurrió el error
         * @param string $paginaSiguiente Página a la que ir al darle a volver
         */
        public function __construct($codError, $descError, $archivoError, $lineaError, $paginaSiguiente) {
            $this->codError = $codError;
            $this->descError = $descError;
            $this->archivoError = $archivoError;
            $this->lineaError = $lineaError;
            $this->paginaSiguiente = $paginaSiguiente;
        }
        /**
         * @return string Devuelve el código de error
         */
        public function getCodError(){
            return $this->codError;
        }
        /**
         * @return string Devuelve la descripción del error
         */
        public function getDescError(){
            return $this->descError;
        }
        /**
         * @return string Devuelve el archivo donde ocurrió el error
         */
        public function getArchivoError(){
            return $this->archivoError;
        }
        /**
         * @return string Devuelve la línea donde ocurrió el error
         */
        public function getLineaError(){
            return $this->lineaError;
        }
        /**
         * @return string Devuelve la página a la que ir al darle volver
         */
        public function getPaginaSiguiente(){
            return $this->paginaSiguiente;
        }
    }
?>