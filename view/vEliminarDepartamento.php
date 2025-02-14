<?php
    /**
     * @author Luis Ferreras González
     * @version 2.0.3 Fecha última modificación del archivo: 07/02/2025
     * @since 2.0.3
     */
?>
<header>
    <h1>Mostrar Departamento</h1>
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
                        <input type="text" id="codigoDepartamento" name="codigoDepartamento" value="<?php echo($departamentoEnCurso->getCodigo());?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="descripcionDepartamento">Descripción:</label>
                    </td>
                    <td>
                        <input type="text" id="descripcionDepartamento" name="descripcionDepartamento" value="<?php echo ($departamentoEnCurso->getDescripcion());?>" disabled>
                    </td>
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
                        <input type="number" id="volumenDepartamento" name="volumenDepartamento" value="<?php echo ($departamentoEnCurso->getVolumenNegocio());?>" step="0.01" disabled>
                    </td>
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
                        <input type="submit" name="eliminar" value="Eliminar">
                    </td>
                    <td>
                        <input type="submit" name="volver" value="Volver">
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</main>