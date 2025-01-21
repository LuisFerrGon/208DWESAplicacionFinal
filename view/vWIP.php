<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación del archivo: 20/01/2025
     * @since 1.0.0
     */
    /**
     * @var array $bienvenida Array que contiene el mensaje de bienvenida.
     */
    $mensaje=[
        'es'=>"Se está trabajando en esta página y no se encuentra disponible.",
        'en'=>"This page is being worked on and isn't available.",
        'pt'=>"pt wip"
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
    echo "<p>".$mensaje[$idioma]."</p>";
?>
<div style='height: 30px'></div>