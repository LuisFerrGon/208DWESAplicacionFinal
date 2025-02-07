<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.2 Fecha última modificación del archivo: 06/02/2025
     * @since 1.0.2
     */
?>
<header>
    <h1>Modificar Departamento</h1>
</header>
<main>
    <div id="top">
        <section id="botones">
            <form>
                <input type="submit" name="volver" value="Volver">
            </form>
        </section>
    </div>
    <form name="modificarDepartamento" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="codigoDepartamento">Código:</label>
                    </td>
                    <td>
                        <input type="text" id="codigoDepartamento" name="codigoDepartamento" disabled>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="descripcionDepartamento">Descripción:</label>
                    </td>
                    <td>
                        <input type="password" id="descripcionDepartamento" name="descripcionDepartamento" class="obligatorio" required>
                    </td>
                    <?php
                        if(!empty($aErrores['descripcionDepartamento'])){
                            echo "<td class='error'>".$aErrores['descripcionDepartamento']."</td>";
                        }
                    ?>
                </tr>
                <tr>
                    <td>
                        <label for="fechaCreacionDepartamento">Fecha de creación:</label>
                    </td>
                    <td>
                        <input type="date" id="fechaCreacionDepartamento" name="fechaCreacionDepartamento" disabled>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="volumenDepartamento">Volumen:</label>
                    </td>
                    <td>
                        <input type="number" id="volumenDepartamento" name="volumenDepartamento" class="obligatorio" required>
                    </td>
                    <?php
                        if(!empty($aErrores['volumenDepartamento'])){
                            echo "<td class='error'>".$aErrores['volumenDepartamento']."</td>";
                        }
                    ?>
                </tr>
                <tr>
                    <td>
                        <label for="fechaBajaDepartamento">Fecha de baja:</label>
                    </td>
                    <td>
                        <input type="date" id="fechaBajaDepartamento" name="fechaBajaDepartamento" disabled>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <input id="modificar" name="modificar" type="submit" value="Modificar">
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</main>