<?php
    /**
     * @author Luis Ferreras González
     * @version 1.0.0 Fecha última modificación del archivo: 20/01/2025
     * @since 1.0.0
     */

    //Validacion de formularios
    require_once 'core/lValidacionFormularios.php';
    //Modelos
    require_once 'model/DB.php';
    require_once 'model/DBPDO.php';
    require_once 'model/ErrorApp.php';
    require_once 'model/Usuario.php';
    require_once 'model/UsuarioDB.php';
    require_once 'model/UsuarioPDO.php';
    //Array de los controladores
    $aControladores=[
        'inicioPublico'=>'controller/cInicioPublico.php',
        'login'=>'controller/cLogin.php',
        'inicioPrivado'=>'controller/cInicioPrivado.php',
        'tecnologias'=>'controller/cTecnologias.php',
        'rss'=>'controller/cRSS.php',
        'registro'=>'controller/cRegistro.php',
        'miCuenta'=>'controller/cMiCuenta.php',
        'borrarCuenta'=>'controller/cBorrarCuenta.php',
        'wip'=>'controller/cWIP.php',
        'error'=>'controller/cError.php',
        'detalle'=>'controller/cDetalle.php'
    ];
    //Array de las vistas
    $aVistas=[
        'layout'=>'view/vLayout.php',
        'inicioPublico'=>'view/vInicioPublico.php',
        'login'=>'view/vLogin.php',
        'inicioPrivado'=>'view/vInicioPrivado.php',
        'tecnologias'=>'view/view/vTecnologias.php',
        'rss'=>'view/vRSS.php',
        'registro'=>'view/vRegistro.php',
        'miCuenta'=>'view/vMiCuenta.php',
        'borrarCuenta'=>'view/vBorrarCuenta.php',
        'wip'=>'view/vWIP.php',
        'error'=>'view/vError.php',
        'detalle'=>'view/vDetalle.php'
    ];
?>