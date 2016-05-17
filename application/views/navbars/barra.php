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
