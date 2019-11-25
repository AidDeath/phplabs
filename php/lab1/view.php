   <?php 
   require("../../header.php");
   session_start(); 
   
   function fill($arg){ 
    global $table;
    global $data;
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
    }
    ?>

   
    <body>
    <main>
    <div class="container text-right"><p>Добро пожаловать, <?php echo $_SESSION['auth'][0];?><p>  
        <p><?php echo ($_COOKIE[$_SESSION[auth][0]] > 0) ? 'Вы заходили на сайт '.$_COOKIE[$_SESSION[auth][0]].' раз' : 'Вы впервые на сайте!' ?></p>      
        </div>
    <h1>Просмотр сохраненных данных</h1>
 <div >
    <?php                

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
 
					$file = "/srv/http/file.txt";										
					$h_File = fopen($file, 'r');
                    while(!feof($h_File)) $data[] = unserialize(fgets($h_File));
                   
                    if (!isset($_GET['sort'])) fill(0);  //вывод таблицы как есть, без сортировки  +
                    else{
                        if ($_GET['sort'] == 'По возрастанию') {
                        sort($data);
                        fill(1);// прямой порядок сортировки и вывод +
                        }
                        else{
                        rsort($data);
                        fill(0);// обратный порядок сортировки и вывод  +
                        }
                    }

                fclose($h_File);
        $table .="</table>";
                
        echo $table;
        ?>

        <form action="view.php">
        <input type="submit" value="По возрастанию" name="sort">
        <input type="submit" value="По убыванию" name="sort">
        </form>

        <form action="purgatory.php">
            <input type="submit" value="Назад">
        </form>   
</div> 
    
    </main>
    
    <?php require("../../footer.php"); ?>
    
</body>
</html>