
<?php
    include 'includes/algemeen/head.php';

    if (ispost('loginknop') != "") {
        $_SESSION['loginknop'] = $_POST['loginknop'];
        $_SESSION['loginnaam'] = ispost('loginnaam');
        $_SESSION['loginmail'] = ispost('loginmail');
        $_SESSION['wachtwoord'] = $_POST['wachtwoord'];
        header ("Location: http://localhost/mijnprojecten/mijnmarktplaats/inlog.php");
    }

    if (ispost('registerknop') != "") {
        $_SESSION['registerknop'] = $_POST['registerknop'];
        header ("Location: http://localhost/mijnprojecten/mijnmarktplaats/inlog.php");
    }

    if (ispost('aanmaken_acct') != "") {
        $regvelden = array('gebruikersnaam', 'voornaam', 'initialen',
                           'tussenvoegsel', 'achternaam', 'adres',
                           'postcode', 'woonplaats', 'telefoon', 'mobiel',
                           'email', 'wachtwoord', 'wachtwoord2');

        $_SESSION['aanmaken_acct'] = $_POST['aanmaken_acct'];
        for ($i = 0; $i < count($regvelden); $i++) {
            $_SESSION[$regvelden[$i]] = $_POST[$regvelden[$i]];
            $x = $regvelden[$i]; $y = $_SESSION[$regvelden[$i]];
        }
        header ("Location: http://localhost/mijnprojecten/mijnmarktplaats/inlog.php");
    }

    if (ispost('advertentieknop')) {
        $_SESSION['advertentieknop'] = $_POST['advertentieknop'];
        $_SESSION['ad_naam'] = $_POST['ad_naam'];
        $_SESSION['advertentie_id'] = $_POST['advertentie_id'];
        $_SESSION['rubriekid'] = $_POST['rubriek'];
        $_SESSION['art_prijs'] = $_POST['art_prijs'];
        $_SESSION['prijs_vanaf'] = (ispost('prijs_vanaf') != "") ? true : false;
        $_SESSION['prijs_vanaf2'] = (ispost('prijs_vanaf2') != "") ? true : false;
        $_SESSION['advertentie'] = $_POST['advertentie'];
        $_SESSION['ad_images'] = $_POST['ad_images'];

        header ("Location: http://localhost/mijnprojecten/mijnmarktplaats/plaatsen.php");
    }

    if (isget('mijnprofiel')) {
        $_SESSION['mijnprofiel'] = $_GET['mijnprofiel'];
        header ("Location: http://localhost/mijnprojecten/mijnmarktplaats/index.php");
    }

    if (isget('verwijder_ad') != "") {
        $id = $_GET['verwijder_ad'];
        $ad_naam = select_ad_naam($id);
        $msgstr = schrijfstring("Weet je zeker dat je advertentie || || $ad_naam || || wilt verwijderen? || || (OK = ja, Annuleren = nee)");
        phpConfirm ("del", $msgstr, $id, "setup.php");
    }

    if (isget('delantw') != "") {
        $antw = $_GET['delantw'];
        $id = $_GET['id'];
        if ($_GET['delantw'] == "ja") {
            delete_advertentie($id);
        }
        $_SESSION['mijnprofiel'] = issessie('gebruikerid');
        header ("Location: http://localhost/mijnprojecten/mijnmarktplaats/index.php");
    }

    if (isget('plaats_bod') != "") {
        $id = $_GET['plaats_bod'];
        $koper = $_GET['koper'];
        $bedrag = $_GET['bod'];
//        echo "bedrag = $bedrag";
//        die();
        $checkbod = check_bod($id, $bedrag);
        if ($checkbod) {
            insert_bod($id, $koper, $bedrag);
            header ("Location: http://localhost/mijnprojecten/mijnmarktplaats/index.php");
        } else {
            $msgstr = schrijfstring("Er is reeds hoger geboden. || || Jouw bod wordt daarom niet geaccepteerd.");
            phpAlertPlus($msgstr, "index.php");
        }
    }
?>
