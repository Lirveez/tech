<?php
/**
 * Created by PhpStorm.
 * User: Lirveez
 * Date: 11.05.2018
 * Time: 16:04
 */
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

        $query = "SELECT * FROM doctors
 WHERE doctor_surname LIKE '$queryString%' LIMIT 10";
        $result = mysqli_query($link,$query);
        if($result) {
            while ($str = mysqli_fetch_object($result)) {
                  echo "<script>
                        function change(){
                        fill('".$str->doctor_surname."');
     
                        document.getElementById(\"sur\").value = \"".$str->doctor_surname."\";
                        document.getElementById(\"name\").value = \"".$str->doctor_name."\";
                        document.getElementById(\"patr\").value = \"".$str->doctor_patronymic."\";
                        document.getElementById(\"spec\").value = \"".$str->doctor_specialization."\";
                        document.getElementById(\"skill\").value = \"".$str->doctor_skill_level."\";
                        document.getElementById(\"work\").value = \"".$str->experience."\";
                        if ('".$str->diploma."'=='+'){
                          document.getElementById(\"diploma\").value = \"+\";
                          }
                          else 
                          document.getElementById(\"diploma\").value = \"-\";
                        if ('".$str->employment_history."'=='+'){
                          document.getElementById(\"empl\").value = \"+\";
                          }
                        else
                        document.getElementById(\"empl\").value = \"-\";
                        document.getElementById(\"salary\").value = ".$str->salary.";
                        document.getElementById(\"kids\").value = \"".$str->amount_of_kids."\";
                        document.getElementById(\"dateb\").value = \"".$str->date_of_birth."\";
                        document.getElementById(\"home\").value = \"".$str->home_address."\";
                        document.getElementById(\"worktime\").value = \"".$str->work_time."\";
                        document.getElementById(\"branchid\").value = \"".$str->branch_ID."\";
                        document.getElementById(\"id\").value = ".$str->doctor_ID.";
                        }
                        </script>
                <li hover='' onclick=\"change();\">".$str->doctor_surname."</li>
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