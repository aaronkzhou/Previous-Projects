var cart=angular.module('cart',[]);
cart.factory('cartservice',function($http){
	return{
		get:function(){
			return $http.get('./cart/getall');
		},
		store:function(cartdata){
			 //var cartdata=cartdata.toSource();
			var cartdata=(cartdata);
			return $http({
				method:'POST',
				url:'./cart/store',
				data:cartdata
			});
			//return $http.post('./cart/store',cartdata);

		},
		destroy:function(id){
			return $http.delete('./cart/'+id);
		},
		getinfo:function(){
			return $http.get('./cart/getinfo');
		}
	}
});

cart.controller('cartcontroller',function($http,cartservice,$scope){
	$scope.cartdata={};
	$scope.loading=true;
	cartservice.getinfo().success(function(data){
		$scope.productinfos=data;
		$scope.loading=false;
	});
	cartservice.get().success(function(data){
		$scope.carts=data;
		$scope.loading=false;
	});
	$scope.submitcart=function(){
		$scope.loading=true;
		cartservice.store($scope.cartdata).success(function(data){
			cartservice.get().success(function(getdata){
				//console.log('it doesnt work');
				$scope.carts=getdata;
				$scope.loading=false;
			});
		}).error(function(data){
			console.log(data);
		});
	};
	$scope.deletecart=function(id){
		$scope.loading=true;
		cartservice.destroy(id).success(function(data){
			cartservice.get().success(function(getdata){
				$scope.carts=getdata;
				$scope.loading=false;
			});
		});
	};
});