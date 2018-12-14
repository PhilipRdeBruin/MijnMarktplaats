
    <div class="hoofdsectie">
<?php
    $filterstring = ($profiel != 0) ? " AND gebr_id = $gebruikerid" : "";
    verwijder_oudebestanden();
    $result = fetch_advertenties($filterstring);

    include 'includes/index/schrijf_overzichtstabel.php';
?>
    <br/><hr/>
<?php
    include 'includes/index/schrijf_advertenties.php';
?>
    </div>
