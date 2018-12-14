
    <div class="overzichtheader">
        <table id="overzichtstabelheader">
            <tr>
                <th width="12.5%">Categorie</th><th width="5%"></th>
                <th width="13.5%">Auteur</th><th width="5%"></th>
                <th width="26%">Advertentie</th><th width="5%"></th>
                <th width="5%">Prijs</th><th width="5%"></th>
                <th width="20%">Geplaatst</th><th width="5%"></th>
            </tr>
        </table>
    </div>

    <div class="overzicht">
        <table id="overzichtstabel">
<?php
        $opm = 0;
        foreach ($result as $row) {
            $opm = ($opm == 1) ? 2 : 1;
            $tv = ($row['tussenvoegsel'] != "") ? " " . $row['tussenvoegsel'] : "";
            $naam = $row['voornaam'] . $tv . " " . $row['achternaam'];
            $geplaatst = date_format(date_create($row["ad_geplaatst"]), "d-m-Y H:i:s");
?>
            <tr id="regel<?php echo $opm; ?>">
                <td width="17.5%"><?php echo $row['rubriek_naam']; ?></td>
                <td width="17.5%"><?php echo $naam; ?></td>
                <td width="30%"><?php echo $row['ad_naam']; ?></td>
                <td class="align_rechts" width="10%">$  <?php echo $row['artikel_prijs']; ?></td>
                <td class="align_rechts" width="22.5%"><?php echo $geplaatst; ?></td>
            </tr>
<?php
        }
?>
        </table>
    </div>
