<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación del archivo: 20/01/2025
     * @since 1.0.0
     */

    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaAnterior']='detalle';
        $_SESSION['paginaEnCurso']='inicioPrivado';
        header('Location: index.php');
        exit();
    }
    /**
     * Funcion para mostrar una variable superglobal
     * 
     * Muestra los valores de una variable superglobal dado su nombre y la variable en si.
     * 
     * @param string $nombre Cadena cuyo valor es el nombre de una variable superglobal
     * @param array $variable Variable superglobal para mostrar
     */
    function mostrarSuperglobal($nombre, $variable){
        if(!empty($variable)){
            echo "<h2>$nombre</h2>";
            foreach($variable as $key=>$value){
                // Verificamos si el valor es un objeto y lo convertimos a JSON
                if (is_object($value)) {
                    $value = json_encode($value, JSON_PRETTY_PRINT);
                }
                print_r($key."=>".$value."<br>");
            }
        }else{
            echo "<h2>La variable $nombre está vacia</h2>";
        }
    }
    require_once $aVistas['layout'];
?>