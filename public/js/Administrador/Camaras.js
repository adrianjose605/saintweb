angular.module('saint')

.controller('camaras', ['$scope','$http','$mdToast','$timeout', us])



	function us($scope,$http,$mdToast,$timeout){
	$scope.user={};
	$scope.permiso={};$scope.permiso2={};
	$scope.user={};$scope.user2={}; $scope.Pass={pass:''}; $scope.per={descripcion:''};
	
	$scope.busqueda={estatus:true,query:''};
	$scope.paginador={valor:true};
	
	$scope.contador=0;
	$scope.submitted = false;
	$scope.camara={ip:'', id:'1'};
	$scope.busqueda={estatus:false,query:''};

	$scope.resetForm = function(){
		$scope.user=angular.copy({});
		$scope.user2=angular.copy({});
		$scope.usuarioN=angular.copy({});
		$scope.Pass=angular.copy({});
		$scope.permiso=angular.copy({});
		$scope.permiso2=angular.copy({});
		$scope.submitted=false;
	}


  $scope.Guardar = function() {
      var url='',obj={};
			
			url='Admin/Camaras/insert';
			obj=$scope.camara;
				
		console.log(obj);
		$scope.submitted = true;
			$http.post(url, obj).
			success(function(data, status, headers, config) {
				if(data.estatus){
					hacerToast('success',data.mensaje,$mdToast);
					}else{
					hacerToast('error',data.mensaje,$mdToast);  
					console.log(status+data.estatus);
				} 
			}).
			error(function(data, status, headers, config) {
				console.log(status);
				hacerToast('error','Error '+status,$mdToast);
			});
  };

  $scope.cam = null; $scope.ipcam =null;
  $scope.cargarCam = function() {
    // Use timeout to simulate a 650ms request.
    return $timeout(function() {
      $scope.ipcam =  $scope.ipcam  || [
        { id: 1},{ id: 2}       
      ];
    }, 100);
  };


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




	$scope.getGrupos= function(id){
		console.log('/User/GUsuarios/verG/'+id);
		$http.get('User/GUsuarios/verG/'+id).
			success(function(data, status, headers, config) {				
					data.permisos=data.permisos=='1';
					data.boton_panico=data.boton_panico=='1';
					data.enviar_noticias=data.enviar_noticias=='1';
					data.estatus=data.estatus=='1';
					data.crear_usuarios=data.crear_usuarios=='1';
					data.permisos=data.permisos=='1';
					data.moderar=data.moderar=='1';
					data.camaras=data.camaras=='1';
					data.ver_noticias=data.ver_noticias=='1';

					//console.log(data);
					$scope.permiso=data;					
					//console.log($scope.alerta_nueva);
					var $j = jQuery.noConflict();
	                $j("#modificar_grupo").modal("show");				
			}).
			error(function(data, status, headers, config) {
				console.log(status);
				hacerToast('error','Error '+status,$mdToast);
			});
	}


$scope.getUsuarios= function(id){
	  console.log('User/LUsuarios/verU/'+id);
		$http.get('User/LUsuarios/verU/'+id).
			success(function(data, status, headers, config) {				
					data.estatus=data.estatus=='1';
					
					//console.log(data);
					$scope.usuarioN=data;					
					//console.log($scope.alerta_nueva);
					var $j = jQuery.noConflict();
	                $j("#modificar_usuario").modal("show");				
			}).
			error(function(data, status, headers, config) {
				console.log(status);
				hacerToast('error','Error '+status,$mdToast);
			});
	}

		$scope.recargar=function(){
			$scope.paginador.valor=!$scope.paginador.valor;
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






}
 