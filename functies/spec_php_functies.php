
<?php

    function registreer_nieuwe_gebruiker() {
        $regvelden = array('gebruikersnaam', 'voornaam',
                           'initialen', 'tussenvoegsel', 'achternaam',
                           'adres', 'postcode', 'woonplaats', 'telefoon',
                           'mobiel', 'email', 'wachtwoord', 'reg_datum',
                           'laatste_profielupd', 'laatste_activiteit', 'laatste_inlogdatum');
        $tijd = date("Y-m-d H:i:s", time());
        $_SESSION['reg_datum'] = $tijd;
        $_SESSION['laatste_profielupd'] = $tijd;
        $_SESSION['laatste_activiteit'] = $tijd;
        $_SESSION['laatste_inlogdatum'] = $tijd;

        $kolommen = "gebr_rechten, "; $waarden = "'', ";
        for ($i = 0; $i < count($regvelden); $i++) {
            $kolommen = $kolommen . $regvelden[$i] . ", ";
            $waarden = $waarden . "'" . $_SESSION[$regvelden[$i]] . "', ";
        }
        $kolommen = substr($kolommen, 0, strlen($kolommen) - 2);
        $waarden = substr($waarden, 0, strlen($waarden) - 2);

        insert_gebruikers($kolommen, $waarden);

        $_SESSION['gebruikerid'] = select_gebruikerid($_SESSION['gebruikersnaam']);
    }

    function unset_gebruiker_sessievariabelen() {
        $regvelden = array('registerknop', 'aanmaken_acct',
                           'gebruikersnaam', 'gebr_rechten',
                           'voornaam', 'initialen', 'tussenvoegsel', 'achternaam',
                           'adres', 'postcode', 'woonplaats', 'telefoon',
                           'mobiel', 'email', 'wachtwoord', 'reg_datum',
                           'laatste_profielupd', 'laatste_activiteit', 'laatste_inlogdatum');
        for ($i = 0; $i < count($regvelden); $i++) {
            unset($_SESSION[$regvelden[$i]]);
        }
    }

    function schrijf_advertentiebestand($ix, $gebruikersnaam, $ad_naam, $rubriek, $tijd ) {
        $filenaam = "bericht_" . $ix . ".txt";
        $inhoud = $tijd . "\n" . $gebruikersnaam . "\n" . $ad_naam . "\n" . $rubriek . "\n" . $advertentie;
        schrijfbestand ("w", $filenaam, $inhoud, "advertenties");
    }

    function unset_plaats_ad_sessievariabelen() {
        $advelden = array('advertentieknop',
                          'ad_naam', 'advertentie_id', 'rubriekid',
                          'art_prijs', 'prijs_vanaf', 'advertentie',
                          'ad_images');
        for ($i = 0; $i < count($advelden); $i++) {
            unset($_SESSION[$advelden[$i]]);
        }
    }

    function vul_rubrieken ($rubrsel) {
        $conn = dbconnect ("sqli");
        $sql = "SELECT rubr_id, rubriek_naam FROM rubrieken ORDER BY rubriek_naam";
        $result = $conn->query($sql);

        $i = 0;
        foreach ($result as $row) {
            $i++;
            $rubr_id = $row['rubr_id'];
            $rubrieknaam = $row['rubriek_naam'];
            $strsel = ($rubr_id == $rubrsel && $rubr_id != "") ? " selected" : "";
            echo "<option id='nieuwerubriek$i' name='nieuwerubriek$i' value='$rubr_id' $strsel >$rubrieknaam</option>";
        }

        dbdisconnect ("sqli", $conn);
    }

    function zoekgebruiker ($tp, $waarde) {
        global $gebruikerid, $gebruikersnaam, $nmkort, $wwinlog, $admin;

        $conn = dbconnect ("sqli");
        $sql = "SELECT * FROM gebruikers WHERE $tp = '$waarde';";
        $result = $conn->query($sql);
        if($row = $result->fetch_assoc()) {
            $bfound = true;
            $admin = $row["gebr_rechten"];
            $gebruikerid = $row["gebr_id"];
            $gebruikersnaam = $row["gebruikersnaam"];
            $email = $row['email'];
            $voornaam = trim($row["voornaam"]) . " ";
            $tussenvoegsel = trim($row["tussenvoegsel"]) . " ";
            $achternaam = trim($row["achternaam"]);
            $nmkort = $voornaam . $tussenvoegsel . $achternaam;
            $wwinlog = trim($row["wachtwoord"]);
        } else {
            $bfound = false;
        }
        dbdisconnect ("sqli", $conn);

        return $bfound;
    }

?>
