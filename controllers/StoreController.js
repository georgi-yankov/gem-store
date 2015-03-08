app.controller('StoreController', ['$http', function($http){
	var store = this;
	store.products = [];

	store.deleteProduct = function(productID) {
		$http.post("ajax/delete-product.php?id="+productID).success(function(data){
			store.getProducts();
		});
	};

	store.getProducts = function() {
		$http.get('ajax/get-products.php').success(function(data){
			store.products = data;
		});
	};

	store.getProducts();
}]);