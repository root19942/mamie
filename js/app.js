var app = angular.module('mamie', []);

app.controller('HomeCtrl', function($scope,productfactory,$window,$rootScope){ 

  productfactory.GetProducts().then(
    (res)=>{
      $scope.products = res.data
    },
    (error)=>{

    }
    )

  $rootScope.card = $window.localStorage['card'] ? JSON.parse($window.localStorage['card']) : [];




  $scope.addCard = function (product) {

    product.qte = 1

    if($window.localStorage['card'] != undefined){
          let card = JSON.parse($window.localStorage['card']);
          var found = false
          for (var i = card.length - 1; i >= 0; i--) {
            if(card[i].id == product.id){
              found = true;
              break;
            }
          }
          if (found) {
            card.push(product)
            $window.localStorage['card'] = JSON.stringify(card);
          }


      }else{
          let card = [];
          card.push(product)
          $window.localStorage['card'] = JSON.stringify(card);
      }

      console.log( JSON.parse($window.localStorage['card']) )

  }

})
app.controller('StroreCtrl', function($scope,productfactory){  

    $scope.currentPage = 0;
    $scope.pageSize = 12;
    $scope.products = []


  productfactory.GetProducts().then(
    (res)=>{
      $scope.products = res.data
    },
    (error)=>{
    }
    )

    $scope.numberOfPages=function(){
        return Math.ceil($scope.products.length/$scope.pageSize);                
    }

})
app.controller('RecetteCtrl', function($scope,recettefactory){  

    $scope.currentPage = 0;
    $scope.pageSize = 12;
    $scope.products = []


  recettefactory.GetRecettes().then(
    (res)=>{
      $scope.recettes = res.data
    },
    (error)=>{
    }
    )

    $scope.numberOfPages=function(){
        return Math.ceil($scope.recettes.length/$scope.pageSize);                
    }

})


app.factory('productfactory', function($http){
  var GetProducts=function(){

    return  $http({

      method: 'GET',

      url: './API/public/api/v1/products'
    })

  }

  var GetProduct=function(id){

    return  $http({

      method: 'GET',

      url: './API/public/api/v1/product/'+id

    })
  }

  return{

    GetProducts : GetProducts,

    GetProduct : GetProduct

  }

})

app.factory('recettefactory', function($http){
  var GetRecettes=function(){

    return  $http({

      method: 'GET',

      url: './API/public/api/v1/recettes'
    })

  }

  var GetRecette=function(id){

    return  $http({

      method: 'GET',

      url: './API/public/api/v1/recette/'+id

    })
  }

  return{

    GetRecettes : GetRecettes,

    GetRecette : GetRecette

  }

})

app.filter('startFrom', function() {
    return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
});

