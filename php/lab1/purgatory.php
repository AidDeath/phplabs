   <?php 
   require("../../header.php");
   session_start();

if(empty($_POST)) {
	if(!empty($_GET['md'])) {// save form1 data to sess
	$_SESSION["hospital"] = $_GET["hospital"];
	$_SESSION["md"] = $_GET["md"];
	$_SESSION["address"] = $_GET["address"];
	$_SESSION["phone"] = $_GET["phone"]; 
	}
	elseif(!empty($_GET['doctor'])) {// save form3 data to sess
	$_SESSION["date"] = $_GET["date"];
	$_SESSION["email"] = $_GET["email"];
	$_SESSION["url"] = $_GET["url"];
	$_SESSION["doctor"] = $_GET["doctor"];
	if (!isset($_GET['category'])) unset($_SESSION["category"]);
	if (isset($_GET['category'])) $_SESSION["category"] = $_GET["category"];
	}
}
else {
	// save auth data to sess
$_SESSION['auth']  = [$_POST['login'],$_POST['pwd1'],$_POST['pwd2']];
    // 010ba93659135ab933fd70d43de90f2c  admin pwd1 pwd2
    // 9a06cfb65be6c6dba6b1d62f84dd401c user 1234 qwer
   if(!isset($_COOKIE[$_POST['login']])) {
   	setcookie($_POST['login'],'1', 0x7FFFFFFF);
   }
   else {
   	$tmp = $_COOKIE[$_POST['login']];
   	$tmp++;
   	setcookie($_POST['login'],$tmp, 0x7FFFFFFF);
   }
} 

?>
    
    <body>
    <main>
        
        <div class="container text-right"><p>Добро пожаловать, <?php echo $_SESSION['auth'][0];?><p>  
        <p><?php echo ($_COOKIE[$_SESSION[auth][0]] > 0) ? 'Вы заходили на сайт '.$_COOKIE[$_SESSION[auth][0]].' раз' : 'Вы впервые на сайте!' ?></p>      
        </div>
        
		 <div class="text-center">
				<form method="post">
                   
                   <?php // отрисовка кнопок
                   	if($_SERVER['HTTP_REFERER'] == 'http://localhost/phplabs/php/lab1/auth.php') 
                   	{
                   		if (md5(serialize($_SESSION['auth'])) == '010ba93659135ab933fd70d43de90f2c' OR 
                   		md5(serialize($_SESSION['auth'])) == '9a06cfb65be6c6dba6b1d62f84dd401c')  
                   		{
                        if($_SESSION['auth'][0] == 'admin') echo '<input type="submit" formaction="form1.php" value="Форма ввода данных">';
                        echo '<input type="submit" formaction="auth.php" value="Выход (LogOut)">';
                   		}
                   		else{
           						     echo '<h1>Вход не выполнен</h1>
                         <input type="submit" formaction="auth.php" value="Назад к форме логина">';
                            	
                   		}
                   	}
                   	else {
								if(!empty($_GET['doctor'])) { // from form 3
                   		echo "<div class='alert alert-success'><strong>Данные формы сохранены</strong> Данные находятся в переменной _SESSION</div>";
                   		echo '<input type="submit" formaction="form1.php" value="Форма ввода данных">
                     	<input type="submit" formaction="auth.php" value="Выход (LogOut)">';

								}
								if(!empty($_GET['md'])) {// from form 1
								echo '<input type="submit" formaction="form1.php" value="Форма ввода данных">
                     	<input type="submit" formaction="auth.php" value="Выход (LogOut)">';
                   		echo "<div class='alert alert-warning'><strong>Заполнение формы прервано!</strong> Данные ещё доступны для редактирования.</div>";
								}                   	
                   	}
                    ?>                 
				</form> 
		 </div>



<!-- 		 <div class="table">
    <?php                
    if (!empty($_GET)) {
        $table ="<table border='2' id='table'>";
        $table .="<thead>";
            $table .="<th>Аптека</th>";
            $table .="<th>Адрес</th>";
            $table .="<th>Телефон</th>";
            $table .="<th>Название</th>";
            $table .="<th>Вид</th>";
            $table .="<th>Цена, &#128</th>";
            $table .="<th>Кол-во</th>";
            $table .="<th>Доза</th>";
            $table .="<th>Рецепт</th>";
            $table .="<th>e-mail</th>";
            $table .="<th>Инстр</th>";
        $table .="</thead>";
        $table .="</table>";
                
        echo $table;
   
    }
        ?>
        </div> -->
    </main>
    
    <?php require("../../footer.php"); ?>
    
</body>
</html>
