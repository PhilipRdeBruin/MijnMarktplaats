
<?php

	$gebruikersnaam = issessie('gebruikersnaam');

	switch ($site) {
	case 'index':
	    $profiel = 0;
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
