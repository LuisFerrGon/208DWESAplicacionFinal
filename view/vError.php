<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación del archivo: 20/01/2025
     * @since 1.0.0
     */
    /**
     * @var array 
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
<div style='height: 30px'></div>