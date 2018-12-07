var app = angular.module('myLogin', []);
app.controller('validateLogin', function ($scope) {
    $scope.myFunction = function () {
        var arr = [];
        var str;
        var result;
        arr.push($scope.email, $scope.password);
        str = JSON.stringify(arr);
        // arr[] = $scope.name;
        var div, element, node;

        $.ajax({
            type: "POST",
            data: {name: str},// Сеарилизуем объект
            dataType: "html", //формат данных
            url: "Check_login.php",
            cache: false,
            success: function (response) {
                result = search(response);
                if (result === "Yes to men") {
                    alert("Good")
                }
                else {
                    div = document.getElementById("error-login");
                    div.innerHTML = "";
                    element = document.createElement("span");
                    element.setAttribute("class", "error");
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
    number = text.indexOf("Yes to men");
    if (number !== -1) {
        text = text.slice(number);

    }
    else {
        number = text.indexOf("password or login is not correct");
        if (number !== -1) {
            text = text.slice(number);
        }
    }
    return text;
}

