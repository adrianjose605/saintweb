angular.module('saint')

.controller('Facturas', ['$scope','$http', us])



	function us($scope,$http,$mdToast){
		$scope.paginador={valor:true};
		$scope.busqueda={estatus:true,query:''};
		$scope.resetForm = function(){
		$scope.user=angular.copy({});
		$scope.emp=angular.copy({});
		$scope.emp2=angular.copy({});
		$scope.usuarioN=angular.copy({});
		$scope.Pass=angular.copy({});
		$scope.empresa=angular.copy({});
		$scope.empresa2=angular.copy({});
		$scope.submitted=false;
	}



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
			});


	$scope.getResourceV = function (params, paramsObj) {	
		if(!paramsObj){
			console.log('Cambio  de Asignacion');
			paramsObj=$scope.paginador;
			console.log(paramsObj);
		}

		
		$scope.paginador=paramsObj;
		console.log('Antes de la Carga Inicial');
		

		var urlApi = 'Admin/Saa_libs/tabla_principal_ventas/'+paramsObj.count+'/'+paramsObj.page+'/';
	
		if(paramsObj.sortBy){
			urlApi+=paramsObj.sortBy+'/'+paramsObj.sortOrder;    
		}

		return $http.post(urlApi,$scope.busqueda).then(function (response) {
			
			
			$scope.contador=response.data.pagination.size;
			
			return {
				'rows': response.data.rows,
				'header': response.data.header,
				'pagination': response.data.pagination,
				'sortBy': response.data['sort-by'],
				'sortOrder': response.data['sort-order']
			}
		});
	};		

	}
 