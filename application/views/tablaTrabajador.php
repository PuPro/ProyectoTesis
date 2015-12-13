<tr class="filters">
    <th><input type="text" class="form-control" placeholder="Rut" disabled></th>
    <th><input type="text" class="form-control" placeholder="Nombres" disabled></th>
    <th><input type="text" class="form-control" placeholder="Apellidos" disabled></th>
    <th><input type="text" class="form-control" placeholder="Direccion" disabled></th>
    <th><input type="text" class="form-control" placeholder="Telefono" disabled></th>
    <th><input type="text" class="form-control" placeholder="Fecha ingreso" disabled></th>
    <th><input type="text" class="form-control" placeholder="Estado" disabled></th>
    <th><input type="text" class="form-control" placeholder="Cargo" disabled></th>
    <th><input type="text" class="form-control" placeholder="Sucursal" disabled></th>
</tr>
<?php foreach ($datos as $fila): ?>
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


