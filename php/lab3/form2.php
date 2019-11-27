<?php 
session_start ();

require("../../header.php"); 

if (!empty($_GET["md"])){
$_SESSION["hospital"] = $_GET["hospital"];
$_SESSION["md"] = $_GET["md"];
$_SESSION["address"] = $_GET["address"];
$_SESSION["phone"] = $_GET["phone"]; //данные из формы 1 пишем в сессию если был переход с 1 страницы
}

if (!empty($_GET["date"])){
$_SESSION["date"] = $_GET["date"];
$_SESSION["email"] = $_GET["email"];
$_SESSION["url"] = $_GET["url"];
$_SESSION["doctor"] = $_GET["doctor"];
if (!isset($_GET['category'])) unset($_SESSION["category"]);
if (isset($_GET['category'])) $_SESSION["category"] = $_GET["category"];   //данные из формы 3 пишем в сессию
}                                                                       //если был переход с 3 страницы

?>
<script>
function updateCount(val) {
   if (val == 101) {
    document.getElementById('beds').innerHTML=">100"; }
else {document.getElementById('beds').innerHTML=val;}
  }
</script>



<body>
<main>
<div class="container text-right"><p>Добро пожаловать, <?php echo $_SESSION['auth'][0];?><p>  
        <p><?php echo ($_COOKIE[$_SESSION[auth][0]] > 0) ? 'Вы заходили на сайт '.$_COOKIE[$_SESSION[auth][0]].' раз' : 'Вы впервые на сайте!' ?></p>      
        </div>
        <article>  
       
        <form  class="form-style-1" id="mainForm" autocomplete="off"   action="form3.php" >
                    <fieldset>
                        <legend>
                               Отделения
                        </legend>
                        <div style = "column-count: 2" class="text-center">

                        <p><label for="branch">Тип препарата</label>
                        <select name="branch">
                        <option <?php if ($_SESSION['branch'] == 'Хирургия') echo ("selected");?>>
                                Хирургия
                         </option>
                         <option <?php if ($_SESSION['branch'] == 'Терапия') echo ("selected");?>>
                                Терапия
                         </option>
                         <option <?php if ($_SESSION['branch'] == 'Реанимация') echo ("selected");?>>
                                Реанимация
                         </option>
                         <option <?php if ($_SESSION['branch'] == 'Инфекционное') echo ("selected");?>>
                                Инфекционное
                         </option>
                         <option <?php if ($_SESSION['branch'] == 'Урология') echo ("selected");?>>
                                Урология
                         </option>
                         <option <?php if ($_SESSION['branch'] == 'Нефрология') echo ("selected");?>>
                                Нефрология
                         </option>
                        </select></p>

                        
                        <p><label for="rooms">Количество палат<span class="required">*</span></label>
                        <input type="number" name ="rooms" required value= "<?php echo isset($_SESSION["rooms"]) ? $_SESSION["rooms"] : "10";?>"> </p>
                        

                        <p><label for="beds">Количество койко-мест</label>  
                        <input type="range" name="beds"  min="4" max="101" step="1" value= "<?php echo isset($_SESSION["beds"]) ? $_SESSION["beds"] : "1";?>" onchange="updateCount(this.value);">
                        <span id="beds"><?php echo isset($_SESSION["beds"]) ? $_SESSION["beds"] : "4";?></span>
                        </p>        
                        <br>                
                        
                        <p><label for="enterance">Отдельный вход</label> 
                            <?php 
                                   if($_SESSION["enterance"] == "Есть" || !isset ($_SESSION['enterance'])) {
                                   echo '<input type="radio" name="enterance" value="Есть" checked>Есть';
                                   echo '<input type="radio" name="enterance" value="Нет">Нет';  }
                                  
                                   if($_SESSION["enterance"] == "Нет") {
                                   echo '<input type="radio" name="enterance" value="Есть">Есть';
                                   echo '<input type="radio" name="enterance" value="Нет" checked>Нет'; }
                                   
                            ?>

                        </p> 

                        <p><label for="branchphone">Телефон отделения</label>
                        <input type="text" name="branchphone" placeholder="Формат: +375-29-1234567" pattern="\+\d{3}-\d{2}-\d{7}" value= "<?php echo isset($_SESSION["branchphone"]) ? $_SESSION["branchphone"] : "";?>"></p>
                        
                        </div>
                        
                </fieldset>

                    <div class="text-center">
                        <p><input type="submit" value="Далее"></p>
                        <p><input type="submit" formaction="form1.php" value="Назад"></p>   
                    </div>             
       </form>               
       </article>
        <br>
    </main>

<?php require("../../footer.php"); ?>
</body>
</html>