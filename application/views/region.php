<option value="">Seleccione region...</option>
<?php foreach($region as $fila): ?>
<option value=<?= $fila->idregion?>><?= $fila->descripcion; ?></option>
<?php endforeach; ?>