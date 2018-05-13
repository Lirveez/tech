<?php
/**
 * Created by PhpStorm.
 * User: Lirveez
 * Date: 13.05.2018
 * Time: 15:20
 */
echo "<span class='db'> Изменить данные</span> <br><style>.suggestionsBox {
        position: relative;
        left:40px;
        width: 200px;
        background-color: #ffffff;
        border: 2px solid #ffffff;
        color: black;
    }
.info{
            text-align: left;
            padding-left: 42%;
            font-style: italic;
        }
    .suggestionList {
        margin: 0px;
        padding: 0px;
    }

    .suggestionList li {
        margin: 0px 0px 3px 0px;
        padding: 3px;
        cursor: pointer;
    }

    .suggestionList li:hover {
        background-color: white;
    }</style><script>
function lookup(inputString) {
        if(inputString.length == 0) {
            // Hide the suggestion box.
            $('#suggestions').hide();
        } else {
            $.post(\"../php/change.php\", {queryString: \"\"+inputString+\"\"},
                function(data){
                if(data.length >0) {
                    $('#suggestions').show();
                    $('#autoSuggestionsList').html(data);

                }
            });
        }
    } // lookup

function fill(thisValue) {
    $('#inputString').val(thisValue);
    setTimeout(\"$('#suggestions') . hide();\", 200);
}

</script><span>Введите Фамилию</span>
    <input style=\"width: 200px\" type=\"text\" value=\"\"
           id=\"inputString\" onkeyup=\"lookup(this.value);\" onblur=\"fill();\" /><br>


    <div class=\"info\">
        <div class=\"suggestionsBox\" id=\"suggestions\" style=\"display: none;\">
            <div class=\"suggestionList\" id=\"autoSuggestionsList\">
            </div>
        </div>
       
    
    </div>
    <form style=\"text-align: right\" action=\"../php/replace.php\" method=\"post\">
        <div style=\"text-align: center\"></div>
        <div><span class=\"db\">
            Фамилия:<input id=\"sur\" name=\"surname\" placeholder=\"Матюшин\" type=\"text\"><br>
            </span></div>
        <span class=\"db\">
            Имя:<input id=\"name\" name=\"firstname\" placeholder=\"Дмитрий\" type=\"text\"><br>
            </span> 
        <span class=\"db\">
            Отчество:<input id=\"patr\" name=\"patronomic\" placeholder=\"Сергеевич\" type=\"text\"><br>
            </span>
        <span class=\"db\">
            Специализация:<input id=\"spec\" name=\"spec\" placeholder=\"Терапевт\" type=\"text\"><br>
            </span>
        <span class=\"db\">
            Квалификация:<input id=\"skill\" name=\"skill\" placeholder=\"Высшая\" type=\"text\"><br>
            </span>
        <span class=\"db\">
            Опыт работы:<input id=\"work\" name=\"exp\" placeholder=\"10\" type=\"number\"><br>
            </span>
        <span class=\"db\">
            Диплом:<input id=\"diploma\" name=\"diploma\" list=\"bool\"><br>
            <datalist id=\"bool\">
                <option value=\"+\">
                </option>
                <option value=\"-\"></option>
            </datalist>
            </span>
        <span class=\"db\">
            Стажировка:<input id=\"empl\" name=\"empl\" list=\"bool\"><br>
            </span>
        <span class=\"db\">
            Заработная плата:<input id=\"salary\" name=\"salary\" type=\"number\"
        min=\"0\"><br>
            </span>
        <span class=\"db\">
            Количество детей:<input id=\"kids\" name=\"kids\" type=\"number\"
                                    min=\"0\"><br>
            </span>
        <span class=\"db\">
            Дата рождения:<input id=\"dateb\" name=\"birth\" type=\"date\"
        min=\"2018-21-03\"><br>
            </span>
        <span class=\"db\">
            Адрес:<input id=\"home\" name=\"address\" type=\"text\"><br>
            </span>
        <span class=\"db\">
            Часы работы:<input id=\"worktime\" name=\"work_time\" placeholder=\"9-12\" type=\"text\"><br>
            </span>
        <span class=\"db\">
            ID отделения:<input id=\"branchid\" name=\"branch_ID\" ><br>
            </span>
        <div style=\"text-align: right\"><input type=\"submit\" value=\"Обновить данные\">
        </div>
        <input style=\"visibility: hidden\" id=\"id\" name=\"doctor_id\" type=\"number\">
    </form>";
?>