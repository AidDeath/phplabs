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
$fh = fopen($myFile, 'a+t') or die("can't open file");
$stringData = "Первая строчка/n";
fwrite($fh, serialize($admin)."\n");

fclose($fh);
 ?>

</body>
</html>