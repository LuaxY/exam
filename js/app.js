var app = angular.module('exam', []);

app.controller('ClassController', function($scope, $http){
    var self = this;

    $http.get('ajax.php?q=classes').
        success(function(data, status, headers, config) {
            self.classes = data;
        }).
        error(function(data, status, headers, config) {
            alert("Impossible de récupérer la liste des classes");
            self.classes = [];
        });
});

app.controller('StudentController', function($scope, $http){
    var self = this;

    $http.get('ajax.php?q=students&c=Bachelor 1').
        success(function(data, status, headers, config) {
            self.students = data;
        }).
        error(function(data, status, headers, config) {
            alert("Impossible de récupérer la liste des classes");
            self.students = [];
        });

});
