var app = angular.module('exam', []);

var classes = {
    "classes": [
        "Bachelor 1",
        "Bachelor 2",
        "Bachelor 3",
        "Expert 1",
        "Expert 2",
    ]
};

app.controller('ClassController', function(){
    this.classes = classes.classes;
});
