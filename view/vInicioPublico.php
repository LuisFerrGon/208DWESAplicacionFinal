<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.2 Fecha última modificación del archivo: 06/02/2025
     * @since 1.0.0
     * @since 1.0.2 Cambio del layout
     */
?>
<header><h1>Aplicación Final</h1></header><main>
<div id="top">
    <section id="idiomas">
        <a href="?idioma=es" <?php if($idioma=="es"){echo "id='idiomaEscogido'";}?>>Español</a>
        <a href="?idioma=en" <?php if($idioma=="en"){echo "id='idiomaEscogido'";}?>>Inglés</a>
        <a href="?idioma=pt" <?php if($idioma=="pt"){echo "id='idiomaEscogido'";}?>>Portugués</a>
    </section>
    <section id="botones">
        <form>
            <input type="submit" name="login" value="Iniciar sesión">
        </form>
    </section>
</div>
<img src="webroot/images/navegacion.PNG" alt="Mapa de la aplicación" id="mapaAplicacion"/></main>