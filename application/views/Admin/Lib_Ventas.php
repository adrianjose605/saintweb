<div style="position: relative;"  ng-controller="Lib" layout="column" flex id="content" >
	 <label>Libro de Venta por Sucursal</label>
<form name="libro" method="post" action="<?=base_url()?>Pdfs/generar" target="_blank" />
<table align="center">

	  
    <tr>
        <td>
       
       
           <md-select md-on-open="cargarSucursal()" name="provincia" id="provincia"  placeholder="Sucursal" ng-model="lib.CodSucu" required>      
                <md-option ng-repeat="tcon in sucursal_t" ng-value="tcon.id">{{tcon.Descrip}}</md-option>
            </md-select>
            <div class="errors" ng-messages="libro.lib.$error" ng-if="libro.$dirty">
        <div ng-message="required">Required</div>
      </div>
	       
        <!--  <select name="provincia" id="provincia">
    <option value="">Selecciona tu provincía</option>
    <?php
    //foreach($provincias as $fila)
    {
    ?>
    <//option value=<?//=$fila->id?>> <?//=$fila->provincia?><///option>
    <?php
}
    ?>
    	</select>-->
    	
        </td>
    </tr>
    <tr>
    <td align="center" colspan="7">
    <hr />
             

        <div class="form-group">    
                <md-button id="generar" class="md-raised md-primary" type="submit" data-target="libro">Generar </md-button>
       </div>
       </td>
    </tr>
</table>
</form>

</div>

<script src="<?php echo base_url(); ?>public/js/Administrador/Lib_Ventas.js"></script>