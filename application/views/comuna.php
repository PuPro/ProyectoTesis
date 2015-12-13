<option value="">Seleccione comuna...</option>
<?php foreach($comuna as $fila): ?>
<option value=<?= $fila->idciudad?>><?= $fila->descripcion; ?></option>
<?php endforeach; ?>
