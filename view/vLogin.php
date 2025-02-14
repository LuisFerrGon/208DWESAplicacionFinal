<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.2 Fecha última modificación del archivo: 06/02/2025
     * @since 1.0.0
     * @since 1.0.2 Cmabio del layout
     */
?>
<header>
    <h1>Iniciar Sesión</h1>
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
            <form>
                <input type="submit" name="registro" value="Registrarse">
            </form>
        </section>
    </div>
    <div id="formulariologin">
        <h2>Log in</h2>
        <form name="plantilla" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="codigoUsuario">Usuario:</label>
                        </td>
                        <td>
                            <input type="text" id="codigoUsuario" name="codigoUsuario" class="obligatorio" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="contrasenaUsuario">Contraseña:</label>
                        </td>
                        <td>
                            <input type="password" id="contrasenaUsuario" name="contrasenaUsuario" class="obligatorio" required>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <input id="login" name="login" type="submit" value="Iniciar sesión">
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
</main>