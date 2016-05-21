angular.module('saint')

.controller('Emp', ['$scope','$http','$mdToast', us])



	function us($scope,$http,$mdToast){
	$scope.user={};
	$scope.emp2={};
	$scope.empresa={};$scope.empresa2={};
	$scope.user={};$scope.emp={}; $scope.Pass={Clave:''}; $scope.per={descripcion:''};
	
	$scope.busqueda={estatus:true,query:''};
	$scope.paginador={valor:true};
	$scope.grupo_t=[];
	$scope.contador=0;
	$scope.submitted = false;

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
	$scope.getEmpresas= function(id){
		console.log('/Sys/Empresas/verE/'+id);
		$http.get('Sys/Empresas/verE/'+id).
			success(function(data, status, headers, config) {				
					
					data.Estatus=data.Estatus=='1';
				
			
					$scope.emp2=data;					
					//console.log($scope.alerta_nueva);
					var $j = jQuery.noConflict();
	                $j("#modificar_grupo").modal("show");				
			}).
			error(function(data, status, headers, config) {
				console.log(status);
				hacerToast('error','Error '+status,$mdToast);
			});
	}

$scope.getResourceG = function (params, paramsObj) {	
		if(!paramsObj){
			console.log('Cambio  de Asignacion');
			paramsObj=$scope.paginador;
			console.log(paramsObj);
		}

		
		$scope.paginador=paramsObj;
		console.log('Antes de la Carga Inicial');
		

		var urlApi = 'User/GUsuarios/tabla_principal_grupos/'+paramsObj.count+'/'+paramsObj.page+'/';
	
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
$scope.getEmpresas= function(id){

	  console.log('Sys/Empresas/verE/'+id);
		$http.get('Sys/Empresas/verE/'+id).
			success(function(data, status, headers, config) {				
					data.Estatus=data.Estatus=='1';
					
					//console.log(data);
					$scope.emp2=data;	
					console.log(data);				
					//console.log($scope.alerta_nueva);
					var $j = jQuery.noConflict();
	                $j("#modificar_empresa").modal("show");				
			}).
			error(function(data, status, headers, config) {
				console.log(status);
				hacerToast('error','Error '+status,$mdToast);
			});
	}

		$scope.recargar=function(){
			$scope.paginador.valor=!$scope.paginador.valor;
		}


	

	$scope.getResourceE = function (params, paramsObj) {	
		if(!paramsObj){
			console.log('Cambio  de Asignacion');
			paramsObj=$scope.paginador;
			console.log(paramsObj);
		}

		
		$scope.paginador=paramsObj;
		console.log('Antes de la Carga Inicial');
		

		var urlApi = 'Sys/Empresas/tabla_principal_empresas/'+paramsObj.count+'/'+paramsObj.page+'/';
	
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




	$scope.registrar_empresa=function(tipo){
		
		var url='',obj={};
			if(tipo){
			url='Sys/Empresas/nueva_empresa';
			obj=$scope.emp;
			console.log(obj);
		}else{
			
			url='Sys/Empresas/modificar_empresas';
			
				obj=$scope.emp2;
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



	$scope.registrar_alerta=function(){	
		var url='',obj={},obj2={};

			url='User/GUsuarios/modificar_usuarios';

			obj=$scope.alerta_nueva;
			obj2=$scope.alerta_nueva;
			if(obj2["estatus"]){
				obj2["estatus"]=1;
			}
			
			
			
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

}
 