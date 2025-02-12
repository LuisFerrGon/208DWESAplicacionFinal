<?php
    /**
     * @author Luis Ferreras González
     * @version 2.0.3 Fecha última modificación del archivo: 12/02/2025
     * @since 1.0.1
     * @since 1.0.2 Cambio del layout
     * @since 2.0.2 Cambio a modificación
     * @since 2.0.3 Eliminar
     *              Crear
     *              Alta
     *              Baja
     */

    $mensajeBusquedaVacia=[
        "es"=>'No hay departamentos que se adhieran a la busqueda.',
        "en"=>'There aren\'t departments that fit that search.',
        "pt"=>'There aren\'t departments that fit that search.'
    ];
?>
<header>
    <h1>Mantenimiento de Departamentos</h1>
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
    <form method="post" id="formularioCondicionesBusqueda">
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="descripcionDep">Descripción departamento:</label>
                    </td>
                    <td>
                        <input type="text" id="descripcionDep" name="descripcionDep" placeholder="Ej: Descripción" maxlength="255" minlength="0" value="<?php echo $_SESSION['descripcionDep']; ?>">
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <input id="enviar" name="enviar" type="submit" value="Buscar">
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
    <table id="tablaDepartamentos">
        <thead>
            <tr>
                <th span="col">Código</th>
                <th span="col">Descripción</th>
                <th span="col">Fecha creación</th>
                <th span="col">Volumen</th>
                <th span="col">Fecha baja</th>
                <th span="col">Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(count($aDepartamentos)==0){
                echo "<tr>"
                . "<td colspan='5'>".$mensajeBusquedaVacia[$idioma]."</td>"
                . "</tr>";
            }else{
                foreach($aDepartamentos as $oDepartamento){
                    $codigo=$oDepartamento->getCodigo();
                    $fechaBaja=$oDepartamento->getFechaBaja();
                    $altaBaja=($fechaBaja!=null)
                        ?"<input type='submit' id='alta".$codigo."' name='alta".$codigo."' value='Alta'>"
                        :"<input type='submit' id='baja".$codigo."' name='baja".$codigo."' value='Baja'>";
                    $claseDeBaja=($fechaBaja!=null)
                        ?"class='departamentoBaja'"
                        :null;
                    echo "<tr ".$claseDeBaja.">"
                    . "<td>".$codigo."</td>"
                    . "<td>".$oDepartamento->getDescripcion()."</td>"
                    . "<td>".$oDepartamento->getFechaCreacion()."</td>"
                    . "<td>".$oDepartamento->getVolumenNegocio()."</td>"
                    . "<td>".$fechaBaja."</td>"
                    . "<td>"
                        . "<form id='accionDepartamento' method='post'  action='".$_SERVER['PHP_SELF']."'>"
                            . "<input type='submit' id='modificar".$codigo."' name='modificar".$codigo."' value='Modificar'>"
                            . "<input type='submit' id='mostrar".$codigo."' name='mostrar".$codigo."' value='Mostrar'>"
                            . "<input type='submit' id='eliminar".$codigo."' name='eliminar".$codigo."' value='Eliminar'>"
                            . $altaBaja
                        . "</form>"
                    . "</td>"
                    . "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <form method='post' id="crear">
        <input type="submit" name="crear" value="Crear">
    </form>
    <div style='height: 30px'></div>
</main>