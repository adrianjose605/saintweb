
<div style="position: relative;"  ng-controller="Lib">
<h2 style="text-align: center">Imprime tus localidades</h2>
<form method="post" action="<?=base_url()?>pdfs/generar" />
<table align="center">
    <tr>
        <td>
            <select name="provincia" id="provincia">
    <option value="">Selecciona tu provincía</option>
    <?php
    foreach($provincias as $fila)
    {
    ?>
    <option value=<?=$fila->id?>><?=$fila->provincia?></option>
    <?php
}
    ?>
    	</select>
        </td>
    </tr>
    <tr>
    <td align="center" colspan="7">
    <hr />
        <input type="submit" value="Crear PDF" title="Crear PDF" />
        </td>
    </tr>
</table>
</form>

</div><script src="<?php echo base_url(); ?>public/js/Administrador/Lib_Ventas.js"></script>

