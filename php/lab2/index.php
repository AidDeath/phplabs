<?php 
require("../../header.php"); 
session_start();

?>

<body class="text-center  justify-content-center">
<main class="text-center justify-content-center">
<h1>Интернет-магазин</h1>
<div class="container">
<div class="row">
<div class="col-7">
<div class="row">Время входа на сайт</div>
<div class="row">Счётчик обновлений страницы</div>
</div>
<div class="col-1"><form><input type="submit" name="sess" value="Loguot" class="btn btn-primary"></form></div>
<div class="col-4">Инфо о корзине пользователя</div>
</div>
<br>
<div class="row">  
    <div class="col"><img src="../../img/memcard.webp" alt=""><p>SD-карточка, емкостью 32 Гб.</p><p>13.50 BYN</p><a class="btn btn-primary" href='?sdcard=13.50'>В корзину</a></div>
    <div class="col"><img src="../../img/postcard.webp" alt=""><p>Карта для считывания кодов POST при включении материнской платы.</p><p>29.90 BYN</p><a class="btn btn-primary" href='?postcard=29.90'>В корзину</a></div>
    <div class="col"><img src="../../img/usb-enth-adapt.webp" alt=""><p>Сетевой адаптер USB-Ethernet.</p><p>32.00 BYN</p><a class="btn btn-primary" href='?usb-eth=32.00'>В корзину</a></div>
</div>
<br>
<div class="row">
    <div class="col"><img src="../../img/usb-drive.webp" alt=""><p>14.40 BYN</p><a  class="btn btn-primary" href='?usb-flash=14.40'>В корзину</a></div>
    <div class="col"><img src="../../img/wlan.webp" alt=""><p>28.00 BYN</p><a  class="btn btn-primary" href='?wlan=28.00'>В корзину</a></div>
    <div class="col"><img src="../../img/optical-mouse.webp" alt=""><p>10.00 BYN</p><a  class="btn btn-primary" href='?mouse=10.00'>В корзину</a></div>
</div>
<br>
<div class="row">
    <div class="col"><img src="../../img/mem-ddr2.webp" alt=""><p>29.90 BYN</p><a class="btn btn-primary" href='?mem-ddr2=29.90'>В корзину</a></div>
    <div class="col"><img src="../../img/cardreader.webp" alt=""><p>9.20 BYN</p><a class="btn btn-primary" href='?cardreader=9.20'>В корзину</a></div>
    <div class="col"><img src="../../img/usb-sata.webp" alt=""><p>16.50 BYN</p><a class="btn btn-primary" href='?usb-sata=16.50'>В корзину</a></div>
</div>
</div>




</main>
     <?php require("../../footer.php"); ?>
</body>
</html>