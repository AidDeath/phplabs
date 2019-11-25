<?php 
   require("../../header.php");
   session_start(); 
    
   function fill($arg){ 
    global $table;
    global $data;
    $table ="<table border='2'>";
    $table .="<thead>";
        $table .="<th>Больница</th>";
        $table .="<th>Глав. врач</th>";
        $table .="<th>Адрес</th>";
        $table .="<th>Тел.</th>";
        $table .="<th>Отделение</th>";
        $table .="<th>Кроватей</th>";
        $table .="<th>Палат</th>";
        $table .="<th>Отд. вход</th>";
        $table .="<th>Тел. Отд.</th>";
        $table .="<th>e-mail</th>";
        $table .="<th>Зав. Отд</th>";
        $table .="<th>Дата рожд</th>";
        $table .="<th>URL</th>";
        $table .="<th>Категория</th>";
    $table .="</thead>";
   $i=$arg;
    while($data[$i]){
        $table .="<tr>";
        $table .="<td>".$data[$i][0]."</td>";
        $table .="<td>".$data[$i][1]."</td>";
        $table .="<td>".$data[$i][2]."</td>";
        $table .="<td>".$data[$i][3]."</td>";
        $table .="<td>".$data[$i][4]."</td>";
        $table .="<td>".$data[$i][5]."</td>";
        $table .="<td>".$data[$i][6]."</td>";
        $table .="<td>".$data[$i][7]."</td>";
        $table .="<td>".$data[$i][8]."</td>";
        $table .="<td>".$data[$i][9]."</td>";
        $table .="<td>".$data[$i][10]."</td>";
        $table .="<td>".$data[$i][11]."</td>";
        $table .="<td>".$data[$i][12]."</td>";
        $data[$i][13] = (!empty($data[$i][13])) ? "Высш" : "Обычн.";
        $table .="<td>".$data[$i][13]."</td>";
        $table .="</tr>";
    $i++;
    }
    $table .="</table>";
                
    echo $table;
    }
    ?>   
    
    <body>
    <main>
    <div class="container text-right"><p>Добро пожаловать, <?php echo $_SESSION['auth'][0];?><p>  
        <p><?php echo ($_COOKIE[$_SESSION[auth][0]] > 0) ? 'Вы заходили на сайт '.$_COOKIE[$_SESSION[auth][0]].' раз' : 'Вы впервые на сайте!' ?></p>      
        </div>
    <h1>Поиск данных</h1>
 <div >
    <?php                
                    if (!is_NULL($_GET)){
                        $file = "/srv/http/file.txt";										
                        $h_File = fopen($file, 'r');
                        while(!feof($h_File)) $dataall[] = unserialize(fgets($h_File));

                        if ($_GET['lookfor'] == 'subj') {
                            foreach($dataall as $current){
                                if (!(strpos($current[0],$_GET['str']) === false)) $data[] = $current;
                            }
                        }
                        if ($_GET['lookfor'] == 'head') {
                            foreach($dataall as $current){
                                if (!(strpos($current[1],$_GET['str']) === false)) $data[] = $current;
                            }
                        }
                        if ($_GET['lookfor'] == 'iscat') {
                            foreach($dataall as $current){
                                if (strpos($current[13],"parameter")) $data[] = $current;
                            }
                        }
                        if ($_GET['lookfor'] == 'addr') {
                            foreach($dataall as $current){
                                if (!(strpos($current[2],$_GET['str']) === false)) $data[] = $current;
                            }
                        }
                        
                        fill(0);
                        fclose($h_File);
                    }
 
					
        ?>

        <form action="search.php">
        <select name="lookfor">
            <option value="subj" <?php if ($_GET['lookfor'] == 'subj') echo ("selected");?>>Название больницы</option>
            <option value="head" <?php if ($_GET['lookfor'] == 'head') echo ("selected");?>>Глав. врач</option>
            <option value="iscat" <?php if ($_GET['lookfor'] == 'iscat') echo ("selected");?>>Есть врачи высш. категории</option>
            <option value="addr" <?php if ($_GET['lookfor'] == 'addr') echo ("selected");?>>Адрес</option>
        </select>
        <input type="text" name="str">
        <input type="submit" value="Go">
        </form>

        <form action="purgatory.php">
            <input type="submit" value="Назад">
        </form>   
</div> 
    
    </main>
    
    <?php require("../../footer.php"); ?>
    
</body>
</html>