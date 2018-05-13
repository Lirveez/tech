<?php
/*
*
 * Created by PhpStorm.
 * User: Lirveez
 * Date: 11.05.2018
 * Time: 18:35
 */

echo  "<span class='db'> Удалить данные</span> <br><style>.suggestionsBox {
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
            $.post(\"../php/deletesearch.php\", {queryString: \"\"+inputString+\"\"},
                function(data){
                if(data.length >0) {
                    $('#suggestions').show();
                    $('#autoSuggestionsList').html(data);

                }
            });
        }
    } 

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
       
    </div>";
?>