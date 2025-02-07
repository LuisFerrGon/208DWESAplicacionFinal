<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.2 Fecha última modificación del archivo: 06/02/2025
     * @since 1.0.0
     * @since 1.0.2 Cmabio del layout
     */
    /**
     * @var array $bienvenida Array que contiene el mensaje de bienvenida.
     */
    $mensaje=[
        'es'=>[
            0=>"Descripción: {$avMiCuenta['descripcion']}<br>"
                ."Última conexión: ".$avMiCuenta['ultimaConexion']->format('d/m/Y H:i:s')."<br>"
                ."Nº de conexiones: {$avMiCuenta['conexiones']}<br>",
            1=>"Descripción: {$avMiCuenta['descripcion']}<br>"
                ."Última conexión: ".$avMiCuenta['ultimaConexion']->format('d/m/Y H:i:s')."<br>"
                ."Conexión anterior: ".date('d/m/Y H:i:s', $avMiCuenta['conexionAnterior'])."<br>"
                ."Nº de conexiones: {$avMiCuenta['conexiones']}<br>"
        ],
        'en'=>[
            0=>"Description: {$avMiCuenta['descripcion']}<br>"
                ."Latest connection: ".$avMiCuenta['ultimaConexion']->format('m/d/Y H:i:s')."<br>"
                ."Number of connections: {$avMiCuenta['conexiones']}<br>",
            1=>"Description: {$avMiCuenta['descripcion']}<br>"
                ."Latest connection: ".$avMiCuenta['ultimaConexion']->format('m/d/Y H:i:s')."<br>"
                ."Last connection: ".date('m/d/Y H:i:s', $avMiCuenta['conexionAnterior'])."<br>"
                ."Number of connections: {$avMiCuenta['conexiones']}<br>"
        ],
        'pt'=>[
            0=>"Description: {$avMiCuenta['descripcion']}<br>"
                ."Latest connection: ".$avMiCuenta['ultimaConexion']->format('m/d/Y H:i:s')."<br>"
                ."Number of connections: {$avMiCuenta['conexiones']}<br>",
            1=>"Description: {$avMiCuenta['descripcion']}<br>"
                ."Latest connection: ".$avMiCuenta['ultimaConexion']->format('m/d/Y H:i:s')."<br>"
                ."Last connection: ".date('d/m/Y H:i:s', $avMiCuenta['conexionAnterior'])."<br>"
                ."Number of connections: {$avMiCuenta['conexiones']}<br>"
        ]
    ];
?>
<header><h1>Cuenta</h1></header><main>
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
    echo "<h2>".$avMiCuenta['codigo']."</h2>";
    echo "<p>".$mensaje[$idioma][$avMiCuenta['conexionAnterior']!=null]."</p>";
?>
<div style='height: 30px'></div></main>