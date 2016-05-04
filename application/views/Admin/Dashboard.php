
<div ng-controller="Dashboard" layout="column" flex id="content" >
  <div class="container" style="width:95%">
    <h3>DashBoard</h3>
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-3">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-3"><i class="fa fa-credit-card fa-5x"></i></div>
                <div class="col-md-9 text-right"><h4>{{ credito[0].totalCredito | currency : 'Bs '}}</h4></div>
              </div>
            </div>
            <div class="panel-body">
              <h5>TOTAL CREDITO</h5>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-3"><i class="fa fa-dollar fa-5x"></i></div>
                <div class="col-md-9 text-right"><h4>{{ facturado[0].totalFacturado | currency : 'Bs '}}</h4></div>
              </div>
            </div>
            <div class="panel-body">
              <h5>TOTAL FACTURADO</h5>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="panel panel-danger">
            <div class="panel-heading"><i class="fa fa-camera-retro fa-5x"></i> fa-5x</div>
            <div class="panel-body">
              Panel content
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="panel panel-waring">
            <div class="panel-heading"><i class="fa fa-camera-retro fa-5x"></i> fa-5x</div>
            <div class="panel-body">
              Panel content
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div id="container"></div>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>


<script src="<?php echo base_url(); ?>public/js/Administrador/Dashboard.js"></script>










