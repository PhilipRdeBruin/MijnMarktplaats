
<?php
//	$_SESSION['registerknop'] = "";

	$gebruikerid = issessie('gebruikerid');
	$gebruikersnaam = issessie('gebruikersnaam');
//	phpAlert ("gebruiker: id, naam = $gebruikerid, $gebruikersnaam");

	switch ($site) {
	case 'index':
	    $profiel = 0;
		if (issessie('mijnprofiel') != "") {
			$profiel = $_SESSION['mijnprofiel'];
			echo "<script>write_profiel_to_title('$gebruikersnaam');</script>";
			unset ($_SESSION['mijnprofiel']);
		}
		break;
	case 'inlog':
		$gebruikersnaam = "";
	    $voornaam = ""; $initialen = ""; $tussenvoegsel = ""; $achternaam = "";
	    $adres = ""; $postcode = ""; $woonplaats = "";
	    $telefoon = ""; $mobiel = ""; $email = "";

		$loginnaam = ""; $loginmail = "";
		break;
	case 'plaatsen':
		$advertentie_header = "Advertentie plaatsen";
		$advertentieknop = "Plaats advertentie";
		$advertentie_naam = issessie('ad_naam');
		$advertentie = issessie('advertentie');
		$rubriek = issessie('rubriekid');
		$prijs = issessie('art_prijs');
		$prijs_vanaf = (issessie('prijs_vanaf')) ? "checked" : "";
		$ad_images = issessie('ad_images');
		break;
	case 'profiel':
		//
	}

?>
