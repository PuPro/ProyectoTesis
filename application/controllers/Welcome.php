<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    //Se crea un constructor para cargar el modelo
    public function __construct() {
        parent::__construct();
        $this->load->model('modelo');
    }

    public function index() {
        $this->load->view('header');
        //$this->load->view('menu');
        $this->load->view('footer');
    }

    
//------------------loguin-------------

    function validaLogin() {
        $data['rol'] = 0;
        if ($this->session->userdata('login')) {
            $data['rol'] = $this->session->userdata('rol');
            if ($data['rol'] == 1) {
                $this->load->view('menuAdministrador', $data);
            } else {
                $this->load->view('menuUsuario', $data);
            }
        } else {
            $this->load->view('login', $data);
        }
    }

    function login() {
        $usuario = $this->input->post("usuario");
        $clave = $this->input->post("contraseña");
        $data = $this->modelo->login($usuario, $clave);

        $cookie = array(
            "usuario" => $data['usuario'],
            "rol" => $data['rol'],
            "nombre" => $data['nombre'],
            "apellido" => $data['apellido']
        );

        $msj = "";
        if ($data['rol'] != "") {
            $cookie['login'] = true;
            $this->session->set_userdata($cookie);
        } else {
            $msj = "usuario no registrado";
        }
        echo json_encode(array("mensaje" => $msj));
    }

//  -------------  cargar menu usuario vistas----------
    function vistaTrabajador() {
        $this->load->view('trabajador');
    }

    function vistaCliente() {
        $this->load->view('cliente');
    }

    function vistaFactura() {
        $this->load->view('factura');
    }

    function vistaMaterial() {
        $this->load->view('material');
    }

    function vistaFlujoCaja() {
        $this->load->view('flujoCaja');
    }

    function vistaPerIngreso() {
        $this->load->view('perIngreso');
    }

    function vistaPerEgreso() {
        $this->load->view('perEgreso');
    }

    function vistaComparacion() {
        $this->load->view('comparacion');
    }

//   -------- cargar menu admin vstas------------

    function vistaUsuario() {
        $this->load->view('usuario');
    }

    function vistaEmpresa() {
        $this->load->view('empresa');
    }

    function salir() {
        $this->session->sess_destroy();
    }

//    ------------------facturas---------------------
    function cargaCliente() {
        $datos['facturaClientes'] = $this->modelo->cargaCliente()->result();
        $this->load->view('facturaClientes', $datos);
    }

    function cargaSucursalFactura() {
        $datos['sucursal'] = $this->modelo->CargaSucursal()->result();
        $this->load->view('sucursal', $datos);
    }

    function cargaProveedorfactura() {
        $datos['proveedor'] = $this->modelo->cargaProveedor()->result();
        $this->load->view('proveedor', $datos);
    }

    function cargaMaterial() {
        $datos['cargaMaterial'] = $this->modelo->cargaMaterial()->result();
        $this->load->view('cargaMaterial', $datos);
    }

    function btnuevofactura() {
        $numeroFactura = $this->input->post('NumeroFactura');
        $Fecha_ingresoFactura = $this->input->post('FechaIngreso');
        $Fecha_vencimientoFactura = $this->input->post('FechaVencimiento');
        $valorneto = $this->input->post('Neto');
        $valortotal = $this->input->post('Total');
        $iva = $this->input->post('Iva');
        $clienteFactura = $this->input->post('Cliente');
        $SucursalFactura = $this->input->post('Sucursal');
        $rutusuario = $this->input->post('RutUsuario');
        $proveedorFactura = $this->input->post('Proveedor');
        $valor = 1;

        if ($this->modelo->Guardarfactura
                        ($numeroFactura, $Fecha_ingresoFactura, $Fecha_vencimientoFactura, $valorneto, $valortotal, $iva, $clienteFactura, $SucursalFactura, $rutusuario, $proveedorFactura) == 0) {
            $valor = 0;
        }
        //Se imprime la variable valor enviandolo al archivo funcion
        echo json_encode(array('valor' => $valor));
    }

//    ------------ trabajador------------------------------------
    function CargaCargo() {

        //Se llama al modelo. En el modelo se buscan los cargos y se guardan en 
        //el arreglo cargo
        $datos['cargo'] = $this->modelo->CargaCargo()->result();
        $this->load->view('cargo', $datos);
    }

    function cargaSucursal() {
        $datos['sucursal'] = $this->modelo->CargaSucursal()->result();
        $this->load->view('sucursal', $datos);
    }

    function btnuevotrabajador() {
        $rutTrabajador = $this->input->post('Rut');
        $nombres = $this->input->post('Nombres');
        $apellidos = $this->input->post('Apellidos');
        $telefono = $this->input->post('Telefono');
        $direccion = $this->input->post('Direccion');
        $fechaIngreso = $this->input->post('FechaIngreso');
        $estado = $this->input->post('Estado');
        $IDCargo = $this->input->post('Cargo');
        $rutEmpresa = $this->input->post('Sucursal');
        $valor = 1;

        if ($this->modelo->GuardarTrabajador
                        ($rutTrabajador, $nombres, $apellidos, $telefono, $direccion, $fechaIngreso, $estado, $IDCargo, $rutEmpresa) == 0) {
            $valor = 0;
        }
        //Se imprime la variable valor enviandolo al archivo funcion
        echo json_encode(array('valor' => $valor));
    }

    function actualizaTablaTrabajador() {
        $datos = $this->modelo->cargarTablaTrabajadores();
        $data['cantidad'] = $datos->num_rows();
        $data['resultado'] = $datos->result();
        $this->load->view('tablaTrabajador', $data);
    }

    function eliminarTrabajador() {
        $ruttrabajador = $this->input->post("ruttrabajador");
        $this->modelo->eliminaTrabajador($ruttrabajador);
    }

//    -------------------cmboxcliente------------

    function CargaRegion() {
        $datos['region'] = $this->modelo->CargaRegion()->result();
        $this->load->view('region', $datos);
    }

    function cargaSucursalCliente() {
        $datos['sucursal'] = $this->modelo->CargaSucursal()->result();
        $this->load->view('sucursal', $datos);
    }

    function CargaComuna() {
        $datos['comuna'] = $this->modelo->CargaComuna()->result();
        $this->load->view('comuna', $datos);
    }

    function btnuevocliente() {


        $RutCliente = $this->input->post('Rut');
        $NombreCliente = $this->input->post('Nombres');
        $ApellidoCliente = $this->input->post('Apellidos');
        $TelefonoCliente = $this->input->post('Telefono');
        $Fecha_ingresoCliente = $this->input->post('FechaIngreso');
        $DireccionCliente = $this->input->post('Direccion');
        $ComunaCliente = $this->input->post('Comuna');
        $SucursalCliente = $this->input->post('Sucursal');

        $valor = 1;

        if ($this->modelo->GuardarClientes
                        ($RutCliente, $NombreCliente, $ApellidoCliente, $TelefonoCliente, $Fecha_ingresoCliente, $DireccionCliente, $ComunaCliente, $SucursalCliente) == 0) {
            $valor = 0;
        }
        //Se imprime la variable valor enviandolo al archivo funcion
        echo json_encode(array('valor' => $valor));
    }

//    -----------------------flujo caja----------------

    function cargaSucursalFlujoCaja() {
        $datos['sucursal'] = $this->modelo->CargaSucursal()->result();
        $this->load->view('sucursal', $datos);
    }

    function cargaItem() {
        $datos['item'] = $this->modelo->CargaItem()->result();
        $this->load->view('item', $datos);
    }

    function btnuevoflujocaja() {
        $Fecha_ingresoFlujor = $this->input->post('FechaIngreso');
        $ITEMFlujo = $this->input->post('ItemFlujo');
        $SucursalFlujo = $this->input->post('Sucursal');
        $MontoTotalFlujo = $this->input->post('Monto');
        $DescripcionFlujo = $this->input->post('Descripcion');
        $valor = 1;

        if ($this->modelo->GuardarFlujoCaja
                        ($Fecha_ingresoFlujor, $ITEMFlujo, $SucursalFlujo, $MontoTotalFlujo, $DescripcionFlujo) == 0) {
            $valor = 0;
        }
        //Se imprime la variable valor enviandolo al archivo funcion
        echo json_encode(array('valor' => $valor));
    }

//    --------------------administrador---------------


    function cargaSucursalUsuarios() {
        $datos['sucursal'] = $this->modelo->CargaSucursal()->result();
        $this->load->view('sucursal', $datos);
    }

    function CargaRol() {
        $datos['rol'] = $this->modelo->CargaRol()->result();
        $this->load->view('rol', $datos);
    }

    function btnuevousuario() {

        $RutUsuario = $this->input->post('RutUsuario');
        $NombresUsuario = $this->input->post('NombresUsuario');
        $ApellidoUsuario = $this->input->post('ApellidosUsuario');
        $RolUsuario = $this->input->post('Rol');
        $SucursalUsuario = $this->input->post('SucursalUsuario');
        $contraseñaUsuario = $this->input->post('Contraseña');

        $valor = 1;

        if ($this->modelo->GuardarUsuario
                        ($RutUsuario, $NombresUsuario, $ApellidoUsuario, $RolUsuario, $SucursalUsuario, $contraseñaUsuario) == 0) {
            $valor = 0;
        }
        //Se imprime la variable valor enviandolo al archivo funcion
        echo json_encode(array('valor' => $valor));
    }

    function btnuevoempresa() {
        $RutEmpresa = $this->input->post('RutEmpresa');
        $NombresEmpresa = $this->input->post('NombresEmpresa');
        $DireccionEmpresa = $this->input->post('DireccionEmpresa');
        $TelefonoEmpresa = $this->input->post('TelefonoEmpresa');
        $CorreoElectronicoEmpresa = $this->input->post('CorreoElectronicoEmpresa');
        $valor = 1;

        if ($this->modelo->GuardarEmpresa
                        ($RutEmpresa, $NombresEmpresa, $DireccionEmpresa, $TelefonoEmpresa, $CorreoElectronicoEmpresa) == 0) {
            $valor = 0;
        }
        //Se imprime la variable valor enviandolo al archivo funcion
        echo json_encode(array('valor' => $valor));
    }

}
