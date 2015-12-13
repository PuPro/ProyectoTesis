<option value="">Seleccione Item...</option>
<?php foreach($item as $fila): ?>
<option value=<?= $fila->iditem?>><?= $fila->descripcion; ?></option>
<?php endforeach; ?>

