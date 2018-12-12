
<!DOCTYPE html>
<html lang="nl">

	<?php include 'includes/algemeen/head.php'; ?>

	<body>
		<?php $titel = "Mijn Marktplaats"; ?>
		<header><h2 id="titel"><?php echo $titel; ?></h2></header>

		<section>
		<?php
			$site = "index";
			include 'hulpbestanden/sessionvar.php';
			include 'includes/algemeen/nav.php';
			include 'includes/index/advertenties.php';
			include 'includes/algemeen/aside.php';
		?>
		</section>

		<?php include 'includes/algemeen/footer.php' ?>
	</body>
</html>
