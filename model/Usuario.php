<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación del archivo: 20/01/2025
     * @since 1.0.0
     */

    /**
     * 
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación: 20/01/2025
     * @since 1.0.0
     */
    class Usuario{
        /**
         * @var string $codUsuario Cadena del código de usuario, max length=8.
         */
        private $codUsuario;
        /**
         * @var string $password Cadena de la contraseña de usuario, max length=64.
         */
        private $password;
        /**
         * @var string $descUsuario Cadena de la descripción de usuario, max length=255.
         */
        private $descUsuario;
        /**
         * @var int $numConexiones Número de accesos de usuario.
         */
        private $numConexiones;
        /**
         * @var string $fechaHoraUltimaConexion Fecha y hora de la última conexión.
         */
        private $fechaHoraUltimaConexion;
        /**
         * @var string $fechaHoraUltimaConexionAnterior Fecha y hora de la conexión anterior.
         */
        private $fechaHoraUltimaConexionAnterior;
        /**
         * @var string $perfil Cadena que tiene el valor de 'usuario' o de 'administrador'.
         */
        private $perfil;
        /**
         * @var type $imagenUsuario
         */
        private $imagenUsuario;
        /**
         * @var type $listaOpinionesUsuario
         */
        private $listaOpinionesUsuario;
        public function __construct($codUsuario, $password, $descUsuario, $numConexiones, $fechaHoraUltimaConexion, $fechaHoraUltimaConexionAnterior, $perfil, $imagenUsuario=null, $listaOpinionesUsuario=null){
            $this->codUsuario = $codUsuario;
            $this->password = $password;
            $this->descUsuario = $descUsuario;
            $this->numConexiones = $numConexiones;
            $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
            $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
            $this->perfil = $perfil;
            $this->imagenUsuario = $imagenUsuario;
            $this->listaOpinionesUsuario = $listaOpinionesUsuario;
        }
        public function getCodUsuario(){
            return $this->codUsuario;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getDescUsuario(){
            return $this->descUsuario;
        }
        public function getNumConexiones(){
            return $this->numConexiones;
        }
        public function getFechaHoraUltimaConexion(){
            return $this->fechaHoraUltimaConexion;
        }
        public function getFechaHoraUltimaConexionAnterior(){
            return $this->fechaHoraUltimaConexionAnterior;
        }
        public function getPerfil(){
            return $this->perfil;
        }
        public function getImagenUsuario(){
            return $this->imagenUsuario;
        }
        public function getListaOpinionesUsuario(){
            return $this->listaOpinionesUsuario;
        }
        public function setCodUsuario($codUsuario){
            $this->codUsuario = $codUsuario;
        }
        public function setPassword($password){
            $this->password = $password;
        }
        public function setDescUsuario($descUsuario){
            $this->descUsuario = $descUsuario;
        }
        public function setNumConexiones($numConexiones){
            $this->numConexiones = $numConexiones;
        }
        public function setFechaHoraUltimaConexion($fechaHoraUltimaConexion){
            $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        }
        public function setFechaHoraUltimaConexionAnterior($fechaHoraUltimaConexionAnterior){
            $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
        }
        public function setPerfil($perfil){
            $this->perfil = $perfil;
        }
        public function setImagenUsuario($imagenUsuario){
            $this->imagenUsuario = $imagenUsuario;
        }
        public function setListaOpinionesUsuario($listaOpinionesUsuario){
            $this->listaOpinionesUsuario = $listaOpinionesUsuario;
        }
    }
?>