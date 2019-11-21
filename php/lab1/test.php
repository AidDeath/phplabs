<html>
<head>
	<meta charset="UTF-8">
	<title>TEST</title>
</head>
<body>
<?php 


$admin = ['test','pwd1','pwd2'];
echo var_dump(md5(serialize($admin)));
$str = '123\n';
echo var_dump($str);

$myFile = "/srv/http/testFile.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = "Первая строчка\n";
fwrite($fh, $stringData);
$stringData = "Вторая строчка\n";
fwrite($fh, $stringData);
fclose($fh);
 ?>

</body>
</html>