<?php
require_once 'connections.php';
$link=mysqli_connect($host,$user,$password,$database)
    or die("Ошибка".mysqli_error($link));
mysqli_set_charset($link,'utf8');
mysqli_query($link,"SET NAMES 'utf8'");
mysqli_query($link,"SET CHARACTER SET 'utf8'");
mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci'");
$query = "SELECT * from doctors";
$result = mysqli_query($link,$query) or die("Ошибка ".
    mysqli_error($link));
$table = "<table border=1 width = '600px' align=center>";
$color="#FFFFFF";
$table .= "<tr bgcolor=".$color.">";
$table .= "<td >"."<b>Фамилия</b>"."</td>";
$table .= "<td >"."<b>Имя</b>"."</td>";
$table .= "<td >"."<b>Отчество</b>"."</td>";
$table .= "<td >"."<b>Специализация</b>"."</td>";
$table .= "<td >"."<b>Квалификация</b>"."</td>";
$table .= "<td >"."<b>Опыт</b>"."</td>";
$table .= "<td >"."<b>Наличие диплома</b>"."</td>";

$table .= "<td >"."<b>Стажировка</b>"."</td>";
$table .= "<td >"."<b>Зарплата</b>"."</td>";
$table .= "<td >"."<b>Количество детей</b>"."</td>";
$table .= "<td >"."<b>Дата рождения</b>"."</td>";
$table .= "<td >"."<b>Адрес</b>"."</td>";
$table .= "<td >"."<b>Время работы</b>"."</td>";
$table .= "<td >"."<b>ID отделения</b>"."</td>";
$table .= "</tr>";
$k=1;
while($row = mysqli_fetch_object($result)) {
    if($k%2==0)
        $color="#747AFF";
    else
        $color="#6EFF67";
    $k++;
    $table.="<tr bgcolor=".$color.">";
    $table .= "<td >".$row->doctor_surname."</td>";
    $table .= "<td >".$row->doctor_name."</td>";
    $table .= "<td >".$row->doctor_patronymic."</td>";
    $table .= "<td >".$row->doctor_specialization."</td>";
    $table .= "<td >".$row->doctor_skill_level."</td>";
    $table .= "<td >".$row->experience."</td>";
    $table .= "<td >".$row->diploma."</td>";
    $table .= "<td >".$row->employment_history."</td>";
    $table .= "<td >".$row->salary."</td>";
    $table .= "<td >".$row->amount_of_kids."</td>";
    $table .= "<td >".$row->date_of_birth."</td>";
    $table .= "<td >".$row->home_address."</td>";
    $table .= "<td >".$row->work_time."</td>";
    $table .= "<td >".$row->branch_ID."</td>";
    $table .= "</tr>";
}
$table .= "</table>";
echo $table;
?>
