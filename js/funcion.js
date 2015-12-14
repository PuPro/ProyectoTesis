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
                $("#btnagregarCliente").button().click(function () {
                    btnaagregarcliente();
                });


            });
}

function btnaagregarcliente() {
    //Se almacenan los datos en las variables declaradas.
    //con el .val() se obtiene el valor del los input
    var Rut = $("#RutCliente").val();
    var Nombres = $("#NombreCliente").val();
    var Apellidos = $("#ApellidoCliente").val();
    var Telefono = $("#TelefonoCliente").val();
    var FechaIngreso = $("#Fecha_ingresoCliente").val();
    var Direccion = $("#DireccionCliente").val();
    var Comuna = $("#ComunaCliente").val();
    var Sucursal = $("#SucursalCliente").val();
    var mensaje = "<strong id='tituloError'>Error:</strong> <br>";
    var error = 0;

    $("#RutCliente").focus();

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

    if (FechaIngreso == "") {
        mensaje += "Fecha Ingreso no valida.<br>";
        error++;
    }

    if (Direccion == "") {
        mensaje += "Direccion no valida.<br>";
        error++;
    }

    if (Comuna == "") {
        mensaje += "Comuna no valido.<br>";
        error++;
    }

    if (Sucursal == "") {
        mensaje += "Sucursal no valido.<br>";
        error++;
    }

    if (error != 0) {
        $("#modalMensaje").html("<p class='msjError'>" + mensaje + "</p>");
        $("#modalMensaje").dialog("open");
    } else {

        $.post(base_url + "welcome/btnuevocliente",
                {
                    //Variable de color verde es como se debe recibier en el archivo php(funcion btnaagregartrabajador)
                    //Variable de color negra Es el valor capturado
                    Rut: Rut,
                    Nombres: Nombres,
                    Apellidos: Apellidos,
                    Telefono: Telefono,
                    FechaIngreso: FechaIngreso,
                    Direccion: Direccion,
                    Comuna: Comuna,
                    Sucursal: Sucursal
                },
        function (datos) {
            if (datos.valor == 1) {
                $("#modalMensaje").html("<p class='msjError'>Cliente ya existente</p>");
            } else {
                $("#modalMensaje").html("<p class='msjOk'>Cliente agregado correctamente</p>");
                cliente();
            }
            $("#modalMensaje").dialog("open");
        }, 'json'//Formato en el que se enviaran los datos
                );
    }
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
                $("#btnAgregarFactura").button().click(function () {
                    btnAgregarDetallefactura();
                });
                $("#btnFinalizarFactura").button().click(function () {
                    btnAgregarFactura();
                });
            });
}
function btnAgregarDetallefactura() {

    $("#codMaterial").focus();
    //Se almacenan los datos en las variables declaradas.
    //con el .val() se obtiene el valor del los input
    var codMaterial = $("#codMaterial").val();
    var material = $("#MaterialFactura").val();
    var cantidad = $("#cantidad").val();
    var valor = $("#valor").val();
    var mensaje = "<strong id='tituloError'>Error:</strong> <br>";
    var error = 0;

//validacion de campos vacios
    if (codMaterial == "") {
        mensaje += "Código de material no valido.<br>";
        error++;
    }
    if (material == "") {
        mensaje += "material no valido.<br>";
        error++;
    }
    if (cantidad == "" || parseInt(cantidad) <= 0 || isNumeric(cantidad) == false) {
        mensaje += "Cantiad no valida.<br>";
        error++;
    }
    if (valor == "" || parseInt(valor) <= 0 || isNumeric(valor) == false) {
        mensaje += "valor no valido.<br>";
        error++;
    }
    if (error != 0) {
        $("#modalMensaje").html("<p class='msjError'>" + mensaje + "</p>");
        $("#modalMensaje").dialog("open");
    } else {

        $(document).on('click', '.input-remove-row', function () {
            var tr = $(this).closest('tr');
            tr.fadeOut(200, function () {
                tr.remove();
                calc_total();

            });
        });

        var form_data = {};
        form_data["codMaterial"] = $('.payment-form input[name="codMaterial"]').val();
        form_data["materialFactura"] = $('.payment-form #MaterialFactura option:selected').val();
        form_data["cantidad"] = parseFloat($('.payment-form input[name="cantidad"]').val());
        form_data["valor"] = parseFloat($('.payment-form input[name="valor"]').val());
        form_data["total"] = retornoValor();
        form_data["remove-row"] = '<span class="glyphicon glyphicon-remove"></span>';
        var row = $('<tr></tr>');
        $.each(form_data, function (type, value) {
            $('<td class="input-' + type + '"></td>').html(value).appendTo(row);
        });
        $('.preview-table > tbody:last').append(row);
        calc_total();
        cantidades();
    }
}

function isNumeric(numero) {
    return !isNaN(numero) && isFinite(numero);
}
function btnaAgregarfactura() {
    //Se almacenan los datos en las variables declaradas.
    //con el .val() se obtiene el valor del los input
    var NumeroFactura = $("#numeroFactura").val();
    var FechaIngreso = $("#Fecha_ingresoFactura").val();
    var FechaVencimiento = $("#Fecha_vencimientoFactura").val();
    var Neto = $("#valorneto").val();
    var Total = $("#valortotal").val();
    var Iva = $("iva").val();
    var Cliente = $("#clienteFactura").val();
    var Sucursal = $("#SucursalFactura").val();
    var RutUsuario = $("#rutusuario").val();
    var Proveedor = $("#proveedorFactura").val();
    var mensaje = "<strong id='tituloError'>Error:</strong> <br>";
    var error = 0;

    $("#numeroFactura").focus();

//validacion de campos vacios
    if (NumeroFactura == "") {
        mensaje += "Numero Factura no valido.<br>";
        error++;
    }

    if (FechaIngreso == "") {
        mensaje += "Fecha Ingreso no valido.<br>";
        error++;
    }

    if (FechaVencimiento == "") {
        mensaje += "Fecha Vencimiento no valido.<br>";
        error++;
    }

    if (Neto == "") {
        mensaje += "Neto no valido.<br>";
        error++;
    }

    if (Total == "") {
        mensaje += "Total no valida.<br>";
        error++;
    }

    if (Iva == "") {
        mensaje += "Iva no valida.<br>";
        error++;
    }

    if (Cliente == "") {
        mensaje += "Cliente no valido.<br>";
        error++;
    }

    if (Sucursal == "") {
        mensaje += "Sucursal no valido.<br>";
        error++;
    }
    if (RutUsuario == "") {
        mensaje += "Rut Usuario no valido.<br>";
        error++;
    }
    if (Proveedor == "") {
        mensaje += "Proveedor no valido.<br>";
        error++;
    }

    if (error != 0) {
        $("#modalMensaje").html("<p class='msjError'>" + mensaje + "</p>");
        $("#modalMensaje").dialog("open");
    } else {

        $.post(base_url + "welcome/btnuevofactura",
                {
                    //Variable de color verde es como se debe recibier en el archivo php(funcion btnaagregartrabajador)
                    //Variable de color negra Es el valor capturado

                    NumeroFactura: NumeroFactura,
                    FechaIngreso: FechaIngreso,
                    FechaVencimiento: FechaVencimiento,
                    Neto: Neto,
                    Total: Total,
                    Iva: Iva,
                    Cliente: Cliente,
                    Sucursal: Sucursal,
                    RutUsuario: RutUsuario,
                    Proveedor: Proveedor
                },
        function (datos) {
            if (datos.valor == 1) {
                $("#modalMensaje").html("<p class='msjError'>Factura ya existente</p>");
            } else {
                $("#modalMensaje").html("<p class='msjOk'>Factura agregado correctamente</p>");
                factura();
            }
            $("#modalMensaje").dialog("open");
        }, 'json'//Formato en el que se enviaran los datos
                );
    }
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
                $("#btnagregarFlujoCaja").button().click(function () {
                    btnaagregarflujocaja();
                });
            });
}

function btnaagregarflujocaja() {
    //Se almacenan los datos en las variables declaradas.
    //con el .val() se obtiene el valor del los input
    var FechaIngreso = $("#Fecha_ingresoFlujor").val();
    var ItemFlujo = $("#ITEMFlujo").val();
    var Sucursal = $("#SucursalFlujo").val();
    var Monto = $("#MontoTotalFlujo").val();
    var Descripcion = $("#DescripcionFlujo").val();
    var mensaje = "<strong id='tituloError'>Error:</strong> <br>";
    var error = 0;

    $("#Fecha_ingresoFlujor").focus();

//validacion de campos vacios
    if (FechaIngreso == "") {
        mensaje += "Fecha Ingreso no valido.<br>";
        error++;
    }

    if (ItemFlujo == "") {
        mensaje += "Item no valido.<br>";
        error++;
    }

    if (Sucursal == "") {
        mensaje += "Sucursal no valido.<br>";
        error++;
    }

    if (Monto == "") {
        mensaje += "Monto no valido.<br>";
        error++;
    }

    if (Descripcion == "") {
        mensaje += "Descripcion no valida.<br>";
        error++;
    }


    if (error != 0) {
        $("#modalMensaje").html("<p class='msjError'>" + mensaje + "</p>");
        $("#modalMensaje").dialog("open");
    } else {

        $.post(base_url + "welcome/btnuevoflujocaja",
                {
                    //Variable de color verde es como se debe recibier en el archivo php(funcion btnaagregartrabajador)
                    //Variable de color negra Es el valor capturado
                    FechaIngreso: FechaIngreso,
                    ItemFlujo: ItemFlujo,
                    Sucursal: Sucursal,
                    Monto: Monto,
                    Descripcion: Descripcion,
                },
                function (datos) {
                    if (datos.valor == 1) {
                        $("#modalMensaje").html("<p class='msjError'>ID flujo caja ya existente</p>");
                    } else {
                        $("#modalMensaje").html("<p class='msjOk'>flujo caja agregado correctamente</p>");
                        flujoCaja();
                    }
                    $("#modalMensaje").dialog("open");
                }, 'json'//Formato en el que se enviaran los datos
                );
    }
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
//---------vistas menu admin---------------

function usuario() {

    $.post(
            base_url + "Welcome/vistaUsuario",
            {},
            function (pagina) {
                cargaSucursalUsuarios();
                cargaRolUsuario();
                //Carga archivos de respuestas que provengan de validaLogin
                $(".aplicacion").hide();
                $(".aplicacion").fadeIn(1000).delay(1000);
                $(".aplicacion").html(pagina);
                $("#btnAgregarUsuario").button().click(function () {
                    btnaagregarusuario();
                });

            });
}

function btnaagregarusuario() {
    //Se almacenan los datos en las variables declaradas.
    //con el .val() se obtiene el valor del los input
    var RutUsuario = $("#RutUsuario").val();
    var NombresUsuario = $("#NombresUsuario").val();
    var ApellidosUsuario = $("#ApellidoUsuario").val();
    var Rol = $("#RolUsuario").val();
    var SucursalUsuario = $("#SucursalUsuario").val();
    var Contraseña = $("#contraseñaUsuario").val();
    var mensaje = "<strong id='tituloError'>Error:</strong> <br>";
    var error = 0;

    $("#RutUsuario").focus();

//validacion de campos vacios
    if (RutUsuario == "") {
        mensaje += "Rut Usuario no valido.<br>";
        error++;
    }

    if (NombresUsuario == "") {
        mensaje += "Nombre(s)Usuario no valido.<br>";
        error++;
    }

    if (ApellidosUsuario == "") {
        mensaje += "Apellido(s) Usuario no valido.<br>";
        error++;
    }

    if (Rol == "") {
        mensaje += "Rol no valido.<br>";
        error++;
    }

    if (SucursalUsuario == "") {
        mensaje += "Sucursal Usuario no valida.<br>";
        error++;
    }

    if (Contraseña == "") {
        mensaje += "Contraseña no valida.<br>";
        error++;
    }

    if (error != 0) {
        $("#modalMensaje").html("<p class='msjError'>" + mensaje + "</p>");
        $("#modalMensaje").dialog("open");
    } else {

        $.post(base_url + "Welcome/btnuevousuario",
                {
                    //Variable de color verde es como se debe recibier en el archivo php(funcion btnaagregartrabajador)
                    //Variable de color negra Es el valor capturado
                    RutUsuario: RutUsuario,
                    NombresUsuario: NombresUsuario,
                    ApellidosUsuario: ApellidosUsuario,
                    Rol: Rol,
                    SucursalUsuario: SucursalUsuario,
                    Contraseña: Contraseña,
                },
                function (datos) {
                    if (datos.valor == 1) {
                        $("#modalMensaje").html("<p class='msjError'>Usuario ya existente</p>");
                    } else {
                        $("#modalMensaje").html("<p class='msjOk'>Usuario agregado correctamente</p>");
                        usuario();
                    }
                    $("#modalMensaje").dialog("open");
                }, 'json'//Formato en el que se enviaran los datos
                );
    }
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
                $("#btnAgregarEmpresa").button().click(function () {
                    btnaagregarempresa();
                });
            });
}


function btnaagregarempresa() {
    //Se almacenan los datos en las variables declaradas.
    //con el .val() se obtiene el valor del los input
    var RutEmpresa = $("#RutEmpresa").val();
    var NombresEmpresa = $("#NombresEmpresa").val();
    var DireccionEmpresa = $("DireccionEmpresa").val();
    var TelefonoEmpresa = $("#TelefonoEmpresa").val();
    var CorreoElectronicoEmpresa = $("#CorreoElectronicoEmpresa").val();
    var mensaje = "<strong id='tituloError'>Error:</strong> <br>";
    var error = 0;

    $("#RutEmpresa").focus();

//validacion de campos vacios
    if (RutEmpresa == "") {
        mensaje += "Rut Empresa no valido.<br>";
        error++;
    }

    if (NombresEmpresa == "") {
        mensaje += "Nombre Empresa no valido.<br>";
        error++;
    }

    if (DireccionEmpresa == "") {
        mensaje += "Direccion Empresa no valido.<br>";
        error++;
    }

    if (TelefonoEmpresa == "") {
        mensaje += "Telefono Empresa no valido.<br>";
        error++;
    }

    if (CorreoElectronicoEmpresa == "") {
        mensaje += "E-mail no valida.<br>";
        error++;
    }


    if (error != 0) {
        $("#modalMensaje").html("<p class='msjError'>" + mensaje + "</p>");
        $("#modalMensaje").dialog("open");
    } else {

        $.post(base_url + "Welcome/btnuevoempresa",
                {
                    //Variable de color verde es como se debe recibier en el archivo php(funcion btnaagregartrabajador)
                    //Variable de color negra Es el valor capturado
                    RutEmpresa: RutEmpresa,
                    NombresEmpresa: NombresEmpresa,
                    DireccionEmpresa: DireccionEmpresa,
                    TelefonoEmpresa: TelefonoEmpresa,
                    CorreoElectronicoEmpresa: CorreoElectronicoEmpresa,
                },
                function (datos) {
                    if (datos.valor == 1) {
                        $("#modalMensaje").html("<p class='msjError'>Empresa ya existente</p>");
                    } else {
                        $("#modalMensaje").html("<p class='msjOk'>Empresa agregado correctamente</p>");
                        Empresa();
                    }
                    $("#modalMensaje").dialog("open");
                }, 'json'//Formato en el que se enviaran los datos
                );
    }
}

function salir() {
    $.post(
            base_url + "Welcome/salir", {},
            function () {
                validaLogin();
            }
    );


}



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
    $.post(base_url + "Welcome/CargaRol",
            {},
            function (ruta, datos) {
                //Se cargan los datos que vienen de cargarCargo del welcome
                $("#RolUsuario").html(ruta, datos);
            });
}

function cargaUsuario() {
    //llama a la funcion que se encuentra el el welcome
    $.post(base_url + "Welcome/CargaRol",
            {},
            function (ruta, datos) {
                //Se cargan los datos que vienen de cargarCargo del welcome
                $("#RolUsuario").html(ruta, datos);
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


//------------factura-------------------
function cantidades() {
    var cant = 0;
    $('.input-cantidad').each(function () {
        cant = parseFloat($(this).text());
    });
    var val = 0;
    $('.input-valor').each(function () {
        val = parseFloat($(this).text());
    });
    var tot = cant * val;
    $(".preview-cantTemporal").text(tot);
}

function retornoValor() {
    var cant = 0;
    $('.input-cantidad').each(function () {
        cant = parseFloat($(this).text());
    });
    var val = 0;
    $('.input-valor').each(function () {
        val = parseFloat($(this).text());
    });
    var tot = cant * val;
    $(".preview-cantTemporal").text(tot);
    var totalParcial= $(".preview-cantTemporal").text(tot);
    return totalParcial;
}

function calc_total() {
    var sum = 0;
    $('.input-total').each(function () {
        sum += parseFloat($(this).text());
    });
    $(".preview-totalTempotal").text(sum);
}




