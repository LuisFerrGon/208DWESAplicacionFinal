<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación del archivo: 21/01/2025
     * @since 1.0.0
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
        <header>
            <h1>Aplicación Final</h1>
        </header>
        <main>
            <?php require_once $aVistas[$_SESSION['paginaEnCurso']];?>
        </main>
        <footer>
            <a href="../index.html">Luis Ferreras</a>
            <a href="https://github.com/LuisFerrGon/208DWESAplicacionFinal" target="_blank">GitHub</a>
            <p>Última revisión: <?php echo(date('d/m/Y', strtotime("22 January 2025")))?></p>
            <a href="doc/phpdoc/index.html" target="_blank">PHPDocumentator</a>
            <a href="doc/curriculum/Curriculum.pdf" target="_blank">Currículum</a>
        </footer>
    </body>
</html>