<?php
/*
*
 * Created by PhpStorm.
 * User: Lirveez
 * Date: 11.05.2018
 * Time: 18:35
 */

echo  "<span class='db'> Одиночный вывод данных</span> <br><style>.suggestionsBox {
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
            $.post(\"../php/search.php\", {queryString: \"\"+inputString+\"\"},
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
    setTimeout(\"$('#suggestions').hide();\", 200);
}

</script><span>Введите Фамилию</span>
    <input style=\"width: 200px\" type=\"text\" value=\"\"
           id=\"inputString\" onkeyup=\"lookup(this.value);\" onblur=\"fill();\" /><br>


    <div class=\"info\">
        <div class=\"suggestionsBox\" id=\"suggestions\" style=\"display: none;\">
            <div class=\"suggestionList\" id=\"autoSuggestionsList\">
            </div>
        </div>
       
    <span >Фамилия:</span><span id=\"surname\"></span><br>
    <span >Имя:</span><span id=\"name\"></span><br>
    <span >Отчество:</span><span id=\"patronymic\"></span><br>
    <span >Специализация:</span><span id=\"spec\"></span><br>
    <span >Рабочее время:</span><span id=\"worktime\"></span><br>
    <span >Адрес:</span><span id=\"address\"></span><br>
    </div>";
?>