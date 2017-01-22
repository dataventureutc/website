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

/**
 *  Contact
 */
app.controller("contactCtrl", function($scope, $http){

  $scope.sending = false;
  $scope.error = false;
  $scope.success = false;
  $scope.msg = "";

  $scope.send = function() {

    // Vérifie que les données ne sont pas vides
    if(!$scope.contact.email || $scope.contact.email.length === 0 || !$scope.contact.email.trim()) return;
    if(!$scope.contact.first_name || $scope.contact.first_name.length === 0 || !$scope.contact.first_name.trim()) return;
    if(!$scope.contact.last_name || $scope.contact.last_name.length === 0 || !$scope.contact.last_name.trim()) return;
    if(!$scope.contact.message || $scope.contact.message.length === 0 || !$scope.contact.message.trim()) return;

    $scope.msg = "";
    $scope.sending = true;
    $scope.error = false;
    $scope.success = false;

    $scope.msg = "Envoi en cours...";

    $http.post(__ENV.apiUrl + '/contact', {
      email: $scope.contact.email,
      first_name: $scope.contact.first_name,
      last_name: $scope.contact.last_name,
      message: $scope.contact.message,
    }).then(function(res){
      $scope.sending = false;
      $scope.success = true;
      $scope.msg = "Votre message a bien été envoyé ! Nous vous répondrons très rapidement.";
    }, function(error){
      $scope.sending = false;
      $scope.error = true;
      var status = error.status;
      if(status == 422) $scope.msg = "Certaines informations sont incorrectes.";
      else $scope.msg = "Un erreur est survenue, veuillez réessayez plus tard.";
    });

  }

});
