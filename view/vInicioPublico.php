<?php
    /**
     * @author Luis Ferreras González
     * @version 2.0.3 Fecha última modificación del archivo: 11/02/2025
     * @since 1.0.0
     * @since 1.0.2 Cambio del layout
     * @since 2.0.3 Carrusel añadido
     */
?>
<header>
    <h1>Aplicación Final</h1>
</header>
<main>
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
    <!--El código del carrusel de imagenes se tomó de
        https://www.w3schools.com/howto/howto_js_slideshow.asp-->
    <div class="carrusel">
        <div class="mySlides fade">
            <img src="webroot/images/navegacion.PNG" alt="Mapa de navegación">
            <div class="text">Mapa de navegación</div>
        </div>
        <div class="mySlides fade">
            <img src="webroot/images/diagramaClases.png" alt="Diagrama de clases">
            <div class="text">Diagrama de clases</div>
        </div>
        <div class="mySlides fade">
            <img src="webroot/images/usoSession.PNG" alt="Uso de $_SESSION">
            <div class="text">Uso de $_SESSION</div>
        </div>
        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
</main>
<script>
    let slideIndex = 1;
    showSlides(slideIndex);
    // Next/previous controls
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    // Thumbnail image controls
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        if (n > slides.length){slideIndex = 1;}
        if (n < 1){slideIndex = slides.length;}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex-1].style.display = "block";
    }
</script>