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
        'es'=>"Se está trabajando en esta página y no se encuentra disponible.",
        'en'=>"This page is being worked on and isn't available.",
        'pt'=>"pt wip"
    ];
?>
<header>
    <h1>Registrarse</h1>
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
    <div id="formularioregistro">
        <h2>Registro de usuario</h2>
        <form name="plantilla" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="codigoUsuario">Código:</label>
                        </td>
                        <td>
                            <input type="text" id="codigoUsuario" name="codigoUsuario" class="obligatorio" value="<?php echo(isset($_REQUEST['codigoUsuario']) && empty($aErrores['codigoUsuario'])?$_REQUEST['codigoUsuario']:'');?>" required>
                        </td>
                            <?php
                                if(!empty($aErrores['codigoUsuario'])){
                                    echo "<td class='error'>".$aErrores['codigoUsuario']."</td>";
                                }
                            ?>
                    </tr>
                    <tr>
                        <td>
                            <label for="contrasenaUsuario">Contraseña:</label>
                        </td>
                        <td>
                            <input type="password" id="contrasenaUsuario" name="contrasenaUsuario" class="obligatorio" value="<?php echo(isset($_REQUEST['contrasenaUsuario']) && empty($aErrores['contrasenaUsuario'])?$_REQUEST['contrasenaUsuario']:'');?>" required>
                        </td>
                            <?php
                                if(!empty($aErrores['contrasenaUsuario'])){
                                    echo "<td class='error'>".$aErrores['contrasenaUsuario']."</td>";
                                }
                            ?>
                    </tr>
                    <tr>
                        <td>
                            <label for="descripcionUsuario">Descripción:</label>
                        </td>
                        <td>
                            <input type="text" id="descripcionUsuario" name="descripcionUsuario" class="obligatorio" value="<?php echo(isset($_REQUEST['descripcionUsuario']) && empty($aErrores['descripcionUsuario'])?$_REQUEST['descripcionUsuario']:'');?>" required>
                        </td>
                            <?php
                                if(!empty($aErrores['descripcionUsuario'])){
                                    echo "<td class='error'>".$aErrores['descripcionUsuario']."</td>";
                                }
                            ?>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <input id="registro" name="registro" type="submit" value="Registrarse">
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
    <div style='height: 30px'></div>
</main>