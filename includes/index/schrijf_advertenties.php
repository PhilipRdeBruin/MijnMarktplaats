
    <div class="advertenties">
<?php
    foreach ($result as $row) {
        $tv = ($row['tussenvoegsel'] != "") ? " " . $row['tussenvoegsel'] : "";
        $naam = $row['voornaam'] . $tv . " " . $row['achternaam'];
        $vanaf = ($row['prijs_vanaf'] == 1) ? "(vanaf)" : "";
        $geplaatst = date_format(date_create($row['ad_geplaatst']), "d-m-Y H:i:s");
        $ad_tekst = fetch_verhaal($row['ad_id'], "advertentie", "advertenties");
        if ($ad_tekst == "") { $ad_tekst = $row['ad_omschrijving']; }

?>
        <table id="advertentietabel">
            <tr id="btblrij1">
                <td class="btblcel1" id="auteurnaam" <?php echo $row['gebr_id']; ?> width="25%">
                    <?php echo $naam ?>
                </td>
                <td class="btblrij1" width="75%">
                    <?php echo $row['ad_naam'] ?>
                </td>
            </tr>
            <tr>
                <td id="btblcelx">
                    <i>rubriek:</i> <?php echo $row['rubriek_naam'] ?>
                </td>
                <td id="btblcelb">
                    <?php echo $ad_tekst ?>
                </td>
            </tr>
            <tr>
                <td id="btblrijz" colspan="2">
                    <i>geplaatst: <?php echo $geplaatst ?></i>
                </td>
            </tr>
        </table>

        <table id="biedingentabel">
            <tr id="btblrij1">
                <td>prijs: <?php echo $vanaf; ?></td>
                <td>$  <?php echo $row['artikel_prijs']; ?></td>
            </tr>
            <tr>
                <td colspan="2">Biedingen:</td>
            </tr>

            <?php schrijf_biedingen($row['ad_id']) ?>

            <tr>
                <td>
<?php
                if ($profiel == 0) {
                    if ($row['gebruikersnaam'] != $gebruikersnaam) {
?>
                        bedrag:&nbsp;&nbsp;&nbsp;
                        <input type="text" id="bieding" placeholder="$ 0,00"></td><td>
                        <button id="biedknop" onclick="bieden(<?php echo $gebruikerid . ', ' . $row['ad_id'] ?>)">bieden</button>
<?php
                    }
                } else {
?>
                    <button id="verwijder_ad" onclick="verwijder_ad(<?php echo $row['ad_id'] ?>)">X</button>
<?php
                }
?>
                </td>
            </tr>
        </table>
    <?php
    }
    ?>
    </div>
