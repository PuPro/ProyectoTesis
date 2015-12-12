$(document).ready(function () {

    //Carga de combobox
    cargaCargo();
    cargaSucursal();


    $("#btnagregarTrabajador").button().click(function () {
        btnaagregartrabajador()
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

    validaLogin();

});


function btnaagregartrabajador() {
    //estadoBotones();
//
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

    if (Rut.length == 0 || Nombres.length == 0 || Apellidos.length == 0 ||
            Telefono.length == 0 || Direccion.length == 0 || FechaIngreso.length == 0 ||
            Estado.length == 0 || Cargo == 0 || Sucursal == 0) {
        // alert("Faltan datos");
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
                alert("Trabajador ya existe");
            } else {
                alert("Trabajador agregado correctamente");
            }
        }, 'json'//Formato en el que se enviaran los datos
                );
    }
}

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
                $("#btnIniciar").button().click(function () {
                    //Se llama  a la funcion login
                    botonLogin();
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


function trabajador() {
    
    $.post(
            base_url + "Welcome/VistaTrabajador",
            {},
            function (pagina) {
                //Carga archivos de respuestas que provengan de validaLogin
                $(".aplicacion").hide();
                $(".aplicacion").fadeIn(1000).delay(1000);
                $(".aplicacion").html(pagina);
            });
}

function cliente() {
    
    $.post(
            base_url + "Welcome/VistaCliente",
            {},
            function (pagina) {
                //Carga archivos de respuestas que provengan de validaLogin
                $(".aplicacion").hide();
                $(".aplicacion").fadeIn(1000).delay(1000);
                $(".aplicacion").html(pagina);
            });
}

