<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.1 Fecha última modificación del archivo: 23/01/2025
     * @since 1.0.1
     */
    class REST{
        /**
         * @param
         */
        const apiKeyNasa = "2CQ2qjSy8qJNfT8RW0fklAwybZCBgqXx2KoI99JQ";
        /**
         * Función para el REST de nasa
         * 
         * Funcion que dada la fecha devuelve la imagen del dia correspondiente.
         * 
         * @param timestamp $fecha Fecha de la que se quiere conseguir la imagen.
         * @return string|null Devuelve la url de la imagen si es exitoso.
         *                      Devuelve null si no es exitoso.
         * @author Luis Ferreras González
         * @version 1.0.1 Fecha última modificación del archivo: 23/01/2025
         * @since 1.0.1
         */
        public static function apiNasa($fecha){
            try{
                $resultado=file_get_contents("https://api.nasa.gov/planetary/apod?api_key=".self::apiKeyNasa."&date=".(date('Y-m-d', $fecha)));
                $array=json_decode($resultado, true);
                return $array["url"];
            }catch(Exception $ex){
                $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
                $_SESSION['error']=new ErrorApp(
                    $ex->getCode(),
                    $ex->getMessage(),
                    $ex->getFile(),
                    $ex->getLine(),
                    $_SESSION['paginaAnterior']
                );
                $_SESSION['paginaEnCurso']='error';
                header('Location: index.php');
                exit();
            }
        }
    }
?>