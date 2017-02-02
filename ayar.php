<?php
try{
$vt = new PDO("mysql:host=localhost;dbname=blog;charset=utf8;","yusufkeremw","" );
}
catch(PDOExeption $yusuf) {
echo $yusuf->getMessage();

}
?>