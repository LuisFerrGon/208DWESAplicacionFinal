<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.1 Fecha última modificación del archivo: 24/01/2025
     * @since 1.0.1
     */
    require_once 'model/fotoNASA.php';
    class REST{
        const apiKeyNasa = "2CQ2qjSy8qJNfT8RW0fklAwybZCBgqXx2KoI99JQ";
        /**
         * Función para el REST de nasa
         * 
         * Funcion que dada la fecha devuelve la imagen del dia correspondiente.
         * 
         * @param timestamp $fecha Fecha de la que se quiere conseguir la imagen.
         * @return null|\fotoNASA Devuelve un objeto fotoNASA si es exitoso.
         *                          Devuelve null si no es exitoso.
         * @author Luis Ferreras González
         * @version 1.0.1 Fecha última modificación del archivo: 24/01/2025
         * @since 1.0.1
         */
        public static function apiNasa($fecha){
            try{
                $resultado=file_get_contents("https://api.nasa.gov/planetary/apod?api_key=".self::apiKeyNasa."&date=".$fecha->format('Y-m-d'));
                $array=json_decode($resultado, true);
                if($array["url"]!=null){
                    return new fotoNASA(
                        $array['copyright'],
                        $array['date'],
                        $array['explanation'],
                        $array['title'],
                        $array['url']
                    );
                }else{
                    return null;
                }
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