
<!DOCTYPE html>
<html lang="nl">

	<?php include 'includes/algemeen/head.php'; ?>

	<body>
		<body><header><h2>Mijn WebLog <i>(Profiel van <?php // echo $_SESSION['naam']; ?>)</i></h2></header>

		<section>
		<?php
			$site = "profiel";
			include 'hulpbestanden/sessionvar.php';
			include 'includes/algemeen/nav.php';
//			include 'includes/profiel/mijnprofiel.php';
			include 'includes/algemeen/aside.php';
		?>
		</section>

		<?php include 'includes/algemeen/footer.php' ?>
	</body>
</html>
