<?php if ($cantidad == 0): ?>
    <div class="container">
        <h2 class="btn btn-lg btn-primary btn-block">No exiten registros</h2>
    </div>
<?php else: ?>
    <div class="container">
        <div class="col-sm-12 "> 
            <h2></h2>
            <div class="row">
                <div class="panel panel-primary filterable">
                    <div class="panel-heading">
                        <h3 class="panel-title">TRABAJADORES</h3>
                        <div class="pull-right">
                            <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> BUSCAR </button>
                        </div>
                    </div>
                    <table class="table">  
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="Rut" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Nombres" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Apellidos" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Telefono" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Direccion" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Fecha ingreso" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Estado" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Cargo" disabled></th>
                        </tr>
                        <?php foreach ($trabajador as $fila): ?>
                            <tr>
                                <td><?php $fila->ruttrabajador; ?></td>
                                <td><?php $fila->nombre; ?></td>
                                <td><?php $fila->apellido; ?></td>
                                <td><?php $fila->direccion; ?></td>
                                <td><?php $fila->telefono; ?></td>
                                <td><?php $fila->fecha_ingreso; ?></td>
                                <td><?php $fila->estado; ?></td>
                                <td><?php $fila->empresa_rutempresa; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>



