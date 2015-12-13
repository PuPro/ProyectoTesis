<div id="trabajador" class="container">
    <h2 class="btn btn-lg btn-primary btn-block">TRABAJADORES</h2>
    <!-- inicio menu add Trabajador -->
    <h2></h2>
    <div class="col-sm-12">   
        <div class="panel panel-default" >
            <div class="panel-body form-horizontal payment-form" name="formulario">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="concept" class="col-sm-3 control-label">Rut *:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="RutTrabajador" name="RutTrabajador" 
                                   placeholder="Ingrese Rut..." required="true">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="date" class="col-sm-3 control-label">Nombre(s) *:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Ingrese nombre..."
                                   id="NombresTrabajador" name="NombresTrabajador" required="true">
                        </div>
                    </div>
                </div>                               
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="concept" class="col-sm-3 control-label">Apellido(s) *:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ApellidosTrabajador" 
                                   name="ApellidosTrabajador" 
                                   placeholder="Ingrese un apellido(s)..." required="true">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="concept" class="col-sm-3 control-label">Telefono :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="TelefonoTrabajador" 
                                   name="TelefonoTrabajador" 
                                   placeholder="Ingrese un teléfono..." required="true">
                        </div>
                    </div>
                </div>                                 
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="date" class="col-sm-3 control-label">Fecha de ingreso *:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" 
                                   id="Fecha_ingresoTrabajador" name="Fecha_ingresoTrabajador" required="true">
                        </div>
                    </div>        
                    <div class="col-sm-6">
                        <label for="concept" class="col-sm-3 control-label">Dirección *:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="DireccionTrabajador" 
                                   name="DireccionTrabajador" 
                                   placeholder="Ingrese una dirección..." required="true">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="status" class="col-sm-3 control-label">Estado *:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="EstadoTrabajador" name="EstadoTrabajador" required="true">
                                <option value="">Seleccione estado...</option>
                                <option>Activo</option>
                                <option>Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="status" class="col-sm-3 control-label">Cargo *:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="CargoTrabajador" 
                                    name="CargoTrabajador" required="true">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="status" class="col-sm-3 control-label">Sucursal *:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="SucursalTrabajador" 
                                    name="SucursalTrabajador" required="true">
                            </select>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-3">
                        <p class= "help-block">* Campos Obligatorios</p>
                    </div>
                    <div class="col-sm-9 text-right">
                        <button type="submit" id="btnagregarTrabajador" 
                                class="btn btn-default preview-add-button"><span class="glyphicon glyphicon-plus" ></span> AGREGAR
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div> <!-- / fin menu --> 

<div id="tablaTrabajador">
    

</div>