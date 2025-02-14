<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.2 Fecha última modificación del archivo: 06/02/2025
     * @since 1.0.1
     * @since 1.0.2 Cmabio del layout
     */
    $mensajeFotoNasaFallida=[
        'es'=>"La fecha introducida no es válida",
        'en'=>"The inputted date isn't valid",
        'pt'=>"The inputted date isn't valid"
    ]
?>
<header>
    <h1>REST</h1>
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
                <input type="submit" name="volver" value="Volver">
            </form>
        </section>
    </div>
    <div id="apis">
        <section class="api" id="nasa">
            <form method="post">
                <input type="date" value="<?php echo $_SESSION['fechaNASA']->format('Y-m-d');?>" id="fechafotoNasa" name="fechafotoNasa" min="1995-06-16" max="<?php echo date('Y-m-d');?>">
            </form>
            <?php
                if($avRest['nasa']['url']==null){
                    echo "<h2>".$mensajeFotoNasaFallida[$idioma]."</h2>";
                }else{
                    echo <<<IMAGEN
                        <h2>{$avRest['nasa']['titulo']}</h2>
                        <img src="{$avRest['nasa']['url']}" alt="Imagen del día">
                    IMAGEN;
                    if($avRest['nasa']['copyright']!=null){echo "<p>&#169;".$avRest['nasa']['copyright']."</p>";}
                    if($avRest['nasa']['descripcion']!=null){echo "<p>".$avRest['nasa']['descripcion']."</p>";}
                    echo "<p>".$avRest['nasa']['fecha']."</p>";
                }
            ?>
            <p><b>Parámetros:</b> fecha</p>
            <p><a href="https://api.nasa.gov/">Página de la API</a></p>
        </section>
        <section class="api" id="horoscopo">
            <form method="post">
                <input type="date" value="<?php echo $_SESSION['fechaHoroscopo']->format('Y-m-d');?>" id="fechaHoroscopo" name="fechaHoroscopo"
                    min="<?php echo ((new DateTime('tomorrow'))->sub(new DateInterval('P364D')))->format('Y-m-d');?>"
                    max="<?php echo (new DateTime('tomorrow'))->format('Y-m-d');?>"
                >
                <select name="signo" id="signo">
                    <option value="Aries" <?php if($avRest['horoscopo']['signo']=='Aries'){echo 'selected';}?>>Aries</option>
                    <option value="Taurus" <?php if($avRest['horoscopo']['signo']=='Taurus'){echo 'selected';}?>>Taurus</option>
                    <option value="Gemini" <?php if($avRest['horoscopo']['signo']=='Gemini'){echo 'selected';}?>>Gemini</option>
                    <option value="Cancer" <?php if($avRest['horoscopo']['signo']=='Cancer'){echo 'selected';}?>>Cancer</option>
                    <option value="Leo" <?php if($avRest['horoscopo']['signo']=='Leo'){echo 'selected';}?>>Leo</option>
                    <option value="Virgo" <?php if($avRest['horoscopo']['signo']=='Virgo'){echo 'selected';}?>>Virgo</option>
                    <option value="Libra" <?php if($avRest['horoscopo']['signo']=='Libra'){echo 'selected';}?>>Libra</option>
                    <option value="Scorpio" <?php if($avRest['horoscopo']['signo']=='Scorpio'){echo 'selected';}?>>Scorpio</option>
                    <option value="Sagittarius" <?php if($avRest['horoscopo']['signo']=='Sagittarius'){echo 'selected';}?>>Sagittarius</option>
                    <option value="Capricorn" <?php if($avRest['horoscopo']['signo']=='Capricorn'){echo 'selected';}?>>Capricorn</option>
                    <option value="Aquarius" <?php if($avRest['horoscopo']['signo']=='Aquarius'){echo 'selected';}?>>Aquarius</option>
                    <option value="Pisces" <?php if($avRest['horoscopo']['signo']=='Pisces'){echo 'selected';}?>>Pisces</option>
                </select>
                <input type="submit" name="cambiarHoroscopo" value="Cambiar">
            </form>
            <?php
                if($avRest['horoscopo']['mensaje']==null){
                    echo "<h2>Ha ourrido un error</h2>";
                }else{
                    echo "<h2>";
                    switch ($avRest['horoscopo']['signo']) {
                        case 'Aries':
                            echo "&#9800;";
                            break;
                        case 'Taurus':
                            echo "&#9801;";
                            break;
                        case 'Gemini':
                            echo "&#9802;";
                            break;
                        case 'Cancer':
                            echo "&#9803;";
                            break;
                        case 'Leo':
                            echo "&#9804;";
                            break;
                        case 'Virgo':
                            echo "&#9805;";
                            break;
                        case 'Libra':
                            echo "&#9806;";
                            break;
                        case 'Scorpio':
                            echo "&#9807;";
                            break;
                        case 'Sagittarius':
                            echo "&#9808;";
                            break;
                        case 'Capricorn':
                            echo "&#9809;";
                            break;
                        case 'Aquarius':
                            echo "&#9810;";
                            break;
                        case 'Pisces':
                            echo "&#9811;";
                            break;
                    }
                    echo $avRest['horoscopo']['fecha']."</h2>";
                    echo "<p>".$avRest['horoscopo']['mensaje']=$oHoroscopo->getMensaje()."</p>";
                }
            ?>
            <p><b>Parámetros:</b> fecha, sgino zodiacal</p>
            <p><a href="https://horoscope-app-api.vercel.app/">Página de la API</a></p>
        </section>
    </div>
    <div style='height: 30px'></div>
</main>
<script>
    var inputFechaNASA=document.getElementById("fechafotoNasa");
    let valorFechaInput=new Date(inputFechaNASA.value);
    let fechaFotoNasa=new Date("<?php echo $_SESSION['fechaNASA']->format('Y-m-d');?>");
    let fechaMax=new Date();
    let fechaMin=new Date("1995-06-16");
    inputFechaNASA.addEventListener("change", ()=>{
        if(valorFechaInput<=fechaMax && valorFechaInput>=fechaMin && valorFechaInput!==fechaFotoNasa){
            inputFechaNASA.parentElement.submit();
        }
    });
</script>