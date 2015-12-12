<option value="">Seleccione cargo...</option>
<?php foreach($cargo as $fila): ?>
<option value=<?= $fila->idcargo?>><?= $fila->descripcion; ?></option>
<?php endforeach; ?>


