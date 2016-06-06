
<div   style="height: 450px; width: 400px;">
    <md-toolbar layout="row"  >
        <div class="md-toolbar-tools">
        <img src="public/img/Imagen1.png"  width="70" height="90">
            <center><h1>Bienvenido a Saint Web</h1></center>
        </div>
    </md-toolbar>
   
        <div   style="margin-top: 30px;"   >
        <md-content layout-padding >
           <form method="post" action="usuarios/verificacion"  name="formSesion" role="form" novalidate>
                    
                    <md-input-container style="margin-top: 6%; width: 95%;"class="" >
                        <label>Usuario</label>
                        <input required md-no-asterisk name="usuario" ng-model="user.usuario" type="text" md-maxlength="20">
                         <div ng-messages="formSesion.usuario.$error">
                         <div ng-message="required">Ingrese su Usuario.</div>
                          <div ng-message="md-maxlength">Maximo 20 caracteres</div>
                        </div>
                    </md-input-container><br>
                    <md-input-container class=""  style="width:  95%;">
                        <label>Contraseña</label>
                        <input required name="clave"  ng-model="user.clave" type="password" md-maxlength="20">
                         <div ng-messages="formSesion.clave.$error">
                         <div ng-message="required">Ingrese su Contraseña.</div>
                          <div ng-message="md-maxlength">Maximo 20 caracteres</div>
                        </div>
                    </md-input-container><br>

                    <md-button style="margin-top: 10%; margin-left: 35%;" type="submit" class="md-raised md-primary" >Ingresar</md-button>

                   <!-- <md-button class="md-fab  md-warn md-hue-2" style="margin-left: 20%" href="<?php echo base_url(); ?>usuarios/personas" >
                        <md-icon class="center" md-svg-src="public/icons/formas.svg" style="margin-top: 33%"></md-icon>
                    </md-button>-->
                        <div flex layout="row"></div><div flex></div><div flex></div>
               
             


            </form>
            </md-content>

        </div>
     <center></center>
   
</div>



