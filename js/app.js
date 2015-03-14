var app = angular.module('exam', []);

app.controller('ClassController', function($scope, $http){
    var self = this;
        
    var isVisible = true;
    var isNotVisible = true;
    self.currentClass = null;
    self.newClass = {};
    
    self.seeState = function() {
        if(isNotVisible == false)
        {return !isVisible;}
        else
        {return isVisible;}
    }
    
    self.changeState = function() {
        isNotVisible = !isVisible;
        return isNotVisible;
    }
    
    self.seeStateInverse = function() {
        return isNotVisible;
    }
        

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
    
    self.editClass = function(name, id){
        var data = self.newName;
        $http.post('ajax.php?q=editClass&c='+name+'&id='+id);
    };


    self.removeClass = function(rmClass){
        delete self.classesList[rmClass];
        $http.get('ajax.php?q=removeClass&c='+rmClass);
    };
});

app.controller('StudentController', function($scope, $http){
    var self = this;
});
