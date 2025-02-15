<?php
    /**
     * @author Luis Ferreras González
     * @version 2.0.3 Fecha última modificación del archivo: 10/02/2025
     * @since 1.0.0
     * @since 1.0.1 Pagina REST, mtoDepartamento añadida
     * @since 1.0.2 Pagina modificarDepartamento añadida
     * @since 2.0.2 Pagina mostrarDepartamento añadida
     *              Pagina eliminarDepartamento añadida
     * @since 2.0.3 Pagina crearDepartamento
     */

    //Validacion de formularios
    require_once 'core/lValidacionFormularios.php';
    //Modelos
    require_once 'model/DB.php';
    require_once 'model/DBPDO.php';
    require_once 'model/Departamento.php';
    require_once 'model/DepartamentoPDO.php';
    require_once 'model/ErrorApp.php';
    require_once 'model/REST.php';
    require_once 'model/Usuario.php';
    require_once 'model/UsuarioDB.php';
    require_once 'model/UsuarioPDO.php';
    require_once 'model/fotoNASA.php';
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
        'detalle'=>'controller/cDetalle.php',
        'rest'=>'controller/cREST.php',
        'mtoDepartamento'=>'controller/cMtoDepartamento.php',
        'modificarDepartamento'=>'controller/cModificarDepartamento.php',
        'mostrarDepartamento'=>'controller/cMostrarDepartamento.php',
        'eliminarDepartamento'=>'controller/cEliminarDepartamento.php',
        'crearDepartamento'=>'controller/cCrearDepartamento.php'
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
        'detalle'=>'view/vDetalle.php',
        'rest'=>'view/vREST.php',
        'mtoDepartamento'=>'view/vMtoDepartamento.php',
        'modificarDepartamento'=>'view/vModificarDepartamento.php',
        'mostrarDepartamento'=>'view/vMostrarDepartamento.php',
        'eliminarDepartamento'=>'view/vEliminarDepartamento.php',
        'crearDepartamento'=>'view/vCrearDepartamento.php'
    ];
?>