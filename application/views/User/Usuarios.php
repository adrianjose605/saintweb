
<div ng-controller="GUsuarios" layout="column" flex id="content" >
    <div class="container" style="width:95%">
        <h1 >Usuarios</h1>

        <h3>Busqueda</h3>

            <form class="form-inline" name="formBusquedaUsuarios" role="form" novalidate>
                <div class="form-group">
                    <md-input-container flex ng-class="md-primary">
                        <label class="">Nombre / Abrev</label>
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




            <div ng-show="contador != 0" tasty-table bind-resource-callback="getResourceU" bind-filters="paginador">
                <table class="table table-striped table-condensed" >
                    <thead tasty-thead bind-not-sort-by="notSortBy" class="centrado"></thead>
                    <tbody id="tabla">
                        <tr ng-repeat="row in rows" class="centrado">
                        <td>{{ row.Usuario}}</td>
                            <td>{{ row.Nombre}}</td>
                            <td>{{ row.Apellido}}</td>
                            <td>{{ row.Fecha_registro}}</td>
                            <td>{{ row.Privilegios}}</td>                                  
                            <td><span class="glyphicon" ng-class="( (row.Estatus==1) ? 'mdi-action-done activo' : 'mdi-action-highlight-remove inactivo')" aria-hidden="true" title="ACTIVO" style="color:green"></span></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-material-red btn-xs" href=""  ng-click="getUsuarios(row.Opciones)" data-toggle="modal" data-target="#modificar_noticia"><span class="glyphicon glyphicon-search"></span></a>
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
                            <h4 class="modal-title">Nuevo usuario</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-inline" name="formUsuarioN" role="form" novalidate>
                                <div class="form-group">
                                    <md-input-container flex>
                                        <label>Usuario</label>
                                        <input ng-model="user2.Usuario" name="usuario" type="text">
                                    </md-input-container>
                                </div>
                                <div class="form-group">
                                    <md-input-container flex>
                                        <label>Nombre</label>
                                        <input maxlength="30" ng-model="user2.Nombre" ng-readonly="false" pattern="[a-zA-Z]+" type="text" name="titulo_noticia">
                                        <ng-messages for="formNoticiaM.usuario_noticia.$error" role="alert" ng-if="submitted">
                                            <ng-message when="required">Debe indicar un Titulo</ng-message>
                                            <ng-message when="pattern">El titulo deben ser caracteres</ng-message>  
                                        </ng-messages>

                                    </md-input-container>
                                </div>
                                   <div class="form-group">
                                    <md-input-container flex>
                                        <label>Apellido</label>
                                        <input ng-model="user2.Apellido"  ng-readonly="false" pattern="^[a-zA-Z0-9áéíóúñ_]+( [a-zA-Z0-9áéíóúñ _]+)*$" name="detalle_noticia" type="text">

                                    </md-input-container>
                                </div>
                                
                                <div class="form-group">
                                    <md-input-container flex>
                                        <label>Permiso</label>
                                        <input ng-model="user2.id_Grupo"  ng-readonly="false" pattern="^[a-zA-Z0-9áéíóúñ_]+( [a-zA-Z0-9áéíóúñ _]+)*$" name="ubicacion_noticia" type="text">

                                    </md-input-container>
                                    <md-select placeholder="Assign to user" ng-model="user2.id_Grupo" md-on-open="cargarP()" style="min-width: 200px;">
                                    <md-option ng-value="user" ng-repeat="user in users">{{per.Descripcion}}</md-option>
                                </md-select>
                                </div>
                                
                                 <div class="form-group">
                                    <md-input-container flex>
                                        <label>Contaseña</label>
                                        <input ng-model="user2.Clave"  ng-readonly="false" pattern="^[a-zA-Z0-9áéíóúñ_]+( [a-zA-Z0-9áéíóúñ _]+)*$" name="pass" type="password" >
                                    </md-input-container>
                                </div>
                                 <div class="form-group">
                                    <md-switch ng-model="user2.Estatus">
                                        Activo
                                    </md-switch>
                                </div>

                            </form>                        </div>
                        <div class="modal-footer">


                            <md-button class="md-raised md-primary" ng-click="registrar_usuario(true)">Registrar</md-button>
                            <md-button   ng-click="resetForm();" data-dismiss="modal">Cerrar</md-button>
                        </div>
                    </div>

                </div>
            </div>




            <!--MODAL DE EDICION-->
            <div id="modificar_usuario" class="modal fade" >
                <div class="modal-dialog modal-wide-md">
                    <!-- Modal content-->
                    <div class="modal-content ">
                        <div class="modal-header">
                            <button type="button" class="close" ng-click="resetForm();" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Usuario registrado</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-inline" name="formUsuarioM" role="form" novalidate>
                                <div class="form-group">
                                    <md-input-container flex>
                                        <label>Usuario</label>
                                        <input ng-model="usuarioN.Usuario"  ng-readonly="true" pattern="^[a-zA-Z0-9áéíóúñ_]+( [a-zA-Z0-9áéíóúñ _]+)*$" name="usuario_noticia" type="text">

                                    </md-input-container>
                                </div>
                                <div class="form-group">
                                    <md-input-container flex>
                                        <label>Nombre</label>
                                        <input maxlength="30" ng-model="usuarioN.Nombre" ng-readonly="false" pattern="[a-zA-Z]+" type="text" name="titulo_noticia">
                                        <ng-messages for="formNoticiaM.usuario_noticia.$error" role="alert" ng-if="submitted">
                                            <ng-message when="required">Debe indicar un Titulo</ng-message>
                                            <ng-message when="pattern">El titulo deben ser caracteres</ng-message>  
                                        </ng-messages>

                                    </md-input-container>
                                </div>
                                   <div class="form-group">
                                    <md-input-container flex>
                                        <label>Apellido</label>
                                        <input ng-model="usuarioN.Apellido"  ng-readonly="false" pattern="^[a-zA-Z0-9áéíóúñ_]+( [a-zA-Z0-9áéíóúñ _]+)*$" name="detalle_noticia" type="text">

                                    </md-input-container>
                                </div>
                                <div class="form-group">
                                    <md-input-container flex>
                                        <label>Fecha de Registro</label>
                                        <input ng-model="usuarioN.Fecha_registro" ng-readonly="true"   name="fechahora">                            
                                    </md-input-container>
                                </div>
                                <div class="form-group">
                                    <md-input-container flex>
                                        <label>Permiso</label>
                                        <input ng-model="usuarioN.Descripcion"  ng-readonly="false" pattern="^[a-zA-Z0-9áéíóúñ_]+( [a-zA-Z0-9áéíóúñ _]+)*$" name="ubicacion_noticia" type="text">

                                    </md-input-container>
                                </div>
                                <div class="form-group">
                                    <md-switch ng-model="usuarioN.Estatus">
                                        Activo
                                    </md-switch>
                                </div>
                                 <div class="form-group">
                                    <md-input-container flex>
                                        <label>Contaseña</label>
                                        <input ng-model="usuarioN.Clave"  ng-readonly="false" pattern="^[a-zA-Z0-9áéíóúñ_]+( [a-zA-Z0-9áéíóúñ _]+)*$" name="pass" type="password" >
                                    </md-input-container>
                                </div>
                                

                            </form>
                            <div class="modal-footer">
                                <md-button class="md-raised md-primary" ng-click="registrar_usuario()">Guardar</md-button>

                                <md-button class="btn-material-red" ng-click="resetForm();" data-dismiss="modal">Cerrar</md-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


</div>


<script src="<?php echo base_url(); ?>public/js/Administrador/Usuarios.js"></script>










