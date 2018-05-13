<?php
require_once '../php/connections.php';
$link=mysqli_connect($host,$user,$password,$database)
or die("Ошибка".mysqli_error($link));
mysqli_set_charset($link,'utf8');
mysqli_query($link,"SET NAMES 'utf8'");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci'");

if(isset($_POST['queryString'])) {
    $queryString = $_POST['queryString'];
    if(strlen($queryString) > 0) {

        $query = "SELECT doctor_surname,doctor_name,doctor_patronymic,doctor_specialization,work_time,branch_ID 
FROM doctors
 WHERE doctor_surname LIKE '$queryString%' LIMIT 10";
        $result = mysqli_query($link,$query);
        if($result) {
            // Пока в полученном ресурсе есть результирующая информация проходимся   по всему ресурсу вытягивая обьект - результат  .
            while ($str = mysqli_fetch_object($result)) {
                echo "<script>
                        function change(){
                        fill('".$str->doctor_surname."');
                        $.ajax({
        url:     \"../php/delete.php\", //url страницы (action_ajax_form.php)
        data: \"surname=".$str->doctor_surname."\",
        type: \"POST\",
        success: function(response) { //Данные отправлены успешно
            result = response;
            $('#resultd').html(result);
        },
        error: function(response) { // Данные не отправлены
            $('#resultd').html('Ошибка. Данные не отправлены.');
        }
                        });
                        alert(\"Данные удалены\");
                        }
                        </script>
                <li hover='' onclick=\"change();\">".$str->doctor_surname."</li>
                <div id=\"resultd\"></div>
                        ";
            }

        } else {
            echo 'ERROR: There was a problem with the query.';
        }
    } else {
        // Ничего не делаем.
    } // Это queryString.
} else {
    echo 'There should be no direct access to this script!';
}
?>
