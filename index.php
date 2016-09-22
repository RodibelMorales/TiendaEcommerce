<?php
	session_start();
	include ('servidor/clases/classcontroler.php');
	$showcategorie = new showQuerys;	
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('includesFrontEnd/head.php') ?>
</head>
<body>
	<section class="container-fluid">
		<section class="row">
			<?php include('includesFrontEnd/nav.php') ?>		
		</section>
		<section class="row">
			<!-------------------------------------------->
			<div class="col-md-10">
				<div class="row">
					<?php $showcategorie->showallproducts();?>
				</div>
			</div>
			<div class="col-md-2">side bar rigth</div>
		</section>
		<?php include('includesFrontEnd/footer.php') ?>
	</section>
	<?php include('includesFrontEnd/jsfiles.php') ?>
</body>

</html>