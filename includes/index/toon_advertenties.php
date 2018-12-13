
    <div class="hoofdsectie">
<?php
    $filterstring = ($profiel != 0) ? " WHERE gebr_id = $gebruikerid" : "";
    $result = fetch_advertenties($filterstring);

    include 'includes/index/schrijf_overzichtstabel.php';
?>
    <br/><hr/>
<?php
    include 'includes/index/schrijf_advertenties.php';
?>
    </div>
