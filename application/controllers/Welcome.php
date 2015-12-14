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

    //La funcion llama al modelo
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

//    cargar menu usuario
    function vistaTrabajador() {
        if ($this->session->userdata("login")) {
            $this->load->view('trabajador');
        } else {
            redirect(base_url());
        }
    }

    function vistaCliente() {
        $this->load->view('cliente');
    }

    function vistaFactura() {
        if ($this->session->userdata("login")) {
            $this->load->view('factura');
        } else {
            redirect(base_url());
        }
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

//    cargar menu admin

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

//    ------------tabla trabajador------------------------------------

    function tablaTrabajador() {
        if ($this->session->userdata("login")) {
            $data = $this->modelo->tablaTrabajador();
            $datos['cantidad'] = $data->num_rows();
            $datos['trabajador'] = $data->result();
            $this->load->view('tablaTrabajador', $datos);
        } else {
            redirect(base_url());
        }
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

//    -----------------------flujo caja----------------

    function cargaSucursalFlujoCaja() {
        $datos['sucursal'] = $this->modelo->CargaSucursal()->result();
        $this->load->view('sucursal', $datos);
    }

    function cargaItem() {
        $datos['item'] = $this->modelo->CargaItem()->result();
        $this->load->view('item', $datos);
    }

//    --------------------administrador---------------


    function cargaSucursalUsuarios() {
        $datos['sucursal'] = $this->modelo->CargaSucursal()->result();
        $this->load->view('sucursal', $datos);
    }

    function cargaCargoUsuarios() {
        $datos['cargo'] = $this->modelo->CargaSucursal()->result();
        $this->load->view('cargo', $datos);
    }

}
