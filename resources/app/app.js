/**
 *  Configuration de l'environnement
 */
var __ENV = window.__env;

/**
 *  Déclaration de l'application Angular
 */
var app = angular.module("datalab", []).constant('__ENV', __ENV);

/**
 *  Newsletter
 */
app.controller("newsCtrl", function($scope, $http){

  $scope.sending = false;
  $scope.error = false;
  $scope.success = false;
  $scope.msg = "";

  $scope.add = function() {

    // Vérifie que l'adresse n'est pas nulle
    if(!$scope.email || $scope.email.length === 0 || !$scope.email.trim()) return;

    $scope.msg = "";
    $scope.sending = true;
    $scope.error = false;
    $scope.success = false;

    $scope.msg = "Enregistrement en cours...";

    $http.post(__ENV.apiUrl + '/newsletter', {email: $scope.email}).then(function(res){
      $scope.sending = false;
      $scope.success = true;
      $scope.msg = "Votre email a bien été enregistré !";
    }, function(error){
      console.log(error);
      $scope.sending = false;
      $scope.error = true;
      var status = error.status;
      if(status == 409) $scope.msg = "Votre email a déjà été enregistré !";
      else if(status == 422) $scope.msg = "Votre email n'est pas correct.";
      else $scope.msg = "Un erreur est survenue, veuillez réessayez plus tard.";
    });

  }



});
