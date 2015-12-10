$(document).ready(function () {
    
    $("#btnLoguin").button().click(function (){
        $("#menu").show();
    });
    cargaCargo();
    cargaSucursal();
    $("#btnnuevoTrabajador").button().click(function () {
        btnuevotrabajador()
    });
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

});


function btnuevotrabajador() {
    $("#RutTrabajador").attr("readonly", false);
    $("#NombresTrabajador").attr("readonly", false);
    $("#ApellidosTrabajador").attr("readonly", false);
    $("#TelefonoTrabajador").attr("readonly", false);
    $("#DireccionTrabajador").attr("readonly", false);
    $("#Fecha_ingresoTrabajador").attr("readonly", false);
    $("#EstadoTrabajador").attr("disabled", false);
    $("#CargoTrabajador").attr("disabled", false);
    $("#SucursalTrabajador").attr("disabled", false);
    $("#btnagregarTrabajador").button("disabled", false);
    $("#btnnuevoTrabajador").button("disabled");
}

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

function camposTrabajador() {



    $("#RutTrabajador").focus();

    if ($("#RutTrabajador").val() == "") {

        $("#mensajeTrabajador").show();

        ("#RutTrabajador").focus();
        return;
    }


    //Se limpian los campos
//    $("#RutTrabajador").val("");
//    $("#NombresTrabajador").val("");
//    $("#ApellidosTrabajador").val("");
//    $("#TelefonoTrabajador").val("");
//    $("#DireccionTrabajador").val("");
//    $("#Fecha_ingresoTrabajador").val("");
//    $("#EstadoTrabajador").val("0");
//    $("#CargoTrabajador").val("0");
//    $("#SucursalTrabajador").val("0");
//    
//    //Se deshabilitan los campos
//    $("#btnagregar").button(":disabled");
//    $("#RutTrabajador").attr("readonly", true);
//    $("#NombresTrabajador").attr("readonly", true);
//    $("#ApellidosTrabajador").attr("readonly", true);
//    $("#TelefonoTrabajador").attr("readonly", true);
//    $("#DireccionTrabajador").attr("readonly", true);
//    $("#Fecha_ingresoTrabajador").attr("readonly", true);
//    $("#EstadoTrabajador").attr("disabled", true);
//    $("#CargoTrabajador").attr("disabled", true);
}


