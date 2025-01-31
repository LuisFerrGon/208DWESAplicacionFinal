<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.1 Fecha última modificación del archivo: 31/01/2025
     * @since 1.0.0
     * @since 1.0.1 Cambio nombre variable, foto del día mediante javascript
     */
    /**
     * @var array $bienvenida Array que contiene el mensaje de bienvenida.
     */
    $bienvenida=[
        'es'=>[
            0=>"¡Bienvenido ".$avInicioPrivado['descripcion']."! Esta es la primera vez que te conectas.",
            1=>"¡Bienvenido de nuevo ".$avInicioPrivado['descripcion']."! Esta es la ".$avInicioPrivado['conexiones']."ª vez que te conectas, te conectaste por última vez el ".date('d/m/Y H:i:s', $avInicioPrivado['fecha'])
        ],
        'en'=>[
            0=>"Welcome ".$avInicioPrivado['descripcion']."! This is the first time you log in.",
            1=>"Welcome again ".$avInicioPrivado['descripcion']."! You have logged in ".$avInicioPrivado['conexiones']." times, last time was ".date('m/d/Y H:i:s', $avInicioPrivado['fecha'])
        ],
        'pt' => [
            0=>"Bem-vindo ".$avInicioPrivado['descripcion']."! Esta é a primeira vez que você se conecta.",
            1=>"Bem-vindo de volta ".$avInicioPrivado['descripcion']."! Esta é a ".$avInicioPrivado['conexiones']." vez que você se conecta, e você se conectou pela última vez em ".date('d/m/Y H:i:s', $avInicioPrivado['fecha'])
        ]
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
            <input type="submit" name="cerrarsesion" value="Cerrar Sesión">
        </form>
        <form>
            <input type="submit" name="detalle" value="Detalle">
        </form>
        <form>
            <input type="submit" name="rest" value="REST">
        </form>
        <form>
            <input type="submit" name="mtoDepartamento" value="Mantenimiento Departamentos">
        </form>
        <form>
            <input type="submit" name="error" value="Error">
        </form>
        <form>
            <input type="submit" name="cuenta" value="<?php echo $avInicioPrivado['descripcion'];?>">
        </form>
    </section>
</div>
<?php
    echo "<p>".$bienvenida[$idioma][$avInicioPrivado['conexiones']>1]."</p>";
?>
<img alt="Imagen del día de NASA" id="fotoNasaJs"/>
<div style='height: 30px'></div>
<script type="module">
    fetch("https://api.nasa.gov/planetary/apod?api_key=2CQ2qjSy8qJNfT8RW0fklAwybZCBgqXx2KoI99JQ")
    .then(response=>{
        if(response.ok){
            return response.json();
        }else{
            throw new Error("Error: "+response.status);
        }
    })
    .then(data=>{
        document.getElementById("fotoNasaJs").src=data.url;
    })
    .catch(error=>{
        document.getElementById("fotoNasaJs").alt="Ha ocurrido un error al intentar conseguir la imagen.";
        console.log(error);
    });
</script>