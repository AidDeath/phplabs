<?php 
session_start ();

$_SESSION["drug_type"] = $_GET["drug_type"];
$_SESSION["drug_count"] = $_GET["drug_count"];
$_SESSION["price"] = $_GET["price"];
$_SESSION["dose"] = $_GET["dose"]; // данные из формы 1 пишем в сессию

require("../../header.php"); 
?>
<body>
<main>
        <article>  
<!--            -->
       
        <form  class="form-style-1" id="mainForm" autocomplete="off"   action="" >
                    <fieldset>
                        <legend>
                                Дополнительная информация 
                        </legend>
                        <div style = "column-count: 1">
                        
                        <p><label for="receipt">Рецептурный отпуск</label>
                        <input type="checkbox" name = "receipt" value = "LOL i'm a parameter" <?php echo isset($_SESSION["receipt"]) ? "checked" : ""?> ></p>
                        
                        <p><label for="expire">Годен до <span class="required">*</span> </label>
                        <input type="date" name ="date" required value= <?php echo isset($_SESSION["date"])? $_SESSION["date"] : "2019-11-14"?>></p> 
                        
                        <p><label for="email">Почта</label>
                        <input type="email" name ="email" placeholder="example@domain.com"  value= <?php echo isset($_SESSION["email"])? $_SESSION["email"] : ""?>> 
                        </p>                      
                        
                        <p><label for="url">Ссылка на инструкцию</label>
                        <input type="url" name = "url" value=<?php echo isset($_SESSION["url"])? $_SESSION["url"]: "http://"?>></p>
                       
                        </div>
                        
                </fieldset>
                        <p><input type="submit" value="Отправить (in work)"></p>
                        <p><input type="submit" formaction="form2.php" value="Назад"></p>  
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