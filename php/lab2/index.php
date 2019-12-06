<?php 
require("../../header.php"); 
session_start();
if(!isset($_SESSION['count'])){
    $_SESSION['count'] =0;
    $_SESSION['amount'] = 0;
} 

if($_GET['sess']){
    unset($_SESSION);
    session_destroy();
    session_start();
}

if(!isset($_SESSION['logintime'])){
    $_SESSION['logintime'] = time();
}

if(!isset($_SESSION['refresh'])) {
    $_SESSION['refresh'] = 0;
}
else $_SESSION['refresh']++;


if($_GET['sdcard']){
    $_SESSION['count']++;
    $_SESSION['amount'] = $_SESSION['amount'] + $_GET['sdcard'];
    $_SESSION['cart']['sdcard']++;
}
if($_GET['postcard']){
    $_SESSION['count']++;
    $_SESSION['amount'] = $_SESSION['amount'] + $_GET['postcard'];
    $_SESSION['cart']['postcard']++;
}
if($_GET['usb-eth']){
    $_SESSION['count']++;
    $_SESSION['amount'] = $_SESSION['amount'] + $_GET['usb-eth'];
    $_SESSION['cart']['usb-eth']++;
}
if($_GET['usb-flash']){
    $_SESSION['count']++;
    $_SESSION['amount'] = $_SESSION['amount'] + $_GET['usb-flash'];
    $_SESSION['cart']['usb-flash']++;
}
if($_GET['wlan']){
    $_SESSION['count']++;
    $_SESSION['amount'] = $_SESSION['amount'] + $_GET['wlan'];
    $_SESSION['cart']['wlan']++;
}
if($_GET['mouse']){
    $_SESSION['count']++;
    $_SESSION['amount'] = $_SESSION['amount'] + $_GET['mouse'];
    $_SESSION['cart']['mouse']++;
}
if($_GET['mem-ddr2']){
    $_SESSION['count']++;
    $_SESSION['amount'] = $_SESSION['amount'] + $_GET['mem-ddr2'];
    $_SESSION['cart']['mem-ddr2']++;
}
if($_GET['cardreader']){
    $_SESSION['count']++;
    $_SESSION['amount'] = $_SESSION['amount'] + $_GET['cardreader'];
    $_SESSION['cart']['cardreader']++;
}
if($_GET['usb-sata']){
    $_SESSION['count']++;
    $_SESSION['amount'] = $_SESSION['amount'] + $_GET['usb-sata'];
    $_SESSION['cart']['usb-sata']++;
}//sdcard  postcard   usb-eth  usb-flash   wlan  mouse mem-ddr2    cardreader usb-sata
//var_dump($_SESSION['cart']);

?>

<body class="text-center  justify-content-center">
<main class="text-center justify-content-center">
<h1>Интернет-магазин</h1>
<div class="container">
<div class="row">
<div class="col-3">
<div class="row">Вы вошли на сайт <?php echo time() - $_SESSION['logintime']?> сек. назад</div>
<div class="row"><?= ($_SESSION['refresh'] > 0) ? 'Страница обновлена '.$_SESSION['refresh'].' раз' : "Страница не обновлялась"?></div>
</div>
<div class="col-1"><form><input type="submit" name="sess" value="Loguot" class="btn btn-primary"></form></div>
<div class="col-4"></div>
<div class="col-3">
<div class="row">В корзине <?= $_SESSION['count']?> товаров</div>
<div class="row">На общую сумму <?= $_SESSION['amount']?> руб.</div>           
</div>
<div class="col-1"><div class="row"><a href="cart.php" class="btn btn-primary">Подробнее</a></div></div>
</div>
<br>
<div class="row">  
    <div class="col"><img src="../../img/memcard.webp" alt=""><p>SD-карточка, емкостью 32 Гб.</p><p>13.50 BYN</p><a class="btn btn-primary" href='?sdcard=13.50'>В корзину</a></div>
    <div class="col"><img src="../../img/postcard.webp" alt=""><p>Карта для считывания кодов POST при включении материнской платы.</p><p>29.90 BYN</p><a class="btn btn-primary" href='?postcard=29.90'>В корзину</a></div>
    <div class="col"><img src="../../img/usb-enth-adapt.webp" alt=""><p>Сетевой адаптер USB-Ethernet.</p><p>32.00 BYN</p><a class="btn btn-primary" href='?usb-eth=32.00'>В корзину</a></div>
</div>
<br>
<div class="row">
    <div class="col"><img src="../../img/usb-drive.webp" alt=""><p>USB - накопитель</p><p>14.40 BYN</p><a  class="btn btn-primary" href='?usb-flash=14.40'>В корзину</a></div>
    <div class="col"><img src="../../img/wlan.webp" alt=""><p>Беспроводной сетевой адаптер</p><p>28.00 BYN</p><a  class="btn btn-primary" href='?wlan=28.00'>В корзину</a></div>
    <div class="col"><img src="../../img/optical-mouse.webp" alt=""><p>Дешёвая оптическая Bluetooth мышь</p><p>10.00 BYN</p><a  class="btn btn-primary" href='?mouse=10.00'>В корзину</a></div>
</div>
<br>
<div class="row">
    <div class="col"><img src="../../img/mem-ddr2.webp" alt=""><p>Оперативная память DDR2</p><p>29.90 BYN</p><a class="btn btn-primary" href='?mem-ddr2=29.90'>В корзину</a></div>
    <div class="col"><img src="../../img/cardreader.webp" alt=""><p>Универсальный кард-ридер</p><p>9.20 BYN</p><a class="btn btn-primary" href='?cardreader=9.20'>В корзину</a></div>
    <div class="col"><img src="../../img/usb-sata.webp" alt=""><p>Переходник SATA - USB</p><p>16.50 BYN</p><a class="btn btn-primary" href='?usb-sata=16.50'>В корзину</a></div>
</div>
</div>


<br>

</main>
     <?php require("../../footer.php"); ?>
</body>
</html>