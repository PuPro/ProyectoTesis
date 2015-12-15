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

//    function eliminaTrabajador($ruttrabajador) {
//        $this->db->where('ruttrabajador', $ruttrabajador);
//        $this->db->delete("trabajador");
//    }
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

    function cargaTrabajador() {
        //Consulta a la base de datos añade tabla 
        $this->db->select('*');
        $this->db->where('cargo_idcargo', 1);
        return $this->db->get('trabajador');
    }

    function botonGuardarfactura(
    $numeroFactura, $Fecha_ingresoFactura, $Fecha_vencimientoFactura, $valorneto, $valortotal, $iva, $clienteFactura, $SucursalFactura, $rutusuario, $proveedorFactura) {
        $this->db->select('idfactura');
        $this->db->where('numeroFactura', $numeroFactura);
        $cantidad = $this->db->get('factura')->num_rows();
        if ($cantidad == 0):
            $data = array(
                'numerofactura' => $numeroFactura,
                'fecha_emision' => $Fecha_ingresoFactura,
                'fecha_vencimiento' => $Fecha_vencimientoFactura,
                'valorneto' => $valorneto,
                'valortotal' => $valortotal,
                'iva' => $iva,
                'cliente_rutcliente' => $clienteFactura,
                'empresa_rutempresa' => $SucursalFactura,
                'usuario_rutusuario' => $rutusuario,
                'proveedor_rutproveedor' => $proveedorFactura,);
            $this->db->insert('factura', $data);
            return 0;
        else:
            return 1;
        endif;
    }

    function Guardarfactura(
    $numeroFactura, $Fecha_ingresoFactura, $Fecha_vencimientoFactura, $valorneto, $valortotal, $iva, $clienteFactura, $SucursalFactura, $rutusuario, $proveedorFactura) {
        $this->db->select('numerofactura');
        $this->db->where('numeroFactura', $numeroFactura);
        $cantidad = $this->db->get('factura')->num_rows();
        if ($cantidad == 0):
            $data = array(
                'numerofactura' => $numeroFactura,
                'fecha_emision' => $Fecha_ingresoFactura,
                'fecha_vencimiento' => $Fecha_vencimientoFactura,
                'valorneto' => $valorneto,
                'valortotal' => $valortotal,
                'iva' => $iva,
                'cliente_rutcliente' => $clienteFactura,
                'empresa_rutempresa' => $SucursalFactura,
                'usuario_rutusuario' => $rutusuario,
                'proveedor_rutproveedor' => $proveedorFactura,);
            $this->db->insert('factura', $data);
            return 0;
        else:
            return 1;
        endif;
    }

//    -----------------clientes------------
    function CargaRegion() {
        //Consulta a la base de datos a ña tabla cargo
        $this->db->select('*');
        return $this->db->get('region');
    }

    function CargaComuna() {
        //Consulta a la base de datos a ña tabla cargo
        $this->db->select('*');
        return $this->db->get('comuna');
    }

    function GuardarClientes($RutCliente, $NombreCliente, $ApellidoCliente, $TelefonoCliente, $Fecha_ingresoCliente, $DireccionCliente, $ComunaCliente, $SucursalCliente) {

        $this->db->select('rutcliente');
        $this->db->where('rutcliente', $RutCliente);
        $cantidad = $this->db->get('cliente')->num_rows();
        if ($cantidad == 0):
            $data = array(
                'rutcliente' => $RutCliente,
                'nombre' => $NombreCliente,
                'apellido' => $ApellidoCliente,
                'direccion' => $DireccionCliente,
                'telefono' => $TelefonoCliente,
                'fecha_ingreso' => $Fecha_ingresoCliente,
                'empresa_rutempresa' => $SucursalCliente,
                'ciudad_idciudad' => $ComunaCliente,);
            $this->db->insert('cliente', $data);
            return 0;
        else:
            return 1;
        endif;
    }

//------------flujo caja-------------------

    function CargaItem() {
        //Consulta a la base de datos a ña tabla cargo
        $this->db->select('*');
        return $this->db->get('item');
    }

    function GuardarFlujoCaja($Fecha_ingresoFlujor, $ITEMFlujo, $SucursalFlujo, $MontoTotalFlujo, $DescripcionFlujo) {

        $cantidad = $this->db->get('flujo')->num_rows();
        if ($cantidad == 0):
            $data = array(
                'fecha_creacion' => $Fecha_ingresoFlujor,
                'monto' => $MontoTotalFlujo,
                'descripcion' => $DescripcionFlujo,
                'empresa_rutempresa' => $SucursalFlujo,
                'item_iditem' => $ITEMFlujo,);
            $this->db->insert('flujo', $data);
            return 0;
        else:
            return 1;
        endif;
    }

}

//-----------------admin usuario---------------------

function CargaRol() {
    //Consulta a la base de datos a ña tabla rol
    $this->db->select('*');
    return $this->db->get('rol');
}

function GuardarUsuario($RutUsuario, $NombresUsuario, $ApellidoUsuario, $RolUsuario, $SucursalUsuario, $contraseñaUsuario) {

    $this->db->select('rutusuario');
    $this->db->where('rutusuario', $RutUsuario);
    $cantidad = $this->db->get('usuario')->num_rows();
    if ($cantidad == 0):
        $data = array(
            'rutusuario' => $RutUsuario,
            'nombre' => $NombresUsuario,
            'apellido' => $ApellidoUsuario,
            'Rol_idRol' => $RolUsuario,
            'empresa_rutempresa' => $SucursalUsuario,
            'contraseña' => $contraseñaUsuario,);
        $this->db->insert('usuario', $data);
        return 0;
    else:
        return 1;
    endif;
}

//----------------------admin empresa------------
function GuardarEmpresa($RutEmpresa, $NombresEmpresa, $DireccionEmpresa, $TelefonoEmpresa, $CorreoElectronicoEmpresa) {

    $this->db->select('rutusuario');
    $this->db->where('rutusuario', $RutEmpresa);
    $cantidad = $this->db->get('empresa')->num_rows();
    if ($cantidad == 0):
        $data = array(
            'rutusuario' => $RutEmpresa,
            'nombre' => $NombresEmpresa,
            'apellido' => $DireccionEmpresa,
            'Rol_idRol' => $TelefonoEmpresa,
            'contraseña' => $CorreoElectronicoEmpresa,);
        $this->db->insert('empresa', $data);
        return 0;
    else:
        return 1;
    endif;
}

function GuardarFacturaTrabajador($idfactura, $ruttrabajador) {
    $this->db->select('idfactura');
    $this->db->where('idfactura', $idfactura);
    $cantidad = $this->db->get('trabajador_factura')->num_rows();
    if ($cantidad == 0):
        $data = array(
            'trabajador_ruttrabajador' => $idfactura,
            'factura_idfactura' => $ruttrabajador,);
        $this->db->insert('trabajador_factura', $data);
        return 0;
    else:
        return 1;
    endif;
}

//------------------ filtro tablas-----------------------

function cargarTablaTrabajadores() {
    //Consulta a la base de datos añade tabla 
    $this->db->select('*');
    return $this->db->get('trabajador');
}

function cargarTablaClientes() {
    //Consulta a la base de datos añade tabla 
    $this->db->select('*');
    return $this->db->get('cliente');
}

function cargarTablaMateriales() {
    //Consulta a la base de datos añade tabla 
    $this->db->select('*');
    return $this->db->get('material');
}



?>

