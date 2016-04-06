
<div ng-controller="camaras" layout="column" flex id="content" >
    <div class="container" style="width:95%">
        <h1 >Configuracion de Camaras perimetrales</h1>

      
            </div>

           
        <div  class="container" layout="row" layout-padding layout-wrap layout-fill style="padding-bottom: 250px;" layout layout-align="center center" ng-cloak>
           <md-whiteframe class="md-whiteframe-24dp" flex-sm="50" flex-gt-md="50" layout layout-align="center center">
              <span id="widget">
                 <md-select placeholder="Numero de Camara" ng-model="camara" md-on-open="cargarCam()" style="width: 95%">
                   <md-option ng-value="cam" ng-repeat="cam in ipcam"><center><h3>{{cam.id}}</h3></center></md-option>
              </md-select>

               <md-input-container flex>
                <label>Direccion IP</label>
                  <input ng-model="camara.ip"  style="width: 350%"></input>
              </md-input-container>
                 
              <div class="container" layout="row" layout layout-align="center center" >
                  <md-button class="md-raised md-primary"ng-click="Guardar()" style="width: 300%">Guardar</md-button>

              </div>
              
              </span>
            </md-whiteframe>
            
     
        </div>

    </div>


</div>


<script src="<?php echo base_url(); ?>public/js/Administrador/Camaras.js"></script>










