<?php include "ayar.php";
include "header.php";
 ?>
 <?php
 $gelenkat = $_GET['kat'];
 ?>
<main class="home">
	<div class="container">
		<div class="col-md-12"><?php
$veri = $vt->query("select * from blog where kat = '{$gelenkat}'");
while($row = $veri->fetch(PDO::FETCH_ASSOC)){
?>
<aside>			
				<!-- -->
				<div  class="post">
					<h3 class="title"><a href="konu.php?id=<?php echo $row['id']; ?>"><?php echo $row["baslik"]; ?></a></h3>
					<div class="category"><?php echo $row["kat"]; ?></div>
					<div class="img"></div>
					<p class="description"><?php echo $detay; ?></p>
				</div>
				<!-- -->				
			</aside> 

<?php
}
?></div></div></main>
