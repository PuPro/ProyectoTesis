<option value="">Seleccione trabajador...</option>
<?php foreach($trabajador as $fila): ?>
<option value=<?= $fila->ruttrabajador?>><?= $fila->nombre; ?></option>
<?php endforeach; ?>

