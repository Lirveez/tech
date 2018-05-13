<?php
/**
 * Created by PhpStorm.
 * User: Lirveez
 * Date: 13.05.2018
 * Time: 14:55
 */
echo "<span class='db'> Добавить данные</span> <br><form style=\"text-align: right\" action=\"../php/new.php\" method=\"post\">
        <div style=\"text-align: center\"><span class=\"db\"  >
            Пожалуйста, заполните форму</span></div>
        <div><span class=\"db\">
            Фамилия:<input name=\"surname\" placeholder=\"Матюшин\" type=\"text\"><br>
            </span></div>
        <span class=\"db\">
            Имя:<input name=\"firstname\" placeholder=\"Дмитрий\" type=\"text\"><br>
            </span>
        <span class=\"db\">
            Отчество:<input name=\"patronomic\" placeholder=\"Сергеевич\" type=\"text\"><br>
            </span>
        <span class=\"db\">
            Специализация:<input name=\"spec\" placeholder=\"Терапевт\" type=\"text\"><br>
            </span>
        <span class=\"db\">
            Квалификация:<input name=\"skill\" placeholder=\"Высшая\" type=\"text\"><br>
            </span>
        <span class=\"db\">
            Опыт работы:<input name=\"exp\" placeholder=\"10\" type=\"number\"><br>
            </span>
        <span class=\"db\">
            Диплом:<input name=\"diploma\" list=\"bool\"><br>
            <datalist id=\"bool\">
                <option value=\"+\">
                </option>
                <option value=\"-\"></option>
            </datalist>
            </span>
        <span class=\"db\">
            Стажировка:<input name=\"empl\" list=\"bool\"><br>
            </span>
        <span class=\"db\">
            Заработная плата:<input name=\"salary\" type=\"number\"
        min=\"0\"><br>
            </span>
        <span class=\"db\">
            Количество детей:<input name=\"kids\" type=\"number\"
                                    min=\"0\"><br>
            </span>
        <span class=\"db\">
            Дата рождения:<input name=\"birth\" type=\"date\"
        min=\"2018-21-03\"><br>
            </span>
        <span class=\"db\">
            Адрес:<input name=\"address\" type=\"text\"><br>
            </span>
        <span class=\"db\">
            Часы работы:<input name=\"work_time\" placeholder=\"9:00-12:00\" type=\"text\"><br>
            </span>
        <span class=\"db\">
            ID отделения:<input name=\"branch_ID\" ><br>
            </span>
        <div style=\"text-align: right\"><input type=\"submit\" value=\"Добавить врача\"></div>
    </form>";
?>