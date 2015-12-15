<div class="container">
    <h2 class="btn btn-lg btn-primary btn-block">CLIENTE</h2>
    <h2></h2>
    <div class="col-sm-12">   
        <div class="panel panel-default" >
            <div class="panel-body form-horizontal payment-form" name="formulario">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="concept" class="col-sm-3 control-label">Rut *:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="RutCliente" 
                                   name="RutCliente" 
                                   placeholder="Ingrese Rut..." required="true">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="concept" class="col-sm-3 control-label">Nombre(s) *:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Ingrese nombre..."
                                   id="NombreCliente" name="NombreCliente" required="true">
                        </div>
                    </div>
                </div>                               
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="concept" class="col-sm-3 control-label">Apellido(s) *:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ApellidoCliente" 
                                   name="ApellidoCliente" 
                                   placeholder="Ingrese un apellido(s)..." required="true">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="concept" class="col-sm-3 control-label">Telefono :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="TelefonoCliente" 
                                   name="TelefonoCliente" 
                                   placeholder="Ingrese un teléfono..." required="true">
                        </div>
                    </div>
                </div>                                 
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="date" class="col-sm-3 control-label">Fecha de ingreso *:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" 
                                   id="Fecha_ingresoCliente" name="Fecha_ingresoCliente" required="true">
                        </div>
                    </div>        
                    <div class="col-sm-6">
                        <label for="concept" class="col-sm-3 control-label">Dirección *:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="DireccionCliente" 
                                   name="DireccionCliente" 
                                   placeholder="Ingrese una dirección..." required="true">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="status" class="col-sm-3 control-label">Región *:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="RegionCliente" name="RegionCliente" 
                                    required="true">
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="status" class="col-sm-3 control-label">Comuna *:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="ComunaCliente" 
                                    name="ComunaCliente" required="true">
                            </select>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="status" class="col-sm-3 control-label">Sucursal *:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="SucursalCliente" 
                                    name="SucursalCliente" required="true">
                            </select>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-3">
                        <p class= "help-block">* Campos Obligatorios</p>
                    </div>
                    <div class="col-sm-9 text-right">
                        <button type="submit" id="btnagregarCliente" 
                                class="btn btn-default preview-add-button"><span class="glyphicon glyphicon-plus" ></span> AGREGAR
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div> 


<div class="container">
    <div class="col-sm-12 "> 
        <h2></h2>
        <!--busqueda-->
        <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">CLIENTES</h3>
                    <div class="pull-right">
                       
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> BUSCAR </button>
                    </div>
                </div>
                <div class="divCrud" id="divCrud">
                    
                </div>
            </div>
        </div>
    </div>


