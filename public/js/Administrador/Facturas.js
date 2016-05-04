angular.module('saint')

.controller('Facturas', ['$scope','$http', us])



	function us($scope,$http,$mdToast){

		$http.get("Admin/Saa_libs/ver/")
			.success(function(data){
				data.forEach(function(data){
					data.Fecha = ''+data.Fecha;
					var anio = data.Fecha.slice(0,4);
					var mes = data.Fecha.slice(4,6);
					var dia = data.Fecha.slice(6,8);
					data.Fecha = dia+'/'+mes+'/'+anio;
				});
				$scope.posts = data;
			})

	}
 