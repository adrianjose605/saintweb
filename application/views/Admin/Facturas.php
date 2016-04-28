
<div ng-controller="noticias" layout="column" flex id="content" >
    <div class="container" style="width:95%">
        <h1 >Saint</h1>


            <div ng-show="contador != 0" tasty-table bind-resource-callback="getResource" bind-filters="paginador" ng-cloak>
              


                <table class="table table-striped table-condensed" >
                    <thead tasty-thead bind-not-sort-by="notSortBy" class="centrado"></thead>
                    <tbody id="tabla">
                        <tr ng-repeat="row in rows" class="centrado">

                            <td>{{ row.TipoFac}}</td>
                            <td>{{ row.Descrip}}</td>
                            <td>{{ row.NumeroD}}</td>
                            <td>{{ row.CodSucu}}</td>

                        </tr>
                    </tbody>
                </table>
            </div>
    </div>


</div>


<script src="<?php echo base_url(); ?>public/js/Administrador/Facturas.js"></script>










