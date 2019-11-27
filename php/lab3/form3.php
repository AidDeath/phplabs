<?php 
session_start ();

$_SESSION["branch"] = $_GET["branch"];
$_SESSION["beds"] = $_GET["beds"];
$_SESSION["rooms"] = $_GET["rooms"];
$_SESSION["enterance"] = $_GET["enterance"]; // данные из формы 2 пишем в сессию
$_SESSION["branchphone"] = $_GET["branchphone"]; 
require("../../header.php"); 
?>
<body>
<main>
<div class="container text-right"><p>Добро пожаловать, <?php echo $_SESSION['login'];?><p>  
        </div>
        <article>  
<!--            -->
       
        <form  class="form-style-1" id="mainForm" autocomplete="off"   action="" >
                    <fieldset>
                        <legend>
                                Сведения о враче 
                        </legend>
                        <div style = "column-count: 2" class="text-center">
                        
                        <p><label for="doctor">Фамилия Имя Отчество<span class="required">*</span></label> 
                        <input type="text" name="doctor" autofocus required pattern="^[a-zA-Zа-яА-Я-]+\s[a-zA-Zа-яА-Я]+\s[a-zA-Zа-яА-Я]+" value= "<?php echo isset($_SESSION['doctor']) ? $_SESSION['doctor'] : "";?>"></p>

                        <p><label for="category">Врач высшей категории</label>
                        <input type="checkbox" name = "category" value = "LOL i'm a parameter" <?php echo isset($_SESSION["category"]) ? "checked" : ""?> ></p>
                        
                        <p><label for="date">Дата рождения <span class="required">*</span> </label>
                        <input type="date" name ="date" required value= <?php echo isset($_SESSION["date"])? $_SESSION["date"] : "1991-01-01"?>></p> 
                        
                        <p><label for="email">Адрес эл. почты</label>
                        <input type="email" name ="email" placeholder="example@domain.com"  value= <?php echo isset($_SESSION["email"])? $_SESSION["email"] : ""?>> 
                        </p>                      
                        
                        <p><label for="url">Профиль на cooldoctors.com</label>
                        <input type="url" name = "url" value=<?php echo isset($_SESSION["url"])? $_SESSION["url"]: ""?>></p>
                       
                        </div>
                        
                </fieldset>
                <div class="text-center">
                        <p><input type="submit" value="Отправить" formaction="purgatory.php"></p>
                        <p><input type="submit" formaction="form2.php" value="Назад"></p>  
                </div>
                        </form>
        
        </article>
        <br>
    </main>

<?php require("../../footer.php"); ?>
</body>
</html>

