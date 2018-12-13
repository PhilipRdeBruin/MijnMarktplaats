
<!DOCTYPE html>
<html lang="nl">

	<?php include 'includes/algemeen/head.php'; ?>

	<body>
		<header><h2>Mijn Marktplaats <i>(inloggen)</i></h2></header>

		<section>
		<?php
			$site = "inlog";
			include 'hulpbestanden/sessionvar.php';
			include 'includes/algemeen/nav.php';
			include 'includes/inlog/inlogopties.php';
			include 'includes/algemeen/aside.php';
		?>
		</section>

		<?php include 'includes/algemeen/footer.php' ?>
	</body>
</html>
