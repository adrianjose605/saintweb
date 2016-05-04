
<div ng-controller="Facturas" layout="column" flex id="content" >
    <div class="container" style="width:95%">
        <h1>Listado de Facturas</h1>


            <div>

                   <table class="table table-striped table-condensed">
                        <tr>
                            <th class="text-center">Tipo de Factura</th>
                            <th class="text-center">Monto</th>
                            <th class="text-center">Fecha</th>
                        </tr>
                       <tr ng-repeat="row in posts">
                           <td>{{ row.TipoFac }}</td>
                           <td>{{ row.Monto | currency : 'Bs '}}</td>
                           <td>{{ row.Fecha }}</td>
                       </tr>
                   </table>

               <!-- <table class="table table-striped table-condensed" >
                    <thead tasty-thead bind-not-sort-by="notSortBy" class="centrado"></thead>
                    <tbody id="tabla">
                        <tr ng-repeat="row in rows" class="centrado">

                            <td>{{ row.TipoFac}}</td>
                            <td>{{ row.Descrip}}</td>
                            <td>{{ row.NumeroD}}</td>
                            <td>{{ row.CodSucu}}</td>

                        </tr>
                    </tbody>
                </table>-->
            </div>
    </div>


</div>


<script src="<?php echo base_url(); ?>public/js/Administrador/Facturas.js"></script>










