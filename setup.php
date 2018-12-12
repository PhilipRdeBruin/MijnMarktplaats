
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
        $_SESSION['advertentie'] = $_POST['advertentie'];
        $_SESSION['ad_images'] = $_POST['ad_images'];

//        $rubrid = $_SESSION['rubriekid'];
//        $vanaf = $_SESSION['prijs_vanaf'];
//        echo "rubriek_id = $rubrid<br/>";
//        echo "prijs_vanaf = $vanaf";
//        die();

        header ("Location: http://localhost/mijnprojecten/mijnmarktplaats/plaatsen.php");
    }
?>
