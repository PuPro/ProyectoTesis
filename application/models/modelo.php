<?php

class modelo extends CI_Model {
    
//    ----------------- loguin--------------
    //Funcion que verifica si el usuario esta en la base de datos
    //y devuelve valores que le pertenecen
    function login($usuario, $clave) {
        $this->db->select('*');
        $this->db->where('rutusuario', $usuario);
        $this->db->where('contraseña', $clave);
        $datos = $this->db->get('usuario');
        $data['usuario'] = "";
        $data['rol'] = "";
        $data['nombre'] = "";
        $data['apellido'] = "";
        foreach ($datos->result() as $fila) {
            $data['usuario'] = $fila->rutusuario;
            $data['rol'] = $fila->Rol_idRol;
            $data['nombre'] = $fila->nombre;
            $data['apellido'] = $fila->apellido;
        }
        return $data;
    }
//-------------------trabajador-----------------------
    function CargaCargo() {
        //Consulta a la base de datos a ña tabla cargo
        $this->db->select('*');
        return $this->db->get('cargo');
    }

    function CargaSucursal() {
        //Consulta a la base de datos a ña tabla cargo
        $this->db->select('rutempresa, nombre');
        return $this->db->get('empresa');
    }

    function GuardarTrabajador(
    $rutTrabajador, $nombres, $apellidos, $telefono, $direccion, $fechaIngreso, $estado, $IDCargo, $rutEmpresa) {
        $this->db->select('ruttrabajador');
        $this->db->where('ruttrabajador', $rutTrabajador);
        //Almacena la cantidad de filas que contienen el valor rut
        $cantidad = $this->db->get('trabajador')->num_rows();
        if ($cantidad == 0):
            $data = array(
                'ruttrabajador' => $rutTrabajador,
                'nombre' => $nombres,
                'apellido' => $apellidos,
                'direccion' => $direccion,
                'telefono' => $telefono,
                'fecha_ingreso' => $fechaIngreso,
                'estado' => $estado,
                'cargo_idcargo' => $IDCargo,
                'empresa_rutempresa' => $rutEmpresa
            );
            $this->db->insert('trabajador', $data);
            return 0;
        else:
            return 1;
        endif;
    }
    
    function tablaTrabajador() {
        //Consulta a la base de datos añade tabla 
        $this->db->select('*');
        return $this->db->get('trabajador');
        
    }


    
    
//    ------------------------facturas--------------------------
    
    function cargaCliente() {
        //Consulta a la base de datos añade tabla 
        $this->db->select('rutcliente, nombre');
        return $this->db->get('cliente');
    }
    function cargaProveedor() {
        //Consulta a la base de datos añade tabla 
        $this->db->select('*');
        return $this->db->get('proveedor');
    }
    function cargaMaterial() {
        //Consulta a la base de datos añade tabla 
        $this->db->select('*');
        return $this->db->get('material');
    }
function botonGuardarfactura(
$numeroFactura, $Fecha_ingresoFactura, $Fecha_vencimientoFactura, $valorneto, $valortotal, $iva, $clienteFactura, $SucursalFactura, $rutusuario, $proveedorFactura) {
$this->db->select('idfactura');
 $this->db->where('numeroFactura', $numeroFactura);
$cantidad = $this->db->get('factura')->num_rows();
if ($cantidad == 0):
        $data = array(
    'numerofactura'=> $numeroFactura,
    'fecha_emision'=>$Fecha_ingresoFactura,
    'fecha_vencimiento'=>$Fecha_vencimientoFactura,
    'valorneto'=>$valorneto,
    'valortotal'=>$valortotal,
    'iva'=>$iva,
    'cliente_rutcliente'=>$clienteFactura,
    'empresa_rutempresa'=>$SucursalFactura,
    'usuario_rutusuario'=>$rutusuario,
    'proveedor_rutproveedor'=>$proveedorFactura,);
$this->db->insert('factura', $data);
  return 0;
    else:
        return 1;
    endif;
}

    
//    -----------------clientes------------
    function CargaRegion () {
        //Consulta a la base de datos a ña tabla cargo
        $this->db->select('*');
        return $this->db->get('region');
    }

function CargaComuna () {
        //Consulta a la base de datos a ña tabla cargo
        $this->db->select('*');
        return $this->db->get('comuna');
    }

//------------flujo caja-------------------
    
    function CargaItem () {
        //Consulta a la base de datos a ña tabla cargo
        $this->db->select('*');
        return $this->db->get('item');
    }
    
}
?>

