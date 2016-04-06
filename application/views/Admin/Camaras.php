
<div ng-controller="camaras" layout="column" flex id="content" >
    <div class="container" style="width:95%">
        <h1 >Camaras perimetrales</h1>

      
            </div>

           
            <div  class="container" layout="row" layout-padding layout-wrap layout-fill layout layout-align="center" style="padding-bottom: 300px;" ng-cloak>
           <md-whiteframe class="md-whiteframe-22dp" flex-sm="50" flex-gt-md="30" layout layout-align="center center">
              <span id="widget">

            <!--  <object data="http://192.168.1.6:8081" width="350" height="290"> 
          
             </object> -->
            <img src="<?php echo $ip2; ?>">          
            </span>
            </md-whiteframe>
            <div>
            </div>
         <md-whiteframe class="md-whiteframe-22dp" flex-sm="50" flex-gt-md="30" layout layout-align="center center">
              
              <span id="widget2">

            <img src="<?php echo $ip1; ?>">
            </span>
             
        </md-whiteframe>
            </div>

    </div>


</div>


<script src="<?php echo base_url(); ?>public/js/Administrador/Camaras.js"></script>










