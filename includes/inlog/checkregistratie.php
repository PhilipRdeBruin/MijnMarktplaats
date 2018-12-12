
<?php
    unset($_SESSION['aanmaken_acct']);
    $gebruikersnaam = issessie('gebruikersnaam');
    $voornaam = issessie('voornaam');
    $initialen = issessie('initialen');
    $tussenvoegsel = issessie('tussenvoegsel');
    $achternaam = issessie('achternaam');
    $adres = issessie('adres');
    $postcode = issessie('postcode');
    $woonplaats = issessie('woonplaats');
    $telefoon = issessie('telefoon');
    $mobiel = issessie('mobiel');
    $email = issessie('email');
    $wachtwoord = issessie('wachtwoord');
    $wachtwoord2 = issessie('wachtwoord2');

    $gebr_naam = select_gebruikers($gebruikersnaam);
    $bww = checkgelijkeww($wachtwoord, $wachtwoord2);
    if ($gebr_naam != "") {
        $msgstr = schrijfstring("Deze gebruikersnaam bestaat al.|| ||Kies s.v.p. een andere gebruikersnaam.");
        phpAlert($msgstr);
        $gebruikersnaam = "";
        include 'includes/inlog/registreren.php';
    } elseif ($bww == false) {
        $msgstr = schrijfstring("Je hebt verschillende wachtwoorden ingevoerd.|| ||Probeer het opnieuw...");
        phpAlert($msgstr);
        include 'includes/inlog/registreren.php';
    } else {
        registreer_nieuwe_gebruiker();
        unset_gebruiker_sessievariabelen();
        $tv = ($tussenvoegsel !="") ? " " . $tussenvoegsel : "";
        $nmkort = $voornaam . $tv . " " . $achternaam;
		$msgstr = schrijfstring($nmkort . ", || || je hebt succesvol een account aangemaakt.");
//        $_SESSION['gebruikerid'] = $gebruikerid;
		$_SESSION['gebruikersnaam'] = $gebruikersnaam;
        phpAlertPlus($msgstr, "index.php");
    }

?>
