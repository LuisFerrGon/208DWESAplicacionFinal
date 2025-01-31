<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.1 Fecha última modificación del archivo: 29/01/2025
     * @since 1.0.1
     */
    $mensajeFotoNasaFallida=[
        'es'=>"La fecha introducida no es válida",
        'en'=>"The inputted date isn't valid",
        'pt'=>"The inputted date isn't valid"
    ]
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
    </section>
</div>
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
<div style='height: 30px'></div>