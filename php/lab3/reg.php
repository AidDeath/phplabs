<?php 
require("../../header.php"); 
?>
<body class="text-center  justify-content-center">
<main class="text-center justify-content-center">
<h1>Регистрация нового пользователя</h1>

<div class="container-fluid col-md-6 justify-content-center">
<form action="reg.php" method="post" >
     <input type="text" class="w-50" placeholder="Ваш логин" name="login" pattern="^\D+$" required>
     <hr class="hr-xs">
     <input type="password" class="w-50" placeholder="Придумайте пароль" name="password">
     <input type="password" class="w-50" placeholder="Подтверждение пароля"  name="password_confirm">
     <input type="email" name="email" class = "w-50" placeholder = "Адрес e-mail">
     <input type="date" name="birthday" class="w-50" value="1980-01-01">
     <select name="isadmin" class ="w-50">
        <option value="1">Администратор</option>
        <option value="0">Пользователь</option>
     </select>
<br>
<br>
     <button class="btn btn-primary" type="submit">ЗАРЕГИСТРИРОВАТЬСЯ</button>
     <button class="btn btn-primary" type="submit" formaction="auth.php">Назад к форме входа</button>
</form>
</div>
 
<?php
	function generateSalt()
	{
		$salt = '';
		$saltLength = 8; //длина соли
		for($i=0; $i<$saltLength; $i++) {
			$salt .= chr(mt_rand(33,126)); //символ из ASCII-table
		}
		return $salt;
    }
    

	//Если форма регистрации отправлена и ВСЕ поля непустые...
	if (
		!empty($_REQUEST['password'])
		and !empty($_REQUEST['password_confirm'])
		and !empty($_REQUEST['login'])
	) {
    //Пишем логин и пароль из формы в переменные (для удобства работы):
        $birthday = $_REQUEST['birthday'];
        $email = $_REQUEST['email'];
        $isadmin = $_REQUEST['isadmin'];
		$login = $_REQUEST['login']; 
		$password = $_REQUEST['password']; 
		$password_confirm = $_REQUEST['password_confirm']; //подтверждение пароля
		//Если пароль и его подтверждение совпадают...
		if ($password == $password_confirm) {
			/*
				Выполняем проверку на незанятость логина.
				Ответ базы запишем в переменную $isLoginFree. 
				ВЫБРАТЬ ИЗ таблицы_users ГДЕ логин = $login.
            */
            $link = mysqli_connect('p:localhost','root','root','lab3');
			$query = 'SELECT*FROM users WHERE login="'.$login.'"';
		$isLoginFree = mysqli_fetch_assoc(mysqli_query($link, $query));

			//Если $isLoginFree пустой - то логин не занят!
			if (empty($isLoginFree)) {
	//Генерируем соль с помощью функции generateSalt() и солим пароль...
		$salt = generateSalt(); //генерируем соль
		$saltedPassword = md5($password.$salt); //соленый пароль
				/*
			Формируем и отсылаем SQL запрос:
			ВСТАВИТЬ В таблицу_users УСТАНОВИТЬ 
			логин = $login, пароль = $saltedPassword, salt = $salt
				*/
            $query = 'INSERT INTO users SET login="'.$login.'",
                pwdhash="'.$saltedPassword.'", salt="'.$salt.'",
                 email="'.$email.'", birthday="'.$birthday.'",
                  isadmin = "'.$isadmin.'"';
				mysqli_query($link, $query); 
            //    var_dump(mysqli_error($link)); 
            //    var_dump($isadmin);
				//Выведем сообщение об успешной регистрации:
				echo '<h3>Вы успешно зарегистрированы!</h3>';
			}
			//Если $isLoginFree НЕ пустой - то логин занят!
			else {
				echo '<h3>Такой логин уже занят!</h3>';
			}
		}
	//Если пароль и его подтверждение НЕ совпадают - выведем ошибку:
		else {
            echo '<h3>Пароли не совпадают!</h3>';

		}
	}
	//Не заполнено какого-либо из полей...
	else {
		echo '<h3>Поля не могут быть пустыми!</h3>';
	}
?>

</main>
     <?php require("../../footer.php"); 
     ?>
</body>
</html>

