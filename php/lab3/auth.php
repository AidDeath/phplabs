<?php 
require("../../header.php"); 
?>

<body class="text-center  justify-content-center">
<main class="text-center justify-content-center">
 <?php 
 session_start();
 unset($_SESSION);
 session_destroy(); 
 ?>


<h1>Введите свои данные</h1>

<div class="container-fluid col-md-6 justify-content-center">
<form action="purgatory.php" method="post" >
     <input type="text" class="w-50" placeholder="Имя пользователя" name="login" pattern="^\D+$" required>
     <hr class="hr-xs">
     <input type="password" class="w-50" placeholder="Ваш пароль" required name="password">

<br>
<br>
     <button class="btn btn-primary" type="submit">ВОЙТИ НА САЙТ</button>
</form>
</div>
 
<div class="login-links text-center" >
     <p class="text-center">Еще нет аккаунта? <a class="txt-brand" href="reg.php"><font color=#29aafe>Регистрируйся</font></a></p>
</div>

</main>
     <?php require("../../footer.php"); 
     ?>
</body>
</html>