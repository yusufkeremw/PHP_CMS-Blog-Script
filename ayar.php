<?php
try{
$vt = new PDO("mysql:host=localhost;dbname=blog;charset=utf8;","yourdbuser","yourdbpass" ); // Bu kısmı kendinize göre düzenleyin | Edit this area with your db pass and db id
}
catch(PDOExeption $yusuf) {
echo $yusuf->getMessage();

}
?>
