$(document).ready(function () {
    validaLogin();
    $("#modalMensaje").dialog({
        autoOpen: false,
        modal: true,
        buttons: {
            "Cerrar": function () {
                $(this).dialog("close");
            }
        }
    });


    /*---Filtro---*/
    $('.filterable .btn-filter').click(function () {
        var $panel = $(this).parents('.filterable'),
                $filters = $panel.find('.filters input'),
                $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function (e) {
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9')
            return;
        /* Useful DOM data and selectors */
        var $input = $(this),
                inputContent = $input.val().toLowerCase(),
                $panel = $input.parents('.filterable'),
                column = $panel.find('.filters th').index($input.parents('th')),
                $table = $panel.find('.table'),
                $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function () {
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table.find('.filters th').length + '">No result found</td></tr>'));
        }
    });

});


//Carga el combobox cargo
function cargaCargo() {
    //llama a la funcion que se encuentra el el welcome
    $.post(base_url + "Welcome/CargaCargo",
            {},
            function (ruta, datos) {
                //Se cargan los datos que vienen de cargarCargo del welcome
                $("#CargoTrabajador").html(ruta, datos);
            });
}

function cargaSucursal() {
    //llama a la funcion que se encuentra el el welcome
    $.post(base_url + "Welcome/cargaSucursal",
            {},
            function (ruta, datos) {
                //Se cargan los datos que vienen de cargarCargo del welcome
                $("#SucursalTrabajador").html(ruta, datos);
            });
}

//Carga login al contenido
function validaLogin() {
    $.post(
            base_url + "Welcome/validaLogin",
            {},
            function (pagina, datos) {
                //Carga archivos de respuestas que provengan de validaLogin
                $("#content").html(pagina, datos);

                $(".menuUsuario").hide();
                $(".menuUsuario").fadeIn(1000).delay(1000);

                $(".menuAdministrador").hide();
                $(".menuAdministrador").fadeIn(1000).delay(1000);

                $("#btnIniciar").button().click(function () {
                    //Se llama  a la funcion login
                    botonLogin();
                });
                $("#btn_salir").click(function () {
                    salir();
                });
            });
}

function botonLogin() {
    $.post(
            base_url + "Welcome/login",
            {
                usuario: $("#Username").val(),
                contraseña: $("#Password").val()
            },
    function (datos) {
        if (datos.mensaje != "") {
            $("#mensajeLogin").html("<p class='msjError'>" + datos.mensaje + "</p>").fadeIn(100).delay(600).fadeOut(1000);
        } else {
            validaLogin();
        }
    }, 'json'
            );
}

//cargar vistas en menu usuario
function trabajador() {

    $.post(
            base_url + "Welcome/VistaTrabajador",
            {},
            function (pagina) {
                //Carga de combobox
                cargaCargo();
                cargaSucursal();
                tablaTrabajador();
                //Carga archivos de respuestas que provengan de validaLogin
                $(".aplicacion").hide();
                $(".aplicacion").fadeIn(1000).delay(1000);
                $(".aplicacion").html(pagina);
                $("#btnagregarTrabajador").button().click(function () {
                    btnaagregartrabajador();
                });
            });
}

function btnaagregartrabajador() {
    //Se almacenan los datos en las variables declaradas.
    //con el .val() se obtiene el valor del los input
    var Rut = $("#RutTrabajador").val();
    var Nombres = $("#NombresTrabajador").val();
    var Apellidos = $("#ApellidosTrabajador").val();
    var Telefono = $("#TelefonoTrabajador").val();
    var Direccion = $("#DireccionTrabajador").val();
    var FechaIngreso = $("#Fecha_ingresoTrabajador").val();
    var Estado = $("#EstadoTrabajador").val();
    var Cargo = $("#CargoTrabajador").val();
    var Sucursal = $("#SucursalTrabajador").val();
    var mensaje = "<strong id='tituloError'>Error:</strong> <br>";
    var error = 0;

    $("#RutTrabajador").focus();

//validacion de campos vacios
    if (Rut == "") {
        mensaje += "Rut no valido.<br>";
        error++;
    }

    if (Nombres == "") {
        mensaje += "Nombre(s) no valido.<br>";
        error++;
    }

    if (Apellidos == "") {
        mensaje += "Apellido(s) no valido.<br>";
        error++;
    }

    if (Telefono == "") {
        mensaje += "Teléfono no valido.<br>";
        error++;
    }

    if (Direccion == "") {
        mensaje += "Direccion no valida.<br>";
        error++;
    }

    if (FechaIngreso == "") {
        mensaje += "Fecha de ingreso no valida.<br>";
        error++;
    }

    if (Estado == "") {
        mensaje += "Estado no valido.<br>";
        error++;
    }

    if (Cargo == "") {
        mensaje += "Cargo no valido.<br>";
        error++;
    }

    if (Sucursal == "") {
        mensaje += "Sucursal no valida.<br>";
        error++;
    }

    if (error != 0) {
        $("#modalMensaje").html("<p class='msjError'>" + mensaje + "</p>");
        $("#modalMensaje").dialog("open");
    } else {

        $.post(base_url + "welcome/btnuevotrabajador",
                {
                    //Variable de color verde es como se debe recibier en el archivo php(funcion btnaagregartrabajador)
                    //Variable de color negra Es el valor capturado
                    Rut: Rut,
                    Nombres: Nombres,
                    Apellidos: Apellidos,
                    Telefono: Telefono,
                    Direccion: Direccion,
                    FechaIngreso: FechaIngreso,
                    Estado: Estado,
                    Cargo: Cargo,
                    Sucursal: Sucursal
                },
        function (datos) {
            if (datos.valor == 1) {
                $("#modalMensaje").html("<p class='msjError'>Trabajador ya existente</p>");
            } else {
                $("#modalMensaje").html("<p class='msjOk'>Trabajador agregado correctamente</p>");
                trabajador();
            }
            $("#modalMensaje").dialog("open");
        }, 'json'//Formato en el que se enviaran los datos
                );
    }
}


function cliente() {

    $.post(
            base_url + "Welcome/VistaCliente",
            {},
            function (pagina) {
                CargaRegion();
                cargaSucursalCliente();
                CargaComuna();
                //Carga archivos de respuestas que provengan de validaLogin
                $(".aplicacion").hide();
                $(".aplicacion").fadeIn(1000).delay(1000);
                $(".aplicacion").html(pagina);
            });
}

function factura() {

    $.post(
            base_url + "Welcome/vistaFactura",
            {},
            function (pagina) {
                cargaCliente();
                cargaSucursalFactura();
                cargaProveedorfactura();
                cargaMaterial();
                //Carga archivos de respuestas que provengan de validaLogin
                $(".aplicacion").hide();
                $(".aplicacion").fadeIn(1000).delay(1000);
                $(".aplicacion").html(pagina);
            });
}

function material() {

    $.post(
            base_url + "Welcome/vistaMaterial",
            {},
            function (pagina) {
                //Carga archivos de respuestas que provengan de validaLogin
                $(".aplicacion").hide();
                $(".aplicacion").fadeIn(1000).delay(1000);
                $(".aplicacion").html(pagina);
            });
}
function flujoCaja() {

    $.post(
            base_url + "Welcome/vistaFlujoCaja",
            {},
            function (pagina) {
                cargaSucursalFlujoCaja();
                cargaItem();
                //Carga archivos de respuestas que provengan de validaLogin
                $(".aplicacion").hide();
                $(".aplicacion").fadeIn(1000).delay(1000);
                $(".aplicacion").html(pagina);
            });
}
function perIngreso() {

    $.post(
            base_url + "Welcome/vistaPerIngreso",
            {},
            function (pagina) {
                //Carga archivos de respuestas que provengan de validaLogin
                $(".aplicacion").hide();
                $(".aplicacion").fadeIn(1000).delay(1000);
                $(".aplicacion").html(pagina);
            });
}
function perEgreso() {

    $.post(
            base_url + "Welcome/vistaPerEgreso",
            {},
            function (pagina) {
                //Carga archivos de respuestas que provengan de validaLogin
                $(".aplicacion").hide();
                $(".aplicacion").fadeIn(1000).delay(1000);
                $(".aplicacion").html(pagina);
            });
}
function comparacion() {

    $.post(
            base_url + "Welcome/vistaComparacion",
            {},
            function (pagina) {
                //Carga archivos de respuestas que provengan de validaLogin
                $(".aplicacion").hide();
                $(".aplicacion").fadeIn(1000).delay(1000);
                $(".aplicacion").html(pagina);
            });
}
//vistas menu admin

function usuario() {

    $.post(
            base_url + "Welcome/vistaUsuario",
            {},
            function (pagina) {
                cargaSucursalUsuarios();
                cargaCargoUsuarios()
                //Carga archivos de respuestas que provengan de validaLogin
                $(".aplicacion").hide();
                $(".aplicacion").fadeIn(1000).delay(1000);
                $(".aplicacion").html(pagina);
            });
}
function Empresa() {

    $.post(
            base_url + "Welcome/vistaEmpresa",
            {},
            function (pagina) {
                //Carga archivos de respuestas que provengan de validaLogin
                $(".aplicacion").hide();
                $(".aplicacion").fadeIn(1000).delay(1000);
                $(".aplicacion").html(pagina);
            });
}
function salir() {
    $.post(
            base_url + "Welcome/salir", {},
            function () {
                validaLogin();
            }
    );


}

//-----------------facturas------------------------------


//-----------------cmbox clientes------------------------------
function CargaRegion() {
    //llama a la funcion que se encuentra el el welcome
    $.post(base_url + "Welcome/CargaRegion",
            {},
            function (ruta, datos) {
                //Se cargan los datos que vienen de cargarCargo del welcome
                $("#RegionCliente").html(ruta, datos);
            });

}
function cargaSucursalCliente() {
    //llama a la funcion que se encuentra el el welcome
    $.post(base_url + "Welcome/cargaSucursalCliente",
            {},
            function (ruta, datos) {
                //Se cargan los datos que vienen de cargarCargo del welcome
                $("#SucursalCliente").html(ruta, datos);
            });

}
function CargaComuna() {
    //llama a la funcion que se encuentra el el welcome
    $.post(base_url + "Welcome/CargaComuna",
            {},
            function (ruta, datos) {
                //Se cargan los datos que vienen de cargarCargo del welcome
                $("#ComunaCliente").html(ruta, datos);
            });

}

//-----------------cmbox facturas------------------------------

function cargaCliente() {
    //llama a la funcion que se encuentra el el welcome
    $.post(base_url + "Welcome/cargaCliente",
            {},
            function (ruta, datos) {
                //Se cargan los datos que vienen de cargarCargo del welcome
                $("#clienteFactura").html(ruta, datos);
            });


}


function cargaSucursalFactura() {
    //llama a la funcion que se encuentra el el welcome
    $.post(base_url + "Welcome/cargaSucursalFactura",
            {},
            function (ruta, datos) {
                //Se cargan los datos que vienen de cargarCargo del welcome
                $("#SucursalFactura").html(ruta, datos);
            });
}
function cargaProveedorfactura() {
    //llama a la funcion que se encuentra el el welcome
    $.post(base_url + "Welcome/cargaProveedorfactura",
            {},
            function (ruta, datos) {
                //Se cargan los datos que vienen de cargarCargo del welcome
                $("#proveedorFactura").html(ruta, datos);
            });
}
function cargaMaterial() {
    //llama a la funcion que se encuentra el el welcome
    $.post(base_url + "Welcome/cargaMaterial",
            {},
            function (ruta, datos) {
                //Se cargan los datos que vienen de cargarCargo del welcome
                $("#MaterialFactura").html(ruta, datos);
            });
}
//   ----------------cmbox flujo caja-----------------
function cargaSucursalFlujoCaja() {
    //llama a la funcion que se encuentra el el welcome
    $.post(base_url + "Welcome/cargaSucursalFlujoCaja",
            {},
            function (ruta, datos) {
                //Se cargan los datos que vienen de cargarCargo del welcome
                $("#SucursalFlujo").html(ruta, datos);
            });
}
function cargaItem() {
    //llama a la funcion que se encuentra el el welcome
    $.post(base_url + "Welcome/cargaItem",
            {},
            function (ruta, datos) {
                //Se cargan los datos que vienen de cargarCargo del welcome
                $("#ITEMFlujo").html(ruta, datos);
            });
}

//   --------------cmbox admin------------------------

function cargaSucursalUsuarios() {
    //llama a la funcion que se encuentra el el welcome
    $.post(base_url + "Welcome/cargaSucursalUsuarios",
            {},
            function (ruta, datos) {
                //Se cargan los datos que vienen de cargarCargo del welcome
                $("#SucursalUsuario").html(ruta, datos);
            });
}
function cargaCargoUsuarios() {
    //llama a la funcion que se encuentra el el welcome
    $.post(base_url + "Welcome/cargaCargoUsuarios",
            {},
            function (ruta, datos) {
                //Se cargan los datos que vienen de cargarCargo del welcome
                $("#CargoUsuario").html(ruta, datos);
            });
}


//-----------tabla trabajador------------------
function tablaTrabajador() {
    //llama a la funcion que se encuentra el el welcome
    $.post(base_url + "Welcome/tablaTrabajador",
            {},
            function (ruta, datos) {
                //Se cargan los datos que vienen de cargarCargo del welcome
                $("#tablaTrabajador").html(ruta, datos);
            });
}