<?php
    /**
     * @author Luis Ferreras González
     * @version 2.0.0 Fecha última modificación del archivo: 07/02/2025
     * @since 1.0.0
     * @since 1.0.2 Espacio en blanco añadido
     * @since 2.0.0 Documentación doxygen
     */
    $idioma=isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'en';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
        <link type="text/css" rel="stylesheet" href="webroot/estilos.css">
        <link rel="icon" type="image/x-icon" href="webroot/images/favicon.ico"
    </head>
    <body>
        <?php require_once $aVistas[$_SESSION['paginaEnCurso']];?>
        <footer>
            <a href="../index.html">Luis Ferreras</a>
            <a href="https://github.com/LuisFerrGon/208DWESAplicacionFinal" target="_blank">GitHub</a>
            <p>Última revisión: <?php echo(date('d/m/Y', strtotime("12 February 2025")))?></p>
            <a href="doc/phpdoc/index.html" target="_blank">PHPDocumentator</a>
            <a href="doc/doxygen/html/index.html" target="_blank">Doxygen</a>
            <a href="doc/curriculum/Curriculum.pdf" target="_blank">Currículum</a>
        </footer>
    </body>
</html>