<?php if ($cantidad == 0): ?>
<?php else: ?>
    <table class="table">   
        <tr class="filters">
                    <th><input type="text" class="form-control" placeholder="ID MATERIAL" disabled></th>
                    <th><input type="text" class="form-control" placeholder="DESCRIPCION" disabled></th>
                    <th><input type="text" class="form-control" placeholder="CATEGORIA" disabled></th>
                </tr>
                <?php
        $i = 0;
        foreach ($resultado as $fila):
            ?>
            <tr>
                <td><?php echo $fila->idmaterial ?></td>
                <td><?php echo $fila->descripcion ?></td>
                <td><?php echo $fila->categoria_idcategoria ?></td>      
            </tr>
            <?php
            $i ++;
        endforeach;
        ?>
    </table>
<?php endif; ?>
<input type="hidden" id='oculto' value="<?php echo $i ?>"/>