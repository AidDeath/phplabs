<?php 
require("../../header.php"); 
session_start();
?>

<body class="text-center  justify-content-center">
<main class="text-center justify-content-center">
<h1>Корзина</h1>

<?php
$table ="<table border='2'>";
        $table .="<thead>";
            $table .="<th>Наименование</th>";
            $table .="<th>Кол-во</th>";
        $table .="</thead>";
       
        foreach ($_SESSION['cart'] as $key => $value){
            $table .="<tr>";
            $table .="<td>".$key."</td>";
            $table .="<td>".$value."</td>";
            $table .="</tr>";
        }
        $table .="</table>";
        echo $table;

?>
<br>
<a class="btn btn-primary" href='index.php?sess=logout'>Выход без покупок</a>
</main>
     <?php require("../../footer.php"); ?>
</body>
</html>