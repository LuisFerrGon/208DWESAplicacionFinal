<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.2 Fecha última modificación del archivo: 06/02/2025
     * @since 1.0.0
     * @since 1.0.2 Cambio del layout
     */
    $mensajeError=[
        'es'=><<<ERROR
            CÓDIGO: {$avError['codigo']}<br>
            DESCRIPCIÓN: {$avError['descripcion']}<br>
            ARCHIVO: {$avError['archivo']}<br>
            LINEA: {$avError['linea']}<br>
        ERROR,
        'en'=><<<ERROR
            CODE: {$avError['codigo']}<br>
            DESCRIPTION: {$avError['descripcion']}<br>
            FILE: {$avError['archivo']}<br>
            LINE: {$avError['linea']}<br>
        ERROR,
        'pt'=>"pt error"
    ];
?>
<header><h1>Error</h1></header><main>
<div id="top">
    <section id="idiomas">
        <a href="?idioma=es" <?php if($idioma=="es"){echo "id='idiomaEscogido'";}?>>Español</a>
        <a href="?idioma=en" <?php if($idioma=="en"){echo "id='idiomaEscogido'";}?>>Inglés</a>
        <a href="?idioma=pt" <?php if($idioma=="pt"){echo "id='idiomaEscogido'";}?>>Portugués</a>
    </section>
    <section id="botones">
        <form>
            <input type="submit" name="volver" value="Volver">
        </form>
    </section>
</div>
<?php
    echo "<p>".$mensajeError[$idioma]."</p>";
?>
<div style='height: 30px'></div></main>