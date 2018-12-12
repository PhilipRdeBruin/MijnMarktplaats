
<!DOCTYPE html>
<html lang="nl">

	<?php include 'includes/algemeen/head.php'; ?>

	<body>
		<body><header><h2>Mijn Marktplaats <i>(advertentie plaatsen)</i></h2></header>

		<section>
		<?php
			$site = "plaatsen";
			include 'hulpbestanden/sessionvar.php';
			include 'includes/algemeen/nav.php';
			include 'includes/plaatsen/plaats_ad.php';
			include 'includes/algemeen/aside.php';
		?>
		</section>

		<?php include 'includes/algemeen/footer.php' ?>
	</body>
</html>
