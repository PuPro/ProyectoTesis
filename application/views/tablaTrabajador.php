<?php if ($cantidad == 0): ?>
    <?php else: ?>
    <table class="table">   
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
        <?php $i = 0;
        foreach ($resultado as $fila):
            ?>
            <tr>
                <td><?php echo $fila->ruttrabajador ?></td>
                <td><?php echo $fila->nombre ?></td>
                <td><?php echo $fila->apellido ?></td>
                <td><?php echo $fila->direccion ?></td>
                <td><?php echo $fila->telefono ?></td>
                <td><?php echo $fila->fecha_ingreso ?></td>
                <td><?php echo $fila->estado ?></td>
                <td><?php echo $fila->cargo_idcargo ?></td>
                <td><?php echo $fila->empresa_rutempresa ?></td>
            </tr>
            <?php $i ++;
        endforeach;
        ?>
    </table>
<?php endif; ?>
<input type="hidden" id='oculto' value="<?php echo $i ?>"/>