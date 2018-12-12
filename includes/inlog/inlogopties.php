
<div class="hoofdsectie">

<?php
    if (issessie('registerknop') == "") {
        include 'includes/inlog/inloggen.php';
    } else {
        include 'includes/inlog/registreren.php';
    }
?>
</div>
