<md-toolbar layout="row"  class="md-theme-indigo md-hue-2 md-whiteframe-z1" >
    <div class="md-toolbar-tools">
        <md-button ng-click="toggleSidenav('left')" class="md-icon-button">
            <span class="glyphicon glyphicon-align-justify"></span>
        </md-button>
         <img src="public/img/Imagen15.png">
        
        
         <img src="public/img/SAINT.PNG">
    </div >
    <div class="md-toolbar-tools" style="padding-left: 70%">
        <md-button href="<?php echo base_url(); ?>usuarios/cerrar" class="md-icon-button" aria-label="More" style="padding-top: 10%">        
        <md-icon class="center" md-svg-src="public/icons/arrow.svg" style="padding-top: 9%"></md-icon>
        </md-button>
        
    </div>
</md-toolbar>
<div layout="row" flex ng-cloak>
    <md-sidenav layout="column" class="md-sidenav-left  md-whiteframe-z4" md-is-locked-open="$mdMedia('gt-lg')" md-disable-backdrop md-whiteframe="4" md-component-id="left">
        <md-content layout-padding="">
            <accordion close-others="oneAtATime">

                <accordion-group>
                    <accordion-heading>
                        <p><span class="glyphicon glyphicon-menu-down" style="margin-right: 10px;"></span> Inicio</p>
                    </accordion-heading> 
                    <md-list class="listdemoListControls">
                        <md-list-item ng-click="navigateTo('Admin/Saa_libs/Dashboard')">
                            <p><span class="glyphicon glyphicon-menu-right" style="margin-right: 10px;"></span> DashBoard <i class="fa fa-tachometer" aria-hidden="true"></i></p>
                        </md-list-item>
                        
                    </md-list>

                </accordion-group>

                <accordion-group>
                    <accordion-heading>
                        <p><span class="glyphicon glyphicon-menu-down" style="margin-right: 10px;"></span> Ventas</p>
                    </accordion-heading> 
                    <md-list class="listdemoListControls">
                        <md-list-item ng-click="navigateTo('User/GUsuarios')">
                            <p><span class="glyphicon glyphicon-menu-right" style="margin-right: 10px;"></span> Libro de ventas <i class="fa fa-file-pdf-o" aria-hidden="true"></i></p>
                        </md-list-item>
                        
                    </md-list>
                      <md-list class="listdemoListControls">
                        <md-list-item ng-click="navigateTo('User/GUsuarios')">
                            <p><span class="glyphicon glyphicon-menu-right" style="margin-right: 10px;"></span> Facturacion <i class="fa fa-file-pdf-o" aria-hidden="true"></i></p>
                        </md-list-item>
                        
                    </md-list>
                     
                </accordion-group>
               
               
                <accordion-group>
                    <accordion-heading>
                        <p><span class="glyphicon glyphicon-menu-down" style="margin-right: 10px;"></span> Control de Acceso</p>
                    </accordion-heading> 
                    <md-list class="listdemoListControls">
                        <md-list-item ng-click="navigateTo('User/LUsuarios')">
                            <p><span class="glyphicon glyphicon-menu-right" style="margin-right: 10px;"></span> Usuarios de acceso</p>
                        </md-list-item>
                        
                        <md-list-item ng-click="navigateTo('User/GUsuarios')">
                            <p><span class="glyphicon glyphicon-menu-right" style="margin-right: 10px;"></span> Grupos de usuarios</p>
                        </md-list-item>
                    </md-list>

                </accordion-group>

                  <accordion-group>
                    <accordion-heading>
                        <p><span class="glyphicon glyphicon-menu-down" style="margin-right: 10px;"></span> Control de empresas</p>
                    </accordion-heading> 
                    <md-list class="listdemoListControls">
                        <md-list-item ng-click="navigateTo('User/GUsuarios')">
                            <p><span class="glyphicon glyphicon-menu-right" style="margin-right: 10px;"></span> Registro de Empresas</p>
                        </md-list-item>
                        
                        <md-list-item ng-click="navigateTo('User/GUsuarios')">
                            <p><span class="glyphicon glyphicon-menu-right" style="margin-right: 10px;"></span> Sucursales</p>
                        </md-list-item>
                    </md-list>

                </accordion-group>
                
            </accordion>
            <h4>Rango de Fecha a Consultar</h4>
            <md-datepicker ng-model="desde" md-placeholder="Desde"></md-datepicker>
            <md-datepicker ng-model="hasta" md-placeholder="Hasta"></md-datepicker>
            <div class="text-center">
                <md-button class="md-raised md-primary">Consultar</md-button>
            </div>
        </md-content>

      
    </md-sidenav>
