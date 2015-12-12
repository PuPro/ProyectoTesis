<?php

class modelo extends CI_Model {

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

}
?>

