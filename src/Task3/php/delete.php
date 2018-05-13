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
$idis = mysqli_query($link,"Select doctor_id from doctors");

$surname = $_POST['surname'];
$query = "DELETE FROM doctors WHERE doctor_surname LIKE '$surname'";
mysqli_query($link,$query);
$result = mysqli_query($link,$query) or die("Ошибка ".
    mysqli_error($link));
if($result){
    echo "<span> Успешно</span>";
    mysqli_close($link);
    exit();
}
echo "<script> alert('Ошибка');</script>";
echo "<script> location.replace('../index.html');</script>";
mysqli_close($link);
?>