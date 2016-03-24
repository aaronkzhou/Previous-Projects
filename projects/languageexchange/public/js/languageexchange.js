/**
 * the upload method for languageexchange app
 */
var app = angular.module('myApp', []);

app.directive('myDirective', function(httpPostFactory) {
  return {
    restrict: 'A',
    link: function(scope, element, attr) {
      element.bind('change', function() {
        var formData = new FormData();
        formData.append('file', element[0].files[0]);

        // optional front-end logging 
        var fileObject = element[0].files[0];
        scope.fileLog = {
          'lastModified': fileObject.lastModified,
          'lastModifiedDate': fileObject.lastModifiedDate,
          'name': fileObject.name,
          'size': fileObject.size,
          'type': fileObject.type
        };
        scope.$apply();

        
        httpPostFactory('http://localhost/projects/languageexchange/public/image', formData, function (callback) {
            console.log(callback);
        });
        
      });

    }
  };
});

app.factory('httpPostFactory', function($http) {
  return function(file, data, callback) {
    $http({
      url: file,
      method: "POST",
      data: data,
      headers: {
        'Content-Type': undefined
      }
    }).success(function(response) {
      callback(response);
    });
  };
});
