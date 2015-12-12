<option value="">Seleccione cliente...</option>
<?php foreach($facturaClientes as $fila): ?>
<option value=<?= $fila->rutcliente?>><?= $fila->nombre; ?></option>
<?php endforeach; ?>
