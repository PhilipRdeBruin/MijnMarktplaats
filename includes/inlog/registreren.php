
<?php
    if (issessie('aanmaken_acct') != "") {
        include 'includes/inlog/checkregistratie.php';
    } else {
?>
        <form id="registratieform" action="setup.php" method="post">
            <p><b><u>Registratieformulier:</u></b></p>
            <table width="80%">
                <tr><th colwidth="40%"></th><th colwidth="60%"></th></tr>
                <tr><td colspan="2"><u><i>Kies een gebruikersnaam...</i></u></td></tr>
<?php
                blanktr();
                registreer ("reg", "Gebruikersnaam", "gebruikersnaam", "req", "text", $gebruikersnaam);
                blanktr();
?>
                <tr><td colspan="2"><u><i>Vul hier jouw gegevens in...</i></u></td></tr>
<?php
                blanktr();
                registreer ("reg", "Voornaam", "voornaam", "req", "text", $voornaam);
                registreer ("reg", "Initialen", "initialen", "", "text", $initialen);
                registreer ("reg", "Tussenvoegsel", "tussenvoegsel", "", "text", $tussenvoegsel);
                registreer ("reg", "Achternaam", "achternaam", "req", "text", $achternaam);
                blanktr();
                registreer ("reg", "Adres", "adres", "", "text", $adres);
                registreer ("reg", "Postcode", "postcode", "req", "text", $postcode);
                registreer ("reg", "Woonplaats", "woonplaats", "", "text", $woonplaats);
                blanktr();
                registreer ("reg", "Telefoon", "telefoon", "", "text", $telefoon);
                registreer ("reg", "Mobiele telefoon", "mobiel", "", "text", $mobiel);
                registreer ("reg", "Email-adres", "email", "req", "text", $email);
                blanktr(2);
                registreer ("reg", "Wachtwoord", "wachtwoord", "req", "password", "");
                registreer ("reg", "Bevestig wachtwoord", "wachtwoord2", "req", "password", "");
                blanktr();
?>
                <tr><td colspan="2" id="tdknop" align="center">
                    <input type="submit" id="aanmaken_acct" name="aanmaken_acct" value="Maak account aan">
                    </td><td>
                </td></tr>
            </table>
            <br/>
            <p class="px12"><super>*</super><i>verplicht veld</i></p>
        </form>
<?php
    }
?>
