<md-toolbar layout="row"  class="md-theme-indigo">
    <div class="md-toolbar-tools">
        <md-button ng-click="" class="md-icon-button">
            <span class="glyphicon glyphicon-align-justify"></span>
        </md-button>
        <img src="public/img/MiniImagen1.png" width="90" height="70" >       
        <img src="public/img/SAINT.PNG">
    </div>
    <div ng-controller="Login" class="md-toolbar-tools" style="padding-left: 60%">
        
        <md-button ng-click="showAdvanced($event)"  class="md-icon-button" aria-label="More" style="padding-top: 5%; width: 50px; height: 50px;">        
        <md-icon class="center" md-svg-src="public/icons/login.svg"  style=" width: 30px; height: 45px;"></md-icon>

        </md-button>
          <p style="padding-top: 12%; width: 60px; ">Login</p>
    </div>
</md-toolbar>
<!--ng-init="showAdvanced($event)"-->
<div >
	<div style="margin-top:20%;">
<center>		
<H1 style="color: white; font-weight: 900;">Lo mejor para su empresa.</H1>
</center>

	</div>	
 <script src="public/js/jquery.backstretch.min.js"></script>
        <script>
            jQuery.backstretch([
                  "public/img/img1.jpg"
                , "public/img/img2.jpg"
                , "public/img/img3.jpg"
                , "public/img/img4.jpg"
                
                ], {duration: 3000, fade: 1500}
            );
            
        </script>

</div>

<script src="public/js/User.js"></script>
