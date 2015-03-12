var app = angular.module('exam', []);

app.controller('ClassController', function($scope, $http){
    var self = this;
    self.currentClass = null;
    self.newClass = {};

    $http.get('ajax.php?q=classes').
        success(function(data, status, headers, config) {
            self.classesList = data;
        }).
        error(function(data, status, headers, config) {
            alert("Impossible de récupérer la liste des classes");
            self.classesList = [];
        });

    self.showStudents = function(currentClass){
        self.currentClass = currentClass;
    };

    self.studentsList = function(){
        return {};
    };

    self.addClass = function(){
        $http.get('ajax.php?q=addClass&c='+self.newClass.name);
        self.classesList[self.newClass.name] = self.newClass;
        self.newClass = {};
    };

    self.removeClass = function(rmClass){
        delete self.classesList[rmClass];
        $http.get('ajax.php?q=removeClass&c='+rmClass);
    };
});

app.controller('StudentController', function($scope, $http){
    var self = this;
});
