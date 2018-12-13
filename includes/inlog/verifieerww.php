<?php
	unset($_SESSION['loginknop']);

	$loginnaam = trim(issessie('loginnaam'));
	$loginmail = trim(issessie('loginmail'));
	$wachtwoord = trim(issessie('wachtwoord'));
	$wwinlog = "";

	if ($loginmail != "") {
		$bfound = zoekgebruiker ("email", $loginmail);
	} else {
		$bfound = zoekgebruiker ("gebruikersnaam", $loginnaam);
	}
	if (!$bfound) {
		$loginnaam = ""; $loginmail = "";
		$msgstr = schrijfstring ("Je bent niet bekend in ons systeem.|| ||Maak eerst een account aan.");
		phpAlert ($msgstr);
	} elseif ($wachtwoord === $wwinlog) {
		update_laatste_login ($gebruikerid);
		$msgstr = schrijfstring ("Welkom terug $nmkort,||je bent nu inglogd.");
		phpAlert ($msgstr);
		$_SESSION['gebruikerid'] = $gebruikerid;
		$_SESSION['gebruikersnaam'] = $gebruikersnaam;
//		$_SESSION['naamkort'] = $nmkort;
		$_SESSION['admin'] = $admin;
		phpRedirect('index.php');
	} else {
		$msgstr = schrijfstring ("Je hebt een verkeerd wachtwoord ingevuld.|| ||Probeer het opnieuw...");
		phpAlert ($msgstr);
	}
	include 'includes/inlog/inloggen.php';
?>
