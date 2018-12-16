
<?php
    foreach ($result as $row) {
?>
        <div class="advertenties">
<?php
            $ix = $row['ad_id'];
            $tv = ($row['tussenvoegsel'] != "") ? " " . $row['tussenvoegsel'] : "";
            $naam = $row['voornaam'] . $tv . " " . $row['achternaam'];
            $vanaf = ($row['prijs_vanaf'] == 1) ? "(vanaf)" : "";
            $geplaatst = date_format(date_create($row['ad_geplaatst']), "d-m-Y H:i:s");
            $ad_tekst = fetch_verhaal($ix, "advertentie", "advertenties");
            if ($ad_tekst == "") { $ad_tekst = $row['ad_omschrijving']; }

?>
            <table id="advertentieplustabel">
                <tr><td id="tbplusk1">
                    <table id="advertentietabel">
                        <tr id="btblrij1">
                            <td class="btblcel1" id="auteurnaam" <?php echo $row['gebr_id']; ?> width="30%">
                                <?php echo $naam; ?>
                            </td>
                            <td class="btblrij1" width="70%">
                                <?php echo $row['ad_naam']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td id="btblcelx">
                                <i>rubriek:</i> <?php echo $row['rubriek_naam']; ?>
                            </td>
                            <td id="btblcelb">
                                <?php echo $ad_tekst; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="px12" id="btblrijz">
                                postcode: <?php echo $row['postcode']; ?>
                            </td>
                            <td id="btblrijz">
                                <i>geplaatst: <?php echo $geplaatst; ?></i>
                            </td>
                        </tr>
                    </table>

                    <div class="fotogalerij" id="fotogalerij<?php echo $ix; ?>">
<!--                        <div id="foto_header<?php // echo $ix; ?>">Foto's</div>  -->
                        <?php plaats_fotos($ix); ?>
                    </div></td>

                    <td id="tbplusk2"><table id="biedingentabel">
                        <tr id="btblrij1">
                            <td>prijs: <?php echo $vanaf; ?></td>
                            <td>$  <?php echo $row['artikel_prijs']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" id="btblrijy">Biedingen:</td>
                        </tr>

                        <?php schrijf_biedingen($ix) ?>

                        <tr>
                            <td>
<?php
                            if ($profiel == 0) {
                                if ($row['gebruikersnaam'] != $gebruikersnaam && $gebruikersnaam != "") {
?>
                                    bedrag:&nbsp;&nbsp;&nbsp;
                                    <input type="text" class = "biedingen" id="bieding<?php echo $ix ?>" placeholder="$ 0,00"></td><td>
                                    <button id="biedknop" onclick="bieden(<?php echo $gebruikerid . ', ' . $ix ?>)">bieden</button>
<?php
                                }
                            } else {
?>
                                <button id="verwijder_ad" onclick="verwijder_ad(<?php echo $ix ?>)">X</button>
<?php
                            }
?>
                            </td>
                        </tr>
                    </table>
                </td></tr>
            </table>
        </div>
        <br/><hr class="hr75grijs"/>
<?php
    }
?>
