<?php 
session_start ();
require("../../header.php"); 
$_SESSION["store_name"] = $_GET["store_name"];
$_SESSION["drug"] = $_GET["drug"];
$_SESSION["address"] = $_GET["address"];
$_SESSION["phone"] = $_GET["phone"];

?>
<body>
<main>
        <article>  
<!--            -->
       
        <form  class="form-style-1" id="mainForm" autocomplete="off"   action="form3.php" >
                    <fieldset>
                        <legend>
                                Инфо о препарате 
                        </legend>

                        <p><label for="drug_type">Тип препарата</label>
                        <select name="drug_type" value= "<?php echo isset($_SESSION["drug_type"]) ? $_SESSION["drug_type"] : "Форма лекарства";?>">
                        <option>
                                Уколы для иньекций
                         </option>
                         <option>
                                Таблетки
                         </option>
                         <option>
                                Порошок
                         </option>
                         <option>
                                Капли
                         </option>
                        </select></p>

                        
                        <p><label for="price">Цена &#128<span class="required">*</span></label>
                        <input type="number" name ="price" required value= "<?php echo isset($_SESSION["price"]) ? $_SESSION["price"] : "100";?>"> </p>
                        
                        <p><label for="count">Количество упаковок</label>  
                        <input type="range" name="drug_count" min="1" max="101" step="1" value= "<?php echo isset($_SESSION["drug_count"]) ? $_SESSION["drug_count"] : "1";?>" onchange="">
                        <span name="drug_count" value =1>1</span>
                        </p>                        
                        
                        <p><label for="dose">Дозировка</label> 
                            <input type="radio" name="dose" value="Взрослая" checked>Взрослая
                            <input type="radio" name="dose" value="Детская">Детская
                            <br/>
                        </p> 
                        
                        </div>
                        
                </fieldset>
                        <p><input type="submit" value="Далее (в процессе)"></p>
                        <p><input type="submit" formaction="form1.php" value="Назад"></p>                
       </form>               
       </article>
        <br>
    </main>

<?php require("../../footer.php"); ?>
</body>
</html>