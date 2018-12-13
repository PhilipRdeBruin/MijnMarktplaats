
<?php
	if (issessie('loginknop') != "") {
		include 'includes/inlog/verifieerww.php';
	} else {
?>
		<form id="inlogform" action="setup.php" method="post">
		<p><u>Voer gebruikersnaam of email-adres in:</u></p>
			<table width="80%">
				<tr><th colwidth="40%"></th><th colwidth="60%"></th></tr>
<?php
				registreer ("inlog", "Gebruikersnaam", "loginnaam", "", "text", $loginnaam);
				registreer ("inlog", "Email-adres", "loginmail", "", "text", $loginmail, "naam123@provider.nl");
				blanktr();
				registreer ("inlog", "Wachtwoord", "wachtwoord", "req", "password", "");
				blanktr(2);
?>
				<tr><td colspan="2" id="tdknop" align="center"><input type="submit" id="loginknop" name="loginknop" value="Inloggen"></td></tr>
			</table>
            <br/>
            <p class="px12"><super>*</super><i>verplicht veld</i></p>
		</form>

		<div id="registreren">
			<p>Als je nog geen account hebt, kun je je met onderstaande knop registreren.</p>
			<form id="registratieknop" action="setup.php" method="post">
				<input type="submit" id="registerknop" name="registerknop" value="Registreren">
			</form>
		</div>
<?php
	}
?>
