
window.onscroll = function () {
    var scrolled = window.pageYOffset || document.documentElement.scrollTop;
    if (scrolled > 10) {
        document.getElementById('click').style.opacity = "1";
    }
    else {
        document.getElementById('click').style.opacity = "0";
    }
};


$(function () {
    $('form').submit(function () {
        var formIsValid = true;
        var name = document.getElementById("name").value;
        var comment = document.getElementById("comment").value;

        var arr = [];
        if (name === "") {
            document.getElementById("nameErr").innerHTML = "Напишите имя";
            formIsValid = false;
        }
        else {
            document.getElementById("nameErr").innerHTML = "";
        }
        if (comment === "") {
            document.getElementById("commentErr").innerHTML = "Напишите комент";
            formIsValid = false;
        }
        else {
            document.getElementById("commentErr").innerHTML = "";
        }

        if (formIsValid) {
            var str;
            var obj = [];
            arr.push(name, comment);
            str = JSON.stringify(arr);
            var element, container, para, node, com, coment, date, dateCom;
            $.ajax({
                type: "POST",
                data: {name: str},// Сеарилизуем объект
                dataType: "html", //формат данных
                url: "index.php",
                cache: false,
                success: function (response) { //Данные отправлены успешно
                    obj = JSON.parse(search(response));
                    obj.forEach(function (person) {
                        element = document.getElementById("com");
                        container = document.createElement("div");
                        container.setAttribute("class", "container-com");
                        date = document.createElement("p");
                        date.setAttribute("class", "date-com");
                        dateCom = document.createTextNode(person["data"]);
                        date.appendChild(dateCom);
                        para = document.createElement("p");
                        para.setAttribute("class", "name");
                        node = document.createTextNode(person["name"]);
                        para.appendChild(node);
                        com = document.createElement("p");
                        com.setAttribute("class", "com-coment");
                        coment = document.createTextNode(person["comment"]);
                        com.appendChild(coment);

                        para.appendChild(node);

                        element.appendChild(container);
                        container.appendChild(date);
                        container.appendChild(para);
                        container.appendChild(com);
                    })

                },
                error: function (response) { // Данные не отправлены
                    alert('Ошибка. Данные не отправлены.');
                }
            });
        }
        return false;
    });
});

function search(text) {
    text = text.slice(2004);
    return text;

}
