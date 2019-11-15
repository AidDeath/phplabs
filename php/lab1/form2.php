<?php 
session_start ();

require("../../header.php"); 

if (!empty($_GET["drug"])){
$_SESSION["store_name"] = $_GET["store_name"];
$_SESSION["drug"] = $_GET["drug"];
$_SESSION["address"] = $_GET["address"];
$_SESSION["phone"] = $_GET["phone"]; //данные из формы 1 пишем в сессию был переход с 1 страницы
}

if (!empty($_GET["date"])){
$_SESSION["date"] = $_GET["date"];
$_SESSION["email"] = $_GET["email"];
$_SESSION["url"] = $_GET["url"];
if (!isset($_GET['receipt'])) unset($_SESSION["receipt"]);
if (isset($_GET['receipt'])) $_SESSION["receipt"] = $_GET["receipt"];   //данные из формы 3 пишем в сессию
}                                                                       //если был переход с 3 страницы
?>
<script>
function updateCount(val) {
   if (val == 101) {
    document.getElementById('drug_count').innerHTML=">100"; }
else {document.getElementById('drug_count').innerHTML=val;}
  }
</script>



<body>
<main>
        <article>  
       
        <form  class="form-style-1" id="mainForm" autocomplete="off"   action="form3.php" >
                    <fieldset>
                        <legend>
                                Инфо о препарате 
                        </legend>

                        <p><label for="drug_type">Тип препарата</label>
                        <select name="drug_type">
                        <option <?php if ($_SESSION['drug_type'] == 'Уколы для иньекций') echo ("selected");?>>
                                Уколы для иньекций
                         </option>
                         <option <?php if ($_SESSION['drug_type'] == 'Таблетки') echo ("selected");?>>
                                Таблетки
                         </option>
                         <option <?php if ($_SESSION['drug_type'] == 'Порошок') echo ("selected");?>>
                                Порошок
                         </option>
                         <option <?php if ($_SESSION['drug_type'] == 'Капли') echo ("selected");?>>
                                Капли
                         </option>
                         <option <?php if ($_SESSION['drug_type'] == 'Суспензия') echo ("selected");?>>
                                Суспензия
                         </option>
                         <option <?php if ($_SESSION['drug_type'] == 'Спрей') echo ("selected");?>>
                                Спрей
                         </option>
                        </select></p>

                        
                        <p><label for="price">Цена &#128<span class="required">*</span></label>
                        <input type="number" name ="price" required pattern="\d+.?\d{0,2}" value= "<?php echo isset($_SESSION["price"]) ? $_SESSION["price"] : "100";?>"> </p>
                        

                        <p><label for="count">Количество упаковок</label>  
                        <input type="range" name="drug_count"  min="1" max="101" step="1" value= "<?php echo isset($_SESSION["drug_count"]) ? $_SESSION["drug_count"] : "1";?>" onchange="updateCount(this.value);">
                        <span id="drug_count"><?php echo isset($_SESSION["drug_count"]) ? $_SESSION["drug_count"] : "1";?></span>
                        </p>                        
                        
                        <p><label for="dose">Дозировка</label> 
                            <br/>
                            <?php 
                                   if($_SESSION["dose"] == "Взрослая" || !isset ($_SESSION['dose'])) {
                                   echo '<input type="radio" name="dose" value="Взрослая" checked>Взрослая';
                                   echo '<input type="radio" name="dose" value="Детская">Детская';  }
                                   
                                   if($_SESSION["dose"] == "Детская") {
                                   echo '<input type="radio" name="dose" value="Взрослая">Взрослая';
                                   echo '<input type="radio" name="dose" value="Детская" checked>Детская'; }
                                   
                            ?>

                        </p> 
                        
                        </div>
                        
                </fieldset>
                        <p><input type="submit" value="Далее"></p>
                        <p><input type="submit" formaction="form1.php" value="Назад"></p>                
       </form>               
       </article>
        <br>
    </main>

<?php require("../../footer.php"); ?>
</body>
</html>