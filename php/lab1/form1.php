<?php 
session_start ();
require("../../header.php"); 
$_SESSION["drug_type"] = $_GET["drug_type"];
$_SESSION["drug_count"] = $_GET["drug_count"];
$_SESSION["price"] = $_GET["price"];
$_SESSION["dose"] = $_GET["dose"];
?>
<body>
<main>
        <article>  
        <form  class="form-style-1" method="get" autocomplete="off" onsubmit="form2.php" action="form2.php" >
                    <fieldset>
                        <legend>
                                Наличие лекарств в аптеках 
                        </legend>
                        <div style = "column-count: 1">

                        <p><label for="store_name">Название аптеки<span class="required">*</span></label> 
                        <input type="text" name="store_name"  autofocus required value= "<?php echo isset($_SESSION["store_name"]) ? $_SESSION["store_name"] : "";?>"></p>
                                               
                        <p><label for="address">Адрес<span class="required">*</span></label> 
                        <input type="text" name="address" required value= "<?php echo isset($_SESSION["address"]) ? $_SESSION["address"] : "";?>"></p>
                      
                        <p><label for="phone">Телефон</label>
                        <input type="text" name="phone" placeholder="Формат: +375-29-1234567" pattern="\+\d{3}-\d{2}-\d{7}" value= "<?php echo isset($_SESSION["phone"]) ? $_SESSION["phone"] : "";?>"></p>
                         
                        <p><label for="drug">Препарат<span class="required">*</span></label>
                        <input type="text" name="drug" required value= "<?php echo isset($_SESSION["drug"]) ? $_SESSION["drug"] : "";?>"></p>

                        </div>
                        
                </fieldset>
                        <p><input type="submit" value="Далее"></p>
                        <p><button type="reset" value="Отмена (in work)"></p>
        </form>
        </article>
        <br>
    </main>

    <?php require("../../footer.php"); ?>
</body>
</html>