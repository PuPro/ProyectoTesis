<div class="factura">
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
                                    <label for="concept" class="col-sm-3 control-label">Proveedor *:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="proveedorFactura" name="proveedorFactura">
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">

                                    <label for="concept" class="col-sm-3 control-label">Cliente *:</label>
                                    <div class="col-sm-9" >
                                        <select class="form-control" id="clienteFactura" 
                                                name="clienteFactura" required="true">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="concept" class="col-sm-3 control-label">Sucursal *:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="SucursalFactura" 
                                                name="SucursalFactura" required="true">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="concept" class="col-sm-3 control-label">Usuario *:</label>
                                    <div class="col-sm-9" id="rutusuario">
                                        <input type="text" class="form-control" 
                                               value="<?php echo $this->session->userdata('usuario'); ?>" id="rutusuario"
                                               name="usuario" required="true" disabled="true">
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <label for="concept" class="col-sm-3 control-label">Trabajador *:</label>
                                    <div class="col-sm-9" >
                                        <select class="form-control" id="TrabajadorFactura" 
                                                name="TrabajadorFactura" required="true"></select>
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
                            <input type="text" class="form-control" id="codMaterial" name="codMaterial">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="concept" class="col-sm-3 control-label">Material *:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="MaterialFactura" 
                                    name="MaterialFactura" required="true">
                            </select>                        
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="number" class="col-sm-3 control-label">Cantidad *:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="cantidad" name="cantidad">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="number" class="col-sm-3 control-label">valor *:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="valor" name="valor">
                        </div>
                    </div> 

                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-default preview-add-button" id="btnAgregarFactura">
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
                    <h4>Sub Total: <strong><span class="preview-totalTempotal"></span></strong></h4>
                    <h4>IVA (19%): <strong><span class="preview-cantTemporal"></span></strong></h4>
                    <h4>Total: <strong><span class=""></span></strong></h4> 
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <hr style="border:1px dashed #dddddd;">
                    <button id="btnFinalizarFactura" type="submit" class="btn btn-primary btn-block">GUARDAR Y FINALIZAR</button>
                </div>                
            </div>
        </div>
    </div>
</div>