<div class="menuUsuario">
    <div class="opciones">
        <div class="bs-example">
            <ul class="nav nav-pills">
                <li class="active"><a href="#">INICIO</a></li>
                
                <!--onclik llama a la funcion trabajador que se 
                encuentran en el archivo funcion.js-->
                
                <li><a href="#" onclick="trabajador();" >TRABAJADOR</a></li>
                <li><a href="#" onclick="cliente();">CLIENTE</a></li>
                <li><a href="#" onclick="factura();">FACTURA</a></li>
                <li><a href="#" onclick="material();">LISTA MATERIALES</a></li>
                <li><a href="#" onclick="flujoCaja();">FLUJO DE CAJA</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">PER<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" onclick="perIngreso();">PER INGRESOS</a></li>
                        <li><a href="#" onclick="perEgreso();">PER EGRESOS</a></li>
                    </ul>
                </li>
                <li><a href="#" onclick="comparacion();">COMPARACION</a></li>
                <!--        cerrar sesion-->
                <li class="dropdown pull-right">
                    <a  href="" class="dropdown-toggle" id="btn_salir">CERRAR SESION</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="aplicacion">
    </div>
</div>