<?php 
   require("../../header.php");
   session_start(); 

switch($_GET['btn']){
   case "Забанить на" :
      $query = 'UPDATE users SET ban_until = "'.(time()+$_GET["period"]).'" WHERE login = "'.$_GET['selected'].'"';
      break;
   case "Разбанить" :
      $query = 'UPDATE users SET ban_until = "'.(time()-1).'" WHERE login = "'.$_GET['selected'].'"';
      break;
   case "Удалить" :
      $query = 'DELETE FROM users WHERE login = "'.$_GET['selected'].'"';
      break;
}

$link = mysqli_connect('p:localhost','root','root','lab3');
mysqli_query($link,$query);
echo mysqli_error($link);
mysqli_close($link);
var_dump(date("H:i:s",time()));

   function fill(){ 
      global $table;
      global $data;
     $i=0;
      while($data[$i] !== NULL){
          $table .="<tr>";
          $table .='<td><input type="radio" name="selected" checked value="'.$data[$i][0].'"></td>';
          $table .="<td>".$data[$i][0]."</td>";
          $table .="<td>".$data[$i][1]."</td>";
          $table .="<td>".$data[$i][2]."</td>";
          $data[$i][3] = ($data[$i][3] == 1) ? "Администратор" : "Пользователь";
          $table .="<td>".$data[$i][3]."</td>";
          $table .="<td>".(date("d F Y H:i:s",$data[$i][4]))."</td>";
          $table .="</tr>";
      $i++;
      }
      }
?>
 
 <body>
    <main>
    <div class="container text-right"><p>Добро пожаловать, <?php echo $_SESSION['login'];?>.<p>  
        </div>
    <h1>Админка</h1>

      <div>   
      <form action="adm.php">
<?php
$table ="<table border='2'>";
$table .="<thead>";
    $table .="<th>*</th>";
    $table .="<th>Пользователь</th>";
    $table .="<th>Дата рождения</th>";
    $table .="<th>E-mail</th>";
    $table .="<th>Привилегии</th>";
    $table .="<th>Последний бан по:</th>";
$table .="</thead>";



$link = mysqli_connect('p:localhost','root','root','lab3');
$query = "SELECT login, birthday, email, isadmin, ban_until FROM users";
$result =mysqli_query($link,$query);
while($data[] = mysqli_fetch_row($result));

mysqli_free_result($result);
mysqli_close($link);

fill();
$table .="</table>";
echo $table;
//var_dump($data);
?>

<input type="submit" value="Удалить" name="btn"> <br>
<input type="submit" value="Забанить на" name="btn">
<select name="period">
      <option value="60">1 минуту</option>
      <option value="3600">1 час</option>
      <option value="86400">1 день</option>
      <option value="604800"> 1 неделя</option>
</select><br>
<input type="submit" value="Разбанить" name="btn">
</form>
</div>


    <form action="purgatory.php">
            <input type="submit" value="Назад">
        </form>  
   </main>
    
   <?php require("../../footer.php"); ?>
   
</body>
</html>