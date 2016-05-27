angular.module('saint')

.controller('Suc', ['$scope','$http','$mdToast', us])



	function us($scope,$http,$mdToast){
	$scope.user={};
	$scope.suc2={};
	$scope.empresa={};$scope.empresa2={};
	$scope.user={};$scope.suc={}; $scope.per={descripcion:''};
	
	$scope.busqueda={estatus:true,query:''};
	$scope.paginador={valor:true};
	$scope.grupo_t=[];
	$scope.contador=0;
	$scope.submitted = false;

	$scope.resetForm = function(){
		$scope.user=angular.copy({});
		$scope.suc=angular.copy({});
		$scope.suc2=angular.copy({});
		$scope.usuarioN=angular.copy({});
		$scope.Pass=angular.copy({});
		$scope.empresa=angular.copy({});
		$scope.empresa2=angular.copy({});
		$scope.submitted=false;
	}

			$scope.cargarP=function(){
			$http.get('User/GUsuarios/verG/'+id).
				success(function(data, status, headers, config) {				
					
					$scope.per=data;	

					}).
			error(function(data, status, headers, config) {
				console.log(status);
				hacerToast('error','Error '+status,$mdToast);
			});				
					
	}


//////////////////////////////////GRUPOS DE USUARIOS////////////////////////////////////////////////
// obtener info de un grupo para los swich
	$scope.getSucursal= function(id){
		console.log('/Sys/Sucursales/verE/'+id);
		$http.get('Sys/Sucursales/verE/'+id).
			success(function(data, status, headers, config) {				
					
					data.Estatus=data.Estatus=='1';
				
			
					$scope.suc2=data;					
					//console.log($scope.alerta_nueva);
					var $j = jQuery.noConflict();
	                $j("#modificar_grupo").modal("show");				
			}).
			error(function(data, status, headers, config) {
				console.log(status);
				hacerToast('error','Error '+status,$mdToast);
			});
	}




	$scope.registrar_grupo=function(tipo){	
		var url='',obj={};
			if(tipo){
			url='User/GUsuarios/nuevo_grupo';
			obj=$scope.empresa2;
		}else{
			
			url='User/GUsuarios/modificar_grupo';
			obj=$scope.empresa;
			}
			
			
			
			console.log(obj);
			
		$scope.submitted = true;
			$http.post(url, obj).
			success(function(data, status, headers, config) {
				if(data.status){
					hacerToast('success',data.mensaje,$mdToast);
					$scope.recargar();
				}
				else
					hacerToast('error',data.mensaje,$mdToast);   
			}).
			error(function(data, status, headers, config) {
				console.log(status);
				hacerToast('error','Error '+status,$mdToast);
			});
		

	};

///////////////////////USUARIOS///////////////////////////////////////////////////////
// obtener info de un usuario para los swich
$scope.getSucursal= function(id){

	  console.log('Sys/Sucursales/verE/'+id);
		$http.get('Sys/Sucursales/verE/'+id).
			success(function(data, status, headers, config) {				
					data.Estatus=data.Estatus=='1';
					
					//console.log(data);
					$scope.suc2=data;	
					console.log(data);				
					//console.log($scope.alerta_nueva);
					var $j = jQuery.noConflict();
	                $j("#modificar_sucursal").modal("show");				
			}).
			error(function(data, status, headers, config) {
				console.log(status);
				hacerToast('error','Error '+status,$mdToast);
			});
	}

		$scope.recargar=function(){
			$scope.paginador.valor=!$scope.paginador.valor;
		}


	

	$scope.getResourceS = function (params, paramsObj) {	
		if(!paramsObj){
			console.log('Cambio  de Asignacion');
			paramsObj=$scope.paginador;
			console.log(paramsObj);
		}

		
		$scope.paginador=paramsObj;
		console.log('Antes de la Carga Inicial');
		

		var urlApi = 'Sys/Sucursales/tabla_principal_suc/'+paramsObj.count+'/'+paramsObj.page+'/';
	
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




	$scope.registrar_sucursal=function(tipo){
		
		var url='',obj={};
			if(tipo){
			url='Sys/Sucursales/nueva_empresa';
			obj=$scope.suc;
			console.log(obj);
		}else{
			
			url='Sys/Sucursales/modificar_sucursals';
			
				obj=$scope.suc2;
				//console.log(obj);
			}

	
			
		$scope.submitted = true;
			$http.post(url, obj).
			success(function(data, status, headers, config) {
				if(data.estatus){
					hacerToast('success',data.mensaje,$mdToast);
					$scope.recargar();
				}else{
					hacerToast('error',data.mensaje,$mdToast);  
					console.log(status+data.status);
				} 
			}).
			error(function(data, status, headers, config) {
				//console.log(status);
				hacerToast('error','Error '+status,$mdToast);
			});
		

	};



}
 