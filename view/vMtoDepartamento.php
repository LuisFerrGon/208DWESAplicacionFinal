<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.1 Fecha última modificación del archivo: 30/01/2025
     * @since 1.0.1
     */
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
<form method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <label for="descripionDep">Descripción departamento:</label>
                </td>
                <td>
                    <input type="text" id="descripionDep" name="descripionDep" placeholder="Ej: Descripción" maxlength="255" minlength="0" value="<?php echo (isset($_REQUEST['descripionDep']) ? $_REQUEST['descripionDep'] : ''); ?>">
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
<table>
    <thead>
        <tr>
            <th span="col">Código</th>
            <th span="col">Descripción</th>
            <th span="col">Fecha creación</th>
            <th span="col">Código</th>
            <th span="col">Fecha baja</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($aDepartamentos as $oDepartamento) {
            $tr="<tr>"
            . "<td>".$oDepartamento->getCodigo()."</td>"
            . "<td>".$oDepartamento->getDescripcion()."</td>"
            . "<td>".$oDepartamento->getFechaCreacion()."</td>"
            . "<td>".$oDepartamento->getVolumenNegocio()."</td>"
            . "<td>".$oDepartamento->getFechaBaja()."</td>"
            . "</tr>";
            echo $tr;
        }
        ?>
    </tbody>
</table>
<div style='height: 30px'></div>