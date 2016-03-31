var requirement=angular.module('languageexchange',[]);
requirement.controller('myrequirement',function($http,$scope,requirementservice){
    $scope.specificdata={};
    $scope.loading=true;
    //$scope.test={};

    requirementservice.getall().success(function(getalldata){
        $scope.allrequirements=getalldata;
        $scope.loading=false;
    });
    $scope.updatespecificdata=function(){
      $scope.loading=true;
      requirementservice.updatespecific($scope.specificdata).success(function(){
          $scope.specificrequirement=$scope.specificdata;
          $scope.loading=false;
      })
      .error(function(specificdata) {
          console.log($scope.specificdata);
      });
    };
    requirementservice.getspecific().success(function(mydata){
        $scope.getspecific=mydata;
        $scope.loading=true;
    })
    .error(function(mydata){
        console.log(mydata);
    });
});
requirement.factory('requirementservice',function ($http) {
return{
    //get all infomation of all users
    getall:function(){
        return $http.get('./requirement/getalloverallinfo');
    },
    //update specific info of users
    updatespecific:function(specificdata,id){
        return $http({
                    method: 'POST',
                    url: './requirement/edit/'+id,
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(specificdata)
                });
    },
    getspecific:function(id){
        return $http.get('./requirement/'+id);
    }
}
});


requirement.controller('modal',function($scope){

    $scope.showModal = false;
    $scope.toggleModal = function(){
    $scope.showModal = !$scope.showModal;
    };
});
requirement.directive('modaldialog', function () {
    return {
      template: '<div class="modal fade">' + 
          '<div class="modal-dialog">' + 
            '<div class="modal-content">' + 
              '<div class="modal-header">' + 
                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' + 
                '<h4 class="modal-title">{{ title }}</h4>' +
              '</div>' +
              '<div class="modal-body" ng-transclude></div>' +
            '</div>' + 
          '</div>' + 
        '</div>',
      restrict: 'E',
      transclude: true,
      replace:true,
      scope:true,
      link: function postLink(scope, element, attrs) {
        scope.title = attrs.title;

        scope.$watch(attrs.visible, function(value){
          if(value == true)
            $(element).modal('show');
          else
            $(element).modal('hide');
        });

        $(element).on('shown.bs.modal', function(){
          scope.$apply(function(){
            scope.$parent[attrs.visible] = true;
          });
        });

        $(element).on('hidden.bs.modal', function(){
          scope.$apply(function(){
            scope.$parent[attrs.visible] = false;
          });
        });
      }
    };
  });