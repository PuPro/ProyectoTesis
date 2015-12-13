<div class="container">
    <h2 class="btn btn-lg btn-primary btn-block">USUARIO</h2>
    <h2></h2>
    <div class="col-sm-12">
        <div class="panel panel-default" >
            <div class="panel-body form-horizontal payment-form" name="formulario">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="concept" class="col-sm-3 control-label">Rut *:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="RutUsuario" name="RutUsuario">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="concept" class="col-sm-3 control-label">Nombre(s) *:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="NombresUsuario" name="NombresUsuario">
                        </div>
                    </div>

                </div>
                <div class="form-group">  
                    <div class="col-sm-6">
                        <label for="concept" class="col-sm-3 control-label">Apellido(s) *:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ApellidoUsuario" name="ApellidoUsuario">
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <label for="status" class="col-sm-3 control-label">Rol *:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="RolUsuario" 
                                    name="RolUsuario" required="true">
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="status" class="col-sm-3 control-label">Sucursal *:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="SucursalUsuario" 
                                    name="SucursalUsuario" required="true">
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="concept" class="col-sm-3 control-label">Contraseña *:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="contraseñaUsuario" name="contraseñaUsuario">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-3">
                        <p class= "help-block">* Campos Obligatorios</p>
                    </div>
                    <div class="col-sm-9 text-right">
                        <button id="btnAgregarUsuario" type="submit" class="btn btn-default preview-add-button">
                            <span class="glyphicon glyphicon-plus"></span> AGREGAR
                        </button>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div