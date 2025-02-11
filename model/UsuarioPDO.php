<?php
    /**
     * Clase UsuarioPDO
     * 
     * Clase para funciones de usuario
     * 
     * @author Luis Ferreras González
     * @version 2.0.3 Fecha última modificación del archivo: 11/02/2025
     * @since 1.0.0
     * @since 1.0.1 Modificación del phpDOC
     * @since 2.0.3 altaUsuario funcional
     */
    class UsuarioPDO implements UsuarioDB{
        /**
         * Función para validar un usuario
         * 
         * Función para comprobar si existe un usuario dados el código y contraseña;
         * devuelve un objeto Usuario si existe y null si no o en caso de PDOException.
         * 
         * @param string $codigoUsuario El codigo del usuario a validar
         * @param string $contrasenaUsuario La contraseña sin codificar ni haber
         *                                  añadido el codigo de usuario
         * @return Usuario|null|PDOException Devuelve un objeto usuario si existe.
         *                                   Devuelve null si no existe.
         *                                   Devuelve PDOExcetion en caso de error.
         * @author Luis Ferreras González
         * @version 1.0.0 Fecha última modificación: 20/01/2025
         * @since 1.0.0
         */
        public static function validarUsuario($codigoUsuario, $contrasenaUsuario){
            $oUsuario=null;
            $consulta=<<<SQL
                SELECT * FROM T01_Usuario WHERE T01_CodUsuario='{$codigoUsuario}' 
                AND T01_Password=SHA2('{$codigoUsuario}{$contrasenaUsuario}', 256);
            SQL;
            $resultado=DBPDO::ejecutarConsulta($consulta);
            if($resultado instanceof PDOException){
                return $resultado;
            }else{
                if($resultado!=null){
                    $oUsuario=new Usuario(
                        $resultado->T01_CodUsuario,
                        $resultado->T01_Password,
                        $resultado->T01_DescUsuario,
                        ($resultado->T01_NumConexiones)+1,
                        date_create("now"),
                        $resultado->T01_FechaHoraUltimaConexion,
                        $resultado->T01_Perfil
                    );
                }
            }
            return $oUsuario;
        }
        /**
         * Funcion para cambiar la ultima conexion y el numero de estas.
         * 
         * Funcion que cambia en la base de datos el numero de conexiones y la
         * fecha-hora de la ultima dado el usuario
         * 
         * @param Usuario $oUsuario Usuario al que se van a actualizar los datos
         * @return void No devuelve nada.
         * @author Luis Ferreras González
         * @version 1.0.0 Fecha última modificación: 20/01/2025
         * @since 1.0.0
         */
        public static function registrarUltimaConexion(Usuario $oUsuario){
            $sCodigo=$oUsuario->getCodUsuario();
            $sPassword=$oUsuario->getPassword();
            $iConexiones=$oUsuario->getNumConexiones();
            $dtUltimaConexion=$oUsuario->getFechaHoraUltimaConexion();
            $consulta=<<<SQL
                UPDATE T01_Usuario SET
                    T01_NumConexiones={$iConexiones},
                    T01_FechaHoraUltimaConexion='{$dtUltimaConexion->format('Y-m-d H:i:s')}'
                WHERE T01_CodUsuario='{$sCodigo}'
                AND T01_Password='{$sPassword}';
            SQL;
            $resultado=DBPDO::ejecutarConsulta($consulta);
            if($resultado instanceof PDOException){
                return $resultado;
            }
        }
        public static function buscarUsuarioPorCod(){
        }
        /**
         * Funcion de dar de alta un usuario
         * 
         * Funcion que dado el codigo, la contraseña y la descripcion de un usuario
         * lo añade a la base de datos.
         * 
         * @param string $sCodigo Codigo del usuario a añadir.
         * @param string $sContrasena Contraseña del usuario a añadir sin codificar
         *                            ni haber añadido el codigo de usuario.
         * @param string $sDescripcion Descripción del usuario a añadir.
         * @return null|\PDOException En caso de error devuelve PDOException.
         *                            Si todo va bien devuelve null.
         * @author Luis Ferreras González
         * @version 2.0.3 Fecha última modificación del archivo: 11/02/2025
         * @since 1.0.0
         * @since 2.0.3 Funcional
         */
        public static function altaUsuario(string $sCodigo, string $sContrasena, string $sDescripcion){
            $consulta=<<<SQL
            INSERT INTO DB208DWESAppFinal.T01_Usuario
                (T01_CodUsuario, T01_Password, T01_DescUsuario)
            VALUES
                ('{$sCodigo}', SHA2('{$sCodigo}{$sContrasena}',256), '{$sDescripcion}');
            SQL;
            $resultado=DBPDO::ejecutarConsulta($consulta);
            if($resultado instanceof PDOException){
                return $resultado;
            }else{
                return null;
            }
        }
        /**
         * Funcion para comprobar si existe un codigo
         * 
         * Funcion que devuelve un boolean sobre la existencia de un usuario por su codigo
         * 
         * @param string $sCodigo El codigo a buscar
         * @return boolean|PDOException Devuelve true si el usuario existe.
         *                              Devuelve false si el usuario no existe.
         *                              Devuelve PDOExcetion en caso de error.
         * @author Luis Ferreras González
         * @version 1.0.0 Fecha última modificación: 20/01/2025
         * @since 1.0.0
         */
        public static function validarCodNoExiste(string $sCodigo){
            $consulta=<<<SQL
                SELECT * FROM T01_Usuario WHERE T01_CodUsuario='{$sCodigo}';
            SQL;
            $resultado=DBPDO::ejecutarConsulta($consulta);
            if($resultado instanceof PDOException){
                return $resultado;
            }else{
                return($resultado!=null);
            }
        }
        public static function modificarUsuario(){
        }
        public static function cambiarPassword(){
        }
        public static function borrarUSuario(){
        }
        public static function buscarUsuariosPorDesc(){
        }
        public static function creaOpinion(){
        }
        public static function modificaOpinion(){
        }
        public static function borraOpinion(){
        }
        public static function buscarOpinionUsuario(){
        }
    }
?>