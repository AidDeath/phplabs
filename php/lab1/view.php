   <?php 
   require("../../header.php"); ?>
   
    <body>
    <main>
    
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
					/// здесь надо заполнить таблицу данными из файла.
					// Видимо читать по очереди строки из файла, десериализовывать их и полученный массив загонять в массив   
					$file = "/srv/http/file.txt";										
					$h_File = fopen($file, 'r');
                    while(!feof($h_File)) $data[] = fgets($h_File);

                    
                    $rec =$rec = unserialize($data[0]);
                    var_dump($rec[7]);
                    $i=0;
                    while($data[$i]){
                        $rec = unserialize($data[$i]);
                        $table .="<tr>";
                        $table .="<td>".$rec[0]."</td>";
                        $table .="<td>".$rec[1]."</td>";
                        $table .="<td>".$rec[2]."</td>";
                        $table .="<td>".$rec[3]."</td>";
                        $table .="<td>".$rec[4]."</td>";
                        $table .="<td>".$rec[5]."</td>";
                        $table .="<td>".$rec[6]."</td>";
                        $table .="<td>".$rec[7]."</td>";
                        $table .="<td>".$rec[8]."</td>";
                        $table .="<td>".$rec[9]."</td>";
                        $table .="<td>".$rec[10]."</td>";
                        $table .="<td>".$rec[11]."</td>";
                        $table .="<td>".$rec[12]."</td>";
                        $rec[13] = (!empty($rec[13])) ? "Высш" : "Обычн.";
                        $table .="<td>".$rec[13]."</td>";
                        $table .="</tr>";
                    $i++;
                    }
                fclose($h_File);
 
        $table .="</table>";
                
        echo $table;
        ?>
        
        
        
        
        
        
</div> 
    
    </main>
    
    <?php require("../../footer.php"); ?>
    
</body>
</html>