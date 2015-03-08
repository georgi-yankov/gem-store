app.controller('StoreController', ['$http', function($http){
	var store = this;
	store.products = [];

	$http.get('store-products.php').success(function(data){
		store.products = data;
	});
}]);