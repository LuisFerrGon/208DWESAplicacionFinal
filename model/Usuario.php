<?php
    /**
     * Clase Usuario
     * 
     * Clase para crear usuarios
     * 
     * @author Luis Ferreras González
     * @version 1.0.1 Fecha última modificación: 30/01/2025
     * @since 1.0.0
     * @since 1.0.1 Modificación del phpDOC
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
        /**
         * Funcion __construct
         * 
         * Funcion para crear un objeto Usuario
         * 
         * @param string $codUsuario Cadena del código de usuario, max length=8.
         * @param string $password Cadena de la contraseña de usuario, max length=64.
         * @param string $descUsuario Cadena de la descripción de usuario, max length=255.
         * @param int $numConexiones Número de accesos de usuario.
         * @param string $fechaHoraUltimaConexion Fecha y hora de la última conexión.
         * @param string $fechaHoraUltimaConexionAnterior Fecha y hora de la conexión anterior.
         * @param string $perfil Opcional. Cadena que tiene el valor de 'usuario'
         *                          o de 'administrador'. Por defecto 'usuario'.
         * @param type $imagenUsuario
         * @param type $listaOpinionesUsuario
         */
        public function __construct($codUsuario, $password, $descUsuario, $numConexiones, $fechaHoraUltimaConexion, $fechaHoraUltimaConexionAnterior, $perfil='usuario', $imagenUsuario=null, $listaOpinionesUsuario=null){
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
        /**
         * @return string Devuelve el codigo del usuario.
         */
        public function getCodUsuario(){
            return $this->codUsuario;
        }
        /**
         * @return string Deveulve la contraseña del usuario.
         */
        public function getPassword(){
            return $this->password;
        }
        /**
         * @return string Devuelve la descripción sel usuario.
         */
        public function getDescUsuario(){
            return $this->descUsuario;
        }
        /**
         * @return int Devuelve el numero de conexiones del usuario.
         */
        public function getNumConexiones(){
            return $this->numConexiones;
        }
        /**
         * @return string Devuelve la fecha y hora de la última conexión.
         */
        public function getFechaHoraUltimaConexion(){
            return $this->fechaHoraUltimaConexion;
        }
        /**
         * @return string Devuelve la fecha y hora de la conexión anterior.
         */
        public function getFechaHoraUltimaConexionAnterior(){
            return $this->fechaHoraUltimaConexionAnterior;
        }
        /**
         * @return string Devuelve el perfil del usuaio.
         */
        public function getPerfil(){
            return $this->perfil;
        }
        /**
         * @return type Devuelve la imagen del usuario.
         */
        public function getImagenUsuario(){
            return $this->imagenUsuario;
        }
        /**
         * @return type Devuelve la lista de opiniones.
         */
        public function getListaOpinionesUsuario(){
            return $this->listaOpinionesUsuario;
        }
        /**
         * Cambia el código de usuario
         * 
         * @param string $codUsuario Nuevo código de usuario
         */
        public function setCodUsuario($codUsuario){
            $this->codUsuario = $codUsuario;
        }
        /**
         * Cambia la contraseña del usuario
         * 
         * @param string $password Nueva contraseña del usuario
         */
        public function setPassword($password){
            $this->password = $password;
        }
        /**
         * Cambia la descripción del usuario
         * 
         * @param string $descUsuario Nueva descripción del usuario
         */
        public function setDescUsuario($descUsuario){
            $this->descUsuario = $descUsuario;
        }
        /**
         * Cambia el numero de conexiones del usuario
         * 
         * @param int $numConexiones Nuevo numero de conexiones del usuario
         */
        public function setNumConexiones($numConexiones){
            $this->numConexiones = $numConexiones;
        }
        /**
         * Cambia la fecha y hora de la última conexión del usuario
         * 
         * @param string $fechaHoraUltimaConexion Nueva fecha y hora de la última conexión del usuario
         */
        public function setFechaHoraUltimaConexion($fechaHoraUltimaConexion){
            $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        }
        /**
         * Cambia la fecha y hora de la conexión anterior del usuario
         * 
         * @param string $fechaHoraUltimaConexionAnterior Nueva fecha y hora de la conexión anterior del usuario
         */
        public function setFechaHoraUltimaConexionAnterior($fechaHoraUltimaConexionAnterior){
            $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
        }
        /**
         * Cambia el perfil del usuario
         * 
         * @param string $perfil Nueva perfil del usuario
         */
        public function setPerfil($perfil){
            $this->perfil = $perfil;
        }
        /**
         * Cambia la imagen del usuario
         * 
         * @param string $imagenUsuario Nueva imagen del usuario
         */
        public function setImagenUsuario($imagenUsuario){
            $this->imagenUsuario = $imagenUsuario;
        }
        /**
         * Cambia la lista de opiniones del usuario
         * 
         * @param string $listaOpinionesUsuario Nueva la lista de opiniones del usuario
         */
        public function setListaOpinionesUsuario($listaOpinionesUsuario){
            $this->listaOpinionesUsuario = $listaOpinionesUsuario;
        }
    }
?>