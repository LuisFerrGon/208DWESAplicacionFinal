<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación del archivo: 20/01/2025
     * @since 1.0.0
     */

    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaAnterior']='login';
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        exit();
    }
    if(isset($_REQUEST['registro'])){
        $_SESSION['paginaAnterior']='login';
        $_SESSION['paginaEnCurso']='registro';
        header('Location: index.php');
        exit();
    }
    require_once $aVistas['layout'];
    require_once 'core/lValidacionFormularios.php';
    require_once 'config/confDB.php';
    
    define('OBLIGATORIO', 1);
    define('MAX_ALFABETICO', 8);
    define('MIN_ALFABETICO', 4);
    define('MAX_PASS', 8);
    define('MIN_PASS', 4);
    define('DEBIL', 1); //La contraseña admite solo letras
    //Array donde recogemos los mensajes de error
    $aErrores=[
        'codigoUsuario' => '',
        'contrasenaUsuario' => ''
    ];
    
    if(isset($_REQUEST['login'])){
        $aErrores['codigoUsuario']=validacionFormularios::comprobarAlfabetico($_REQUEST['codigoUsuario'], MAX_ALFABETICO, MIN_ALFABETICO, OBLIGATORIO);
        $aErrores['contrasenaUsuario']=validacionFormularios::validarPassword($_REQUEST['contrasenaUsuario'], MAX_PASS, MIN_PASS, DEBIL, OBLIGATORIO);
        if($aErrores['codigoUsuario']==null && $aErrores['contrasenaUsuario']==null){
            $oUsuarioActivo=UsuarioPDO::validarUsuario($_REQUEST['codigoUsuario'], $_REQUEST['contrasenaUsuario']);
            if($oUsuarioActivo instanceof PDOException){
                $_SESSION['paginaAnterior']='login';
                $_SESSION['error']=new ErrorApp(
                    $oUsuarioActivo->getCode(),
                    $oUsuarioActivo->getMessage(),
                    $oUsuarioActivo->getFile(),
                    $oUsuarioActivo->getLine(),
                    $_SESSION['paginaAnterior']
                );
                $_SESSION['paginaEnCurso']='error';
                header('Location: index.php');
                exit();
            }
            if($oUsuarioActivo instanceof Usuario){
                UsuarioPDO::registrarUltimaConexion($oUsuarioActivo);
                $_SESSION['usuarioDAW208AppFinal']=$oUsuarioActivo;
                $_SESSION['paginaAnterior']='login';
                $_SESSION['paginaEnCurso']='inicioPrivado';
                header('Location: index.php');
                exit();
            }
        }
    }
?>