<div class="container">
    <h2 class="btn btn-lg btn-primary btn-block">FACTURA</h2>
    <h2></h2>
    <div class="col-ms-12">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body form-horizontal payment-form">
                        <div class="form-group " >
                            <div class="col-sm-6">
                                <label for="concept" class="col-sm-3 control-label ">Folio *:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Ingrese un folio..."
                                           id="numeroFactura" name="numeroFactura" required="true">
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <label for="date" class="col-sm-3 control-label">Fecha de emsion *:</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="Fecha_ingresoFactura"
                                           name="Fecha_ingresoFactura" required="true">
                                </div>
                            </div>
                        </div>

                        <div class="form-group " >
                            <div class="col-sm-6">

                                <label for="concept" class="col-sm-3 control-label">Fecha de vencimiento *:</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="Fecha_vencimientoFactura"
                                           name="Fecha_vencimientoFactura" required="true" 
                                           placeholder="Ingrese una fecha de vencimiento...">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="status" class="col-sm-3 control-label">Proveedor *:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="proveedorFactura" name="proveedorFactura">
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="status" class="col-sm-3 control-label">Cliente *:</label>
                                <div class="col-sm-9" >
                                    <select class="form-control" id="clienteFactura" name="clienteFactura">
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="status" class="col-sm-3 control-label">Sucursal *:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="SucursalFactura" 
                                            name="SucursalFactura" required="true">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="status" class="col-sm-3 control-label">Usuario *:</label>
                                <div class="col-sm-9" id="usuarioFactura">
                                    <input type="text" class="form-control" id="Fecha_vencimientoFactura"
                                           name="Fecha_vencimientoFactura" required="true"disabled="true">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <p class= "help-block">* Campos Obligatorios</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- inicio menu add factura-->
<div class="container">
    <div class="col-sm-5">
        <h4>DATOS FACTURA</h4>
        <div class="panel panel-default" >
            <div class="panel-body form-horizontal payment-form" name="formulario">
                <div class="form-group">
                    <label for="concept" class="col-sm-3 control-label">Codigo material *:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="codProducto" name="codProducto">
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-3 control-label">Material *:</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="producto" name="producto">>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="cantidad" class="col-sm-3 control-label">Cantidad *:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="cantidad" name="cantidad">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="date" class="col-sm-3 control-label">valor *:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="valor" name="valor">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="date" class="col-sm-3 control-label">Total</label>
                    <div class="col-sm-9">
                        <strong><span class="preview-cant" id="total" name="total"></span></strong>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-default preview-add-button">
                            <span class="glyphicon glyphicon-plus"></span> AGREGAR
                        </button>
                    </div>
                </div>
            </div>
        </div>            
    </div> <!-- / fin menu -->

    <!--        inicio lista-->
    <div class="col-sm-7">
        <h4>Facturas:</h4>
        <div class="row">
            <div class="col-ms-12">
                <div class="table-responsive">
                    <table class="table preview-table">
                        <thead>
                            <tr>
                                <th>Cod. Material</th>
                                <th>Material</th>
                                <th>Cantidad</th>
                                <th>Valor</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody></tbody> <!-- mostrar tabla-->
                    </table>
                </div>                            
            </div>
        </div>
        <div class="row text-right">
            <div class="col-xs-12">
                <h4>Sub Total: <strong><span class="preview-total"></span></strong></h4>
                <h4>IVA (19%): <strong><span class="preview-iva"></span></strong></h4>
                <h4>Total: <strong><span class=""></span></strong></h4>
                <h4>Total: <strong><span class="preview-cant"></span></strong></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <hr style="border:1px dashed #dddddd;">
                <button type="button" class="btn btn-primary btn-block">GUARDAR Y FINALIZAR</button>
            </div>                
        </div>
    </div>
</div>