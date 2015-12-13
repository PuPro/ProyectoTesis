<option value="">Seleccione proveedor...</option>
<?php foreach($proveedor as $fila): ?>
<option value=<?= $fila->rutproveedor?>><?= $fila->descripcion; ?></option>
<?php endforeach; ?>


