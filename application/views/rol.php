<option value="">Seleccione Rol...</option>
<?php foreach($rol as $fila): ?>
<option value=<?= $fila->idRol?>><?= $fila->descripcion; ?></option>
<?php endforeach; ?>