<html>
<head>
	<meta charset="UTF-8">
	<title>TEST</title>
</head>
<body>
<?php 
			
			
$link = mysqli_connect('p:localhost','root','root','lab3');

if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Соединение с MySQL установлено!" . PHP_EOL;
echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;

//mysqli_close($link);
			$query = "INSERT INTO hospitals (hospital, md, address, phone, branch, beds, rooms, enterance, branchphone, email, doctor, date, url, category) VALUES ('Клецкая ЦРБ', 'Ололошин П. В.', 'Гагарина 16 7', '+375-17-2658745', 'Урология', '5', '12', '1', NULL, NULL, 'Васиссуалий Висарионович','2019-11-13', NULL, '1')";

			//$query = mysqli_real_escape_string($link,$query);
			//var_dump($query);
			$result =mysqli_query($link,$query);
			// mysqli_error($link);
			var_dump($result);

 ?>

</body>
</html>



