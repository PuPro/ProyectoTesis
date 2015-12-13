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


