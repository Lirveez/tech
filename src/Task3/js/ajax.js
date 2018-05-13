function allElements(){
    $.ajax({
        url:     "../php/all.php", //url страницы (action_ajax_form.php)
        success: function(response) { //Данные отправлены успешно
            result = response;
            $('#result_form').html(result);
        },
        error: function(response) { // Данные не отправлены
            $('#result_form').html('Ошибка. Данные не отправлены.');
        }
    });
}

function searchElement(){
    $.ajax({
        url:     "../php/searchLayout.php", //url страницы (action_ajax_form.php)
        success: function(response) { //Данные отправлены успешно
            result = response;
            $('#result_form').html(result);
        },
        error: function(response) { // Данные не отправлены
            $('#result_form').html('Ошибка. Данные не отправлены.');
        }
    });
}
function newElement(){
    $.ajax({
        url:     "../php/newLayout.php", //url страницы (action_ajax_form.php)
        success: function(response) { //Данные отправлены успешно
            result = response;
            $('#result_form').html(result);
        },
        error: function(response) { // Данные не отправлены
            $('#result_form').html('Ошибка. Данные не отправлены.');
        }
    });
}
function change(){
    $.ajax({
        url:     "../php/change.php", //url страницы (action_ajax_form.php)
        success: function(response) { //Данные отправлены успешно
            result = response;
            $('#result_form').html(result);
        },
        error: function(response) { // Данные не отправлены
            $('#result_form').html('Ошибка. Данные не отправлены.');
        }
    });
}
function del(){
    $.ajax({
        url:     "../php/delLayout.php", //url страницы (action_ajax_form.php)
        success: function(response) { //Данные отправлены успешно
            result = response;
            $('#result_form').html(result);
        },
        error: function(response) { // Данные не отправлены
            $('#result_form').html('Ошибка. Данные не отправлены.');
        }
    });
}