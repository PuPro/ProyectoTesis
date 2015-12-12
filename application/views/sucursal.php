<option value="">Seleccione sucursal...</option>
<?php foreach($sucursal as $fila): ?>
<option value=<?= $fila->rutempresa?>><?= $fila->nombre; ?></option>
<?php endforeach; ?>

