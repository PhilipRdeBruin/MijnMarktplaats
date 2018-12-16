
<?php
    if (issessie('advertentieknop') != "") {
        if (issessie('rubriekid') != "" && issessie('rubriekid') != "leeg" && issessie('advertentie') != "") {
            $tijd = date("Y-m-d H:i:s", time());
            plaats_advertentie($tijd);
            if ($advertentieknop == "Plaats advertentie") {
                $ad_id = get_nieuw_advertentie_id($advertentie_naam, $tijd);
            }
            $ix = str_pad($ad_id, 4, '0', STR_PAD_LEFT);
            schrijf_advertentiebestand($ix, $gebruikersnaam, $advertentie_naam, $rubriek, $tijd);
            unset_plaats_ad_sessievariabelen();
            header ("Location: http://localhost/mijnprojecten/mijnmarktplaats/index.php");
        } else {
            $msgstr = schrijfstring("Je hebt niet alle verplichte velden ingevuld. || || Probeer opnieuw.");
            phpAlert($msgstr);
        }
    }

    if(ispost("upload_submit") != "") {
        include "includes/plaatsen/upload_fotos.php";
    }
?>

<div class="hoofdsectie">
    <form id="ad_invoerform" action="setup.php" method="post">
        <h4 id="advertentie"><u><?php echo $advertentie_header;?></u></h4>
        <table>
            <tr><td width="250">Advertentie: <super>*</super></td><td colspan="2"><input required type="text" id="ad_naam" name="ad_naam" value= '<?php echo $advertentie_naam; ?>'></td></tr>
            <tr><td>Categorie: <super>*</super></td>
            <td colspan="2">
                <select name="rubriek" id="rubriek">
                    <option value="leeg"></option>
                    <?php vul_rubrieken($rubriek); ?>
                </select>
            </td></tr>
            <tr><td>Prijs: <super>*</super></td><td><input required type="text" id="art_prijs" name="art_prijs" value= '<?php echo $prijs; ?>' placeholder="$    0.00"></td>
            <td>Prijs vanaf:&nbsp;&nbsp;&nbsp;
                <input type="checkbox" id="prijs_vanaf" name="prijs_vanaf" value='vanaf' <?php echo $prijs_vanaf ?>>
                <input type="checkbox" id="prijs2_vanaf" name="prijs_vanaf2" value='vanaf' <?php echo $prijs_vanaf2 ?>>
<!--                <super class="voetnoot">1)</super>  -->
            </td><td id="chkinfo" class="px12"></td></tr>
            <?php if ($advertentieknop == "Plaats advertentie") { $advertentie_id = ""; } ?>
            <?php blanktr(); ?>
            <tr><td colspan="2" id="ad_omschrijving"><u><i>Omschrijving:</i></u></td></tr>
            <input type="hidden" name="advertentie_id" value=" <?php echo $advertentie_id; ?> ">
            <tr><td colspan="3"><textarea id="advertentie" name="advertentie" rows="8" cols="80"><?php echo $advertentie; ?></textarea><br/><br/></td></tr>
            <tr><td></td><td></td>
            <td><input type="submit" id="advertentieknop" name="advertentieknop" value="<?php echo $advertentieknop; ?>"></td></tr>
            <input type="hidden" id="advertentie_inp_hidden" value=" <?php echo $advertentieknop; ?> ">
        </table>
    </form>
    <br/>
    <form action="plaatsen.php" method="post" enctype="multipart/form-data">
        <span  class="px14">Kies foto's om te uploaden:</span>
        <input type="file" name="file_to_upload" class="px14, blank" id="file_to_upload">
        <input type="submit" id="upload_submit" name="upload_submit" value="Upload Image">
    </form>
    <div id="fotos"><?php plaats_nieuwe_fotos() ?></div>
    <br/>
    <p class="px12, dgrey"><super>*</super>  <i>verplicht veld</i></p>
<!-- <p class="dgrey"><super class="px10">1)</super>  <i class="px11">2e checkbox geeft aan of biedingen onder de vraagprijs geaccepteerd mogen worden.</i></p>  -->
</div>
