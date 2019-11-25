<?php 
session_start ();
require("../../header.php"); 
$_SESSION["branch"] = $_GET["branch"];
$_SESSION["beds"] = $_GET["beds"];
$_SESSION["rooms"] = $_GET["rooms"];
$_SESSION["enterance"] = $_GET["enterance"];  // пишем в сессию данные из 2 формы
$_SESSION["branchphone"] = $_GET["branchphone"]; 
?>
<body>
<main>
<div class="container text-right"><p>Добро пожаловать, <?php echo $_SESSION['auth'][0];?><p>  
        <p><?php echo ($_COOKIE[$_SESSION[auth][0]] > 0) ? 'Вы заходили на сайт '.$_COOKIE[$_SESSION[auth][0]].' раз' : 'Вы впервые на сайте!' ?></p>      
        </div>
        <article>  
        <form  class="form-style-1" method="get" autocomplete="off" action="form2.php" >
                    <fieldset>
                        <legend>
                                Сведения о больнице 
                        </legend>
                        <div style = "column-count: 2" class="text-center">

                        <p><label for="hospital">Название Больницы<span class="required">*</span></label> 
                        <input type="text" name="hospital" autofocus required  value= "<?php echo isset($_SESSION['hospital']) ? $_SESSION['hospital'] : "";?>"></p>
                                               
                        <p><label for="address">Адрес<span class="required">*</span></label> 
                        <input type="text" name="address" required value= "<?php echo isset($_SESSION["address"]) ? $_SESSION["address"] : "";?>"></p>
                      
                        <p><label for="phone">Телефон приемного отделения</label>
                        <input type="text" name="phone" placeholder="Формат: +375-29-1234567" pattern="\+\d{3}-\d{2}-\d{7}" value= "<?php echo isset($_SESSION["phone"]) ? $_SESSION["phone"] : "";?>"></p>
                         
                        <p><label for="md">Главный врач<span class="required">*</span></label>
                        <input type="text" name="md" required placeholder="Иванов И. А." pattern="^[a-zA-Z-а-яА-Я]+\s[A-ZА-Я]\.\s[A-ZА-Я]\.$" value= "<?php echo isset($_SESSION["md"]) ? $_SESSION["md"] : "";?>"></p>
                        

                        </div>
                        
                        
                </fieldset>
                <div class="text-center">
                <p><input type="submit" value="Далее"></p>
                <p><input type="submit" formaction="purgatory.php" value="Отменить заполнение формы"></p>
                </div>
                        
                        

        
        </article>
        <br>
    </main>

    <?php require("../../footer.php"); ?>
</body>
</html>