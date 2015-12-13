<div class="container">
    <h2 class="btn btn-lg btn-primary btn-block">FLUJO DE CAJA</h2>
    <h2></h2>
        <div class="col-sm-12">                            
            <div class="panel panel-default" >
                <div class="panel-body form-horizontal payment-form" name="formulario">
                    <div class="form-group" >
                        <div class="col-sm-6">
                            <label for="date" class="col-sm-3 control-label">Fecha *:</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" 
                                       id="Fecha_ingresoFlujo" name="Fecha_ingresoFlujor" required="true">
                            </div> 
                        </div>
                        <div class="col-sm-6">
                            <label for="status" class="col-sm-3 control-label">ITEM *:</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="ITEMFlujo" 
                                        name="ITEMFlujo" required="true">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="status" class="col-sm-3 control-label">Sucursal *:</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="SucursalFlujo" 
                                        name="SucursalFlujo" required="true">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="concept" class="col-sm-3 control-label">Monto Total *: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="MontoTotal Flujo" 
                                       name="MontoTotalFlujo" required="true" placeholder="Ingrese monto...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="concept" class="col-sm-3 control-label">Descripcion :</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" type="textarea" id="DescripcionFlujo" 
                                      placeholder="Ingrese descripcion..." name="DescripcionFlujo" 
                                      maxlength="" rows="10">
                            </textarea>
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class="col-sm-3">
                            <p class= "help-block">* Campos Obligatorios</p>
                        </div>
                        <div class="col-sm-9 text-right">
                            <button type="button" class="btn btn-default preview-add-button">
                                <span class="glyphicon glyphicon-plus"></span> AGREGAR
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>