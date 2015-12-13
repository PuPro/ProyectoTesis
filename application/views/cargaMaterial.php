<option value="">Seleccione Material...</option>
<?php foreach($cargaMaterial as $fila): ?>
<option value=<?= $fila->idmaterial?>><?= $fila->descripcion; ?></option>
<?php endforeach; ?>

