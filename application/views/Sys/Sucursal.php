
  <div style="position: relative;" ng-controller="Suc" layout="column" flex id="content" >
    <div class="container" style="width:95%">
        <h1 >Sucursales</h1>

        <h3>Busqueda</h3>

            <form class="form-inline" name="formBusquedaSucursal" role="form" novalidate>
                <div class="form-group">
                    <md-input-container flex ng-class="md-primary">
                        <label class="">Descripcion</label>
                        <input ng-model="busqueda.query" name="query_busqueda" type="text">                
                    </md-input-container>            
                </div>

                <div class="form-group">
                    <md-switch ng-model="busqueda.estatus" ng-change="recargar()">
                        Solo Activos
                    </md-switch>
                </div>

                <div class="form-group">    
                    <md-button id="buscar" type="submit" class="md-raised md-primary" ng-click="recargar()">Buscar</md-button>
                </div>

                <div class="form-group">    
                    <md-button id="nuevo" class="md-raised md-primary" data-toggle="modal"  data-target="#nuevo_usuario">Nuevo </md-button>
                </div>
            
                
            </form>




            <div ng-show="contador != 0" tasty-table bind-resource-callback="getResourceS" bind-filters="paginador">
                <table class="table table-striped table-condensed" >
                    <thead tasty-thead bind-not-sort-by="notSortBy" class="centrado"></thead>
                    <tbody id="tabla">
                        <tr ng-repeat="row in rows" class="centrado">
                            <td>{{ row.Nombre}}</td> 
                            <td>{{ row.Direccion}}</td>
                            <td>{{ row.Telefono}}</td>                                                        
                         
                            <td><span class="glyphicon" ng-class="( (row.Estatus==1) ? 'mdi-action-done activo' : 'mdi-action-highlight-remove inactivo')" aria-hidden="true" title="ACTIVO" style="color:green"></span></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-material-orange btn-xs" href=""  ng-click="getSucursal(row.Opciones)" data-toggle="modal" data-target="#modificar_sucursal"><span class="glyphicon glyphicon-search"></span></a>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
                <div tasty-pagination></div>
            </div>

<!--NUEVO MODAL-->
            <div id="nuevo_usuario" class="modal fade" role="dialog">
                <div class="modal-dialog">                
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" ng-click="resetForm();" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Nueva Sucursal</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-inline" name="formSucursalN" role="form" validate>
                                <div class="form-group">
                                    <md-input-container flex>
                                        <label>Nombre</label>
                                        <input maxlength="50" ng-model="suc.Descrip" type="text" name="nombre_empresa">
                                        <ng-messages for="formSucursalN.Descrip.$error" role="alert" ng-if="submitted">
                                            <ng-message when="required">Debe indicar un Nombre</ng-message>
                                            <ng-message when="pattern">El titulo deben ser caracteres</ng-message>  
                                        </ng-messages>

                                    </md-input-container>
                                </div>
                                <div class="form-group">
                                    <md-input-container flex>
                                        <label>Descripcion</label>
                                        <input ng-model="suc.Descrip"  pattern="^[a-zA-Z0-9áéíóúñ_]+( [a-zA-Z0-9áéíóúñ _]+)*$" name="correo" type="text">

                                    </md-input-container>
                                </div>
                                <div class="form-group">
                                    <md-input-container flex>
                                        <label>Direcion</label>
                                        <input ng-model="suc.Direccion"  ng-readonly="false" pattern="^[a-zA-Z0-9áéíóúñ_]+( [a-zA-Z0-9áéíóúñ _]+)*$" name="text" type="phone">

                                    </md-input-container>
                                </div>
                                <div class="form-group">
                                    <md-input-container flex>
                                        <label>Telefono</label>
                                        <input ng-model="suc.Telefono"  ng-readonly="false" pattern="^[a-zA-Z0-9áéíóúñ_]+( [a-zA-Z0-9áéíóúñ _]+)*$" name="text" type="phone">

                                    </md-input-container>
                                </div>
                                                               
                                
                                 <div class="form-group">
                                    <md-switch ng-model="suc.Estatus">
                                        Activo
                                    </md-switch>
                                </div>

                            </form>                        </div>
                        <div class="modal-footer">


                            <md-button class="md-raised md-primary" ng-click="registrar_sucursal(true)">Registrar</md-button>
                            <md-button   ng-click="resetForm();" data-dismiss="modal">Cerrar</md-button>
                        </div>
                    </div>

                </div>
            </div>




            <!--MODAL DE EDICION-->
            <div id="modificar_sucursal" class="modal fade" >
                <div class="modal-dialog modal-wide-md">
                    <!-- Modal content-->
                    <div class="modal-content ">
                        <div class="modal-header">
                            <button type="button" class="close" ng-click="resetForm();" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Sucursales registradas</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-inline" name="formSucursalM" role="form" validate>
                                <div class="form-group">
                                    <md-input-container flex>
                                        <label>Nombre</label>
                                        <input maxlength="50" ng-model="suc2.Descrip" type="text" name="nombre_empresa">
                                        <ng-messages for="formSucursalM.Descrip.$error" role="alert" ng-if="submitted">
                                            <ng-message when="required">Debe indicar un Nombre</ng-message>
                                            <ng-message when="pattern">El titulo deben ser caracteres</ng-message>  
                                        </ng-messages>

                                    </md-input-container>
                                </div>
                                <div class="form-group">
                                    <md-input-container flex>
                                        <label>Direcion</label>
                                        <input ng-model="suc2.Direccion"  ng-readonly="false" pattern="^[a-zA-Z0-9áéíóúñ_]+( [a-zA-Z0-9áéíóúñ _]+)*$" name="text" type="phone">

                                    </md-input-container>
                                </div>
                                <div class="form-group">
                                    <md-input-container flex>
                                        <label>Telefono</label>
                                        <input ng-model="suc2.Telefono"  ng-readonly="false" pattern="^[a-zA-Z0-9áéíóúñ_]+( [a-zA-Z0-9áéíóúñ _]+)*$" name="text" type="phone">

                                    </md-input-container>
                                </div>
                                                               
                                
                                 <div class="form-group">
                                    <md-switch ng-model="suc2.Estatus">
                                        Activo
                                    </md-switch>
                                </div>

                            </form>
                            <div class="modal-footer">
                                <md-button class="md-raised md-primary" ng-click="registrar_sucursal()">Guardar</md-button>

                                <md-button class="btn-material-red" ng-click="resetForm();" data-dismiss="modal">Cerrar</md-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


</div>


<script src="<?php echo base_url(); ?>public/js/Sys/Sucursal.js"></script>










