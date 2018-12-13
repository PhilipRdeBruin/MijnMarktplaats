
    <div class="hoofdsectie">
        <div class="overzichtheader">
            <table id="overzichtstabelheader">
                <tr>
                    <th width="15%">Categorie</th><th width="5%"></th>
                    <th width="15%">Auteur</th><th width="5%"></th>
                    <th width="30.5%">Advertentie</th><th width="5%"></th>
                    <th width="22.5%">Geplaatst</th><th width="5%"></th>
                </tr>
            </table>
        </div>
        <div class="overzicht">
            <table id="overzichtstabel">
<?php
            $result = fetch_advertenties();

            $opm = 0;
            foreach ($result as $row) {
                $opm = ($opm == 1) ? 2 : 1;
                $tv = ($row['tussenvoegsel'] != "") ? " " . $row['tussenvoegsel'] : "";
                $naam = $row['voornaam'] . $tv . " " . $row['achternaam'];
                $geplaatst = date_format(date_create($row["ad_geplaatst"]), "d-m-Y H:i:s");
?>
                <tr id="regel<?php echo $opm; ?>">
                    <td width="20%"><?php echo $row['rubriek_naam']; ?></td>
                    <td width="20%"><?php echo $naam; ?></td>
                    <td width="35%"><?php echo $row['ad_naam']; ?></td>
                    <td width="25%"><?php echo $geplaatst; ?></td>
                </tr>
<?php
            }
?>
            </table>
        </div>
        <br/><hr/>

        <div class="advertenties">
<?php
        foreach ($result as $row) {
            $tv = ($row['tussenvoegsel'] != "") ? " " . $row['tussenvoegsel'] : "";
            $naam = $row['voornaam'] . $tv . " " . $row['achternaam'];
            $geplaatst = date_format(date_create($row['ad_geplaatst']), "d-m-Y H:i:s");
            $ad_tekst = fetch_verhaal($row['ad_id'], "advertentie", "advertenties");
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
                        <i>rubriek:</i> <?php $row['rubr_id'] ?>
                    </td>
                    <td id="btblcelb">
                        <?php echo $ad_tekst ?>
                    </td>
                </tr>
                <tr>
                    <td id="btblrijz" colspan="2">
                        <i>geplaatst: <?php $geplaatst ?></i>
                    </td>
                </tr>
<?php
                if ($row['gebruikersnaam'] == $gebruikersnaam) {
?>
                <tr>
                    <form action="setup.php" method="post">
                        <td>
                            <input type="submit" class = "biedknoppen"
                                   name="bieden<?php echo $row['ad_id'] ?>" value="bieden">
                        </td>
                    </form>
                </tr>
<?php
                }
?>
            </table>
<?php
        }
?>
        </div>
    </div>
