   <?php 
   require("../../header.php");

if(empty($_POST)) {
	session_start();
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
	
	if ( !empty($_POST['password']) and !empty($_POST['login']) ) {
		//Пишем логин и пароль из формы в переменные (для удобства работы):
			$login = $_POST['login']; 
			$password = $_POST['password']; 
			
			/*
				Формируем и отсылаем SQL запрос:
				ВЫБРАТЬ ИЗ таблицы_users ГДЕ поле_логин = $login
			*/
			$link = mysqli_connect('p:localhost','root','root','lab3');
			$query = 'SELECT*FROM users WHERE login="'.$login.'"';
			$result = mysqli_query($link,$query); //ответ базы запишем в переменную $result
			
			//Преобразуем ответ из БД в нормальный массив PHP:
			$user = mysqli_fetch_assoc($result); 
			
	
	//Если база данных вернула не пустой ответ - значит такой логин есть...
			if (!empty($user)) {
				//Получим соль:
				$salt = $user['salt'];
				//Посолим пароль из формы:
				$saltedPassword = md5($password.$salt);
	
		//Если соленый пароль из базы совпадает с соленым паролем из формы...
				if ($user['pwdhash'] == $saltedPassword) {
					//Стартуем сессию:
					session_start(); 
	
			//Пишем в сессию информацию о том, что мы авторизовались:
					$_SESSION['auth'] = true; 
					/*
						Пишем в сессию логин и id пользователя
						(их мы берем из переменной $user!):
					*/
					$_SESSION['isadmin'] = $user['isadmin']; 
					$_SESSION['login'] = $user['login']; 
					$_SESSION['ban_until'] = $user['ban_until'];
				}
				//Если соленый пароль из базы НЕ совпадает с соленым паролем из формы...
				else {
				//Выводим сообщение 'Неправильный логин или пароль'.
				}
			} else {
				//Нет такого логина, выведем сообщение об ошибке.
			}
		}


   
} 

?>
    
    <body>
    <main>
        <?php if ($_SESSION['auth']) {
			$role = ($_SESSION["isadmin"]) ? "Администратор" :"Пользователь";
			$info = '<div class="container text-right">
			<p>Добро пожаловать, '.$_SESSION["login"].'<p>
			<p>Вы вошли как ' .$role.'</p>         
			</div>';
			echo $info;
			}
		?>
        
		 <div class="text-center">
				<form method="post">
                   
                   <?php // отрисовка кнопок
                   	//if($_SERVER['HTTP_REFERER'] == 'http://localhost/phplabs/php/lab1/auth.php' OR $_SERVER['HTTP_REFERER'] == 'http://localhost/phplabs/php/lab1/view.php')
					if(strpos($_SERVER['HTTP_REFERER'],'auth.php') OR strpos($_SERVER['HTTP_REFERER'],'view.php') OR strpos($_SERVER['HTTP_REFERER'],'search.php') OR strpos($_SERVER['HTTP_REFERER'],'adm.php') )   
					{
                   		if ($_SESSION['auth']AND ($_SESSION['ban_until'] < $time = time())) { 
                   			
                        	if($_SESSION['isadmin']) {
                        	echo '<input type="submit" formaction="form1.php" value="Форма ввода данных">';
							echo '<input type="submit" formaction="view.php" value="Просмотр данных">';
							echo '<input type="submit" formaction="search.php" value="Поиск данных">';
							echo '<input type="submit" formaction="adm.php" value="Админка">';
                        	echo '<input type="submit" formaction="auth.php" value="Выход (LogOut)">';
							   }
							   else{
								echo '<input type="submit" formaction="view.php" value="Просмотр данных">';
								echo '<input type="submit" formaction="search.php" value="Поиск данных">';
								echo '<input type="submit" formaction="auth.php" value="Выход (LogOut)">'; 
							   }
					}
						   else{   
							echo '<h1>Вход не выполнен</h1>';
							if($_SESSION['ban_until']){
								
								echo '<h3>Пользователь забанен</h3>
								<input type="submit" formaction="auth.php" value="Назад к форме логина">';
							}
							else{
								echo '<h3>Проверьте введенные данные</h3>
								<input type="submit" formaction="auth.php" value="Назад к форме логина">';
							}	
                   		}
                   	}		//// Countinue from here!!! 
                   	else {
								if(!empty($_GET['doctor'])) { // from form 3
                   		echo "<div class='alert alert-success'><strong>Данные формы сохранены</strong> Данные сохранены в базу данных</div>";
                   		echo '<input type="submit" formaction="form1.php" value="Форма ввода данных">
						<input type="submit" formaction="view.php" value="Просмотр данных">
						<input type="submit" formaction="search.php" value="Поиск данных"> 
                     	<input type="submit" formaction="auth.php" value="Выход (LogOut)">';
										// Тут будет запись данных в БД.
										$data = [
										$_SESSION['hospital'],
										$_SESSION['md'],
										$_SESSION['address'],
										$_SESSION['phone'],
										$_SESSION['branch'],
										$_SESSION['beds'],
										$_SESSION['rooms'],
										($_SESSION['enterance'] == 'Есть') ? 1 : 0,
										$_SESSION['branchphone'],
										$_SESSION['email'],
										$_SESSION['doctor'],
										$_SESSION['date'],
										$_SESSION['url'],
										(isset($_SESSION['category']))? 1 : 0,
										];

										$link = mysqli_connect('p:localhost','root','root','lab3');
										
										$query = "INSERT INTO hospitals (hospital, md, address, phone, branch, beds, rooms, enterance, branchphone, email, doctor, date, url, category) 
										VALUES ('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."','".$data[7]."','".$data[8]."','".$data[9]."','".$data[10]."','".$data[11]."','".$data[12]."','".$data[13]."')";
										
										$result =mysqli_query($link,$query);
										mysqli_free_result($result);
										mysqli_close($link);
										// mysqli_error($link);
										// var_dump($result);
										// var_dump(mysqli_error($link));
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




    </main>
    
    <?php require("../../footer.php"); ?>
    
</body>
</html>
