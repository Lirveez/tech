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
                $query = "SELECT branch_adress FROM adresses WHERE branch_ID='$str->branch_ID'";
                $res = mysqli_query($link,$query);
                $adress = mysqli_fetch_object($res);
                echo "<script>
                        function change(){
                        fill('".$str->doctor_surname."');
                        $('#surname').text(\"".$str->doctor_surname."\");
                        $('#name').text(\"".$str->doctor_name."\");
                        $('#patronymic').text(\"".$str->doctor_patronymic."\");
                        $('#spec').text(\"".$str->doctor_specialization."\");
                        $('#worktime').text(\"".$str->work_time."\");
                        $('#address').text(\"".$adress->branch_adress."\");
                        }
                        </script>
                <li hover='' onclick=\"change();\"); \">".$str->doctor_surname."</li>
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
