<?php 
session_start ();
require("../../header.php"); 
?>
<body>
<main>
        <article>  
<!--            -->
       
        <form  class="form-style-1" id="mainForm" autocomplete="off"   onsubmit="return add();" >
                    <fieldset>
                        <legend>
                                Дополнительная информация 
                        </legend>
                        <div style = "column-count: 1">
                        
                        <p><label for="receipt">Рецептурный отпуск</label>
                        <input type="checkbox" name = "receipt">
                        </p>
                        
                        <p><label for="expire">Годен до <span class="required">*</span> </label>
                        <input type="date" name ="date" required></p> 
                        
                        <p><label for="email">Почта</label>
                        <input type="email" name ="email" placeholder="example@domain.com" pattern = "/^[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}$/i">
                        </p>                      
                        
                        <p><label for="url">Ссылка на инструкцию</label>
                        <input type="url" name = "url"></p>
                       
                        </div>
                        
                </fieldset>
                        <p><input type="submit" value="Отправить"></p>
                        </form>
        <?php                
    if (!empty($_GET)) {
        $table ="<table border='2' id='table'>";
        $table .="<thead>";
            $table .="<th>Аптека</th>";
            $table .="<th>Адрес</th>";
            $table .="<th>Телефон</th>";
            $table .="<th>Название</th>";
            $table .="<th>Вид</th>";
            $table .="<th>Цена, &#128</th>";
            $table .="<th>Кол-во</th>";
            $table .="<th>Доза</th>";
            $table .="<th>Рецепт</th>";
            $table .="<th>e-mail</th>";
            $table .="<th>Инстр</th>";
        $table .="</thead>";
        $table .="</table>";
                
        echo $table;
    }
        ?>
        </article>
        <br>
    </main>

<?php require("../../footer.php"); ?>
</body>
</html>