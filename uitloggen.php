
<!DOCTYPE html>
<html lang="nl">
	<?php include 'includes/algemeen/head.php'; ?>

	<body>
<?php
	$gebruikersnaam = issessie('gebruikersnaam');
	if ($gebruikersnaam != "") {
		update_laatste_loguit ($gebruikersnaam);
		$msgstr = schrijfstring ("$gebruikersnaam,|| ||je bent succesvol uitgelogd!|| ||Tot ziens.");
		phpAlertPlus ($msgstr, "index.php");
		unset($_SESSION['gebruikersnaam']);

		session_destroy();
	}
?>
	</body>
</html>
