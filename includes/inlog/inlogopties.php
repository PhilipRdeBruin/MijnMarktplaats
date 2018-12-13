
<div class="hoofdsectie">

<?php
    $registerknop = issessie('registerknop');
    if (issessie('registerknop') == "") {
        include 'includes/inlog/inloggen.php';
    } else {
        include 'includes/inlog/registreren.php';
    }
?>
</div>
