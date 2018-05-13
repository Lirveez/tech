<?php
/**
 * Created by PhpStorm.
 * User: Lirveez
 * Date: 11.05.2018
 * Time: 16:04
 */

require_once 'connections.php';
$link=mysqli_connect($host,$user,$password,$database)
or die("Ошибка".mysqli_error($link));
mysqli_set_charset($link,'utf8');
mysqli_query($link,"SET NAMES 'utf8'");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci'");

$firstname = $_POST['firstname'];
$surname = $_POST['surname'];
$patronomic = $_POST['patronomic'];
$spec = $_POST['spec'];
$skill = $_POST['skill'];
$exp = $_POST['exp'];
$diploma = $_POST['diploma'];
$epml = $_POST['empl'];
$salary = $_POST['salary'];
$kids = $_POST['kids'];
$birth = $_POST['birth'];
$address = $_POST['address'];
$work_time = $_POST['work_time'];
$branch_ID = $_POST['branch_ID'];
$id = $_POST['doctor_id'];
$query = "UPDATE  doctors  SET
 doctor_surname = '$surname',
 doctor_name ='$firstname',
 doctor_patronymic ='$patronomic',
 doctor_specialization ='$spec',
 doctor_skill_level ='$skill',
 experience ='$exp',
 diploma ='$diploma',
 employment_history ='$epml',
 salary ='$salary',
 amount_of_kids ='$kids',
 date_of_birth ='$birth',
 home_address ='$address',
 work_time ='$work_time',
 branch_ID ='$branch_ID'
WHERE  doctor_id ='$id' ";
$result = mysqli_query($link,$query) or die("Ошибка ".
    mysqli_error($link));
if($result){
    echo "<script> alert('Данные успешно обновлены');</script>";
    echo "<script> location.replace('../index.html');</script>";
    mysqli_close($link);
    exit();
}
mysqli_close($link);
?>