<?php
    /**
     * @author Luis Ferreras González
     * @version 2.0.2 Fecha última modificación del archivo: 07/02/2025
     * @since 1.0.2
     * @since 2.0.2 Modificaciones para mostrar información
     *              Posicionamiento de volver
     * @since 2.0.3 novalidate
     */
?>
<header>
    <h1>Modificar Departamento</h1>
</header>
<main>
    <div id="top">
        <section id="botones">
        </section>
    </div>
    <form name="modificarDepartamento" id="modificarDepartamento" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="codigoDepartamento">Código:</label>
                    </td>
                    <td>
                        <input type="text" id="codigoDepartamento" name="codigoDepartamento" value="<?php echo($departamentoEnCurso->getCodigo());?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="descripcionDepartamento">Descripción:</label>
                    </td>
                    <td>
                        <input type="text" id="descripcionDepartamento" name="descripcionDepartamento" value="<?php
                            if(empty($aErrores['descripcionDepartamento']) && !empty($_REQUEST['descripcionDepartamento'])){
                                $departamentoEnCurso->setDescripcion($_REQUEST['descripcionDepartamento']);
                            }
                            echo ($departamentoEnCurso->getDescripcion());
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
                        <label for="fechaCreacionDepartamento">Fecha de creación:</label>
                    </td>
                    <td>
                        <input type="date" id="fechaCreacionDepartamento" name="fechaCreacionDepartamento" value="<?php echo(date('Y-m-d', strtotime($departamentoEnCurso->getFechaCreacion())));?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="volumenDepartamento">Volumen:</label>
                    </td>
                    <td>
                        <input type="number" id="volumenDepartamento" name="volumenDepartamento" class="obligatorio" value="<?php
                            if(empty($aErrores['volumenDepartamento']) && !empty($_REQUEST['volumenDepartamento'])){
                                $departamentoEnCurso->setDescripcion($_REQUEST['volumenDepartamento']);
                            }
                            echo ($departamentoEnCurso->getVolumenNegocio());
                        ?>" step="0.01" required>
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
                        <input type="date" id="fechaBajaDepartamento" name="fechaBajaDepartamento" value="<?php
                            if($departamentoEnCurso->getFechaBaja()!=null){
                                echo(date('Y-m-d', strtotime($departamentoEnCurso->getFechaBaja())));
                            }
                        ?>" disabled>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <input id="modificar" name="modificar" type="submit" value="Modificar">
                    </td>
                    <td>
                        <input type="submit" name="volver" value="Volver">
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</main>