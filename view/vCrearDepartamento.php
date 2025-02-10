<?php
    /**
     * @author Luis Ferreras González
     * @version 2.0.3 Fecha última modificación del archivo: 10/02/2025
     * @since 2.0.3
     */
?>
<header>
    <h1>Crear Departamento</h1>
</header>
<main>
    <div id="top">
        <section id="botones">
        </section>
    </div>
    <form name="modificarDepartamento" id="modificarDepartamento" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="codigoDepartamento">Código:</label>
                    </td>
                    <td>
                        <input type="text" id="codigoDepartamento" name="codigoDepartamento" value="<?php
                            if(empty($aErrores['codigoDepartamento']) && !empty($_REQUEST['codigoDepartamento'])){
                                echo $_REQUEST['codigoDepartamento'];
                            }else{
                                echo null;
                            }
                        ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="descripcionDepartamento">Descripción:</label>
                    </td>
                    <td>
                        <input type="text" id="descripcionDepartamento" name="descripcionDepartamento" value="<?php
                            if(empty($aErrores['descripcionDepartamento']) && !empty($_REQUEST['descripcionDepartamento'])){
                                echo $_REQUEST['descripcionDepartamento'];
                            }else{
                                echo null;
                            }
                        ?>" class="obligatorio" required>
                    </td>
                    <?php
                        if(!empty($aErrores['descripcionDepartamento'])){
                            echo "<td class='error'>".$aErrores['descripcionDepartamento']."</td>";
                        }
                    ?>
                </tr>
                <tr>
                    <td>
                        <label for="volumenDepartamento">Volumen:</label>
                    </td>
                    <td>
                        <input type="number" id="volumenDepartamento" name="volumenDepartamento" class="obligatorio" value="<?php
                            if(empty($aErrores['volumenDepartamento']) && !empty($_REQUEST['volumenDepartamento'])){
                                echo $_REQUEST['volumenDepartamento'];
                            }else{
                                echo 0;
                            }
                        ?>" step="0.01" required>
                    </td>
                    <?php
                        if(!empty($aErrores['volumenDepartamento'])){
                            echo "<td class='error'>".$aErrores['volumenDepartamento']."</td>";
                        }
                    ?>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <input id="crear" name="crear" type="submit" value="Crear">
                    </td>
                    <td>
                        <input type="submit" name="volver" value="Volver">
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</main>