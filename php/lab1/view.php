   <?php 
   require("../../header.php"); ?>
   
    <body>
    <main>
    
 <div class="table">
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
					/// здесь надо заполнить таблицу данными из файла.
					// Видимо читать по очереди строки из файла, десериализовывать их и полученный массив загонять в массив   
					$file = "/srv/http/file.txt";										
					$h_File = fopen($file, 'r');
                    
                    while (!feof($h_Flie)){
                       $data[] = fgets($h_File);
                    }

                    var_dump($data[0]);
                          
        $table .="</thead>";
        $table .="</table>";
                
        echo $table;
   		var_dump($data); 
        ?>
        
        
        
        
        
        
</div> 
    
    </main>
    
    <?php require("../../footer.php"); ?>
    
</body>
</html>