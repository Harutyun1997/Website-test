var app = angular.module('myApp', []);
app.controller('validateCtrl', function ($scope) {
    $scope.myFunction = function () {
        var arr = [];
        var str;
        var result;
        arr.push($scope.name, $scope.email, $scope.password);

        str = JSON.stringify(arr);
        // arr[] = $scope.name;
        var div, element, node;
        $.ajax({
            type: "POST",
            data: {name: str},// Сеарилизуем объект
            dataType: "html", //формат данных
            url: "create_account.php",
            cache: false,
            success: function (response) {
                result = search(response);
                if (result === "Good like") {
                    alert("Save me")
                }
                else {
                    div = document.getElementById("cont-email");
                    div.innerHTML = "";
                    element = document.createElement("span");
                    node = document.createTextNode(result);
                    element.appendChild(node);
                    div.appendChild(element);
                }
            }
        });
    };
});

function search(text) {
    var number;
    number = text.indexOf("Such mail exists");
    if (number !== -1) {
        text = text.slice(number);

    }
    else {
        number = text.indexOf("Good like");
        if (number !== -1) {
            text = text.slice(number);
        }
    }
    return text;
}

// var app = angular.module('myApp', []);
// app.controller('myCtrl', function ($scope) {
//     $scope.count = 0;
//     $scope.myFunction = function () {
//         $scope.count++;
//     }
// });