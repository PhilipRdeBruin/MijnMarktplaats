
<?php

    /*  SUPER_GLOBAL VARIABELEN-FUNCTIES  */

    function ispostget ($arg) {
        $res = "";
        if (isset($_POST[$arg])) {
            $res = $_POST[$arg];
        } elseif (isset($_GET[$arg])) {
            $res = $_GET[$arg];
        }
        return $res;
    }

    function ispost ($arg) {
        $res = (isset($_POST[$arg])) ? $_POST[$arg] : "" ;
        return $res;
    }

    function isget ($arg) {
        $res = (isset($_GET[$arg])) ? $_GET[$arg] : "" ;
        return $res;
    }

    function issessie ($arg) {
        $res = (isset($_SESSION[$arg])) ? $_SESSION[$arg] : "" ;
        return $res;
    }


    /*  PHP-VERSIES VAN JAVASCRIPT FUNCTIES  */

    function phpAlert ($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }

    function phpAlertPlus ($msg, $redirectUrl="") {
        $redirect = "";
        if ($redirectUrl != "") { $redirect = "window.location.href = '" . $redirectUrl . "'"; }
        echo '<script type="text/javascript">alert("' . $msg . '"); ' . $redirect . '</script>';
    }

    function phpConfirm ($inpstr, $id, $redirectUrl="") {
        $redirectja = "window.location.href = '" . $redirectUrl . "?antw=ja&id=" . $id . "'";
        $redirectnee = "window.location.href = '" . $redirectUrl . "?antw=nee&id=" . $id . "'";
        echo '<script type="text/javascript">';
        echo 'antw = confirm ("' . $inpstr . '"); ';
        echo "if (antw == true) { $redirectja; } else { $redirectnee; }";
        echo '</script>';
    }

    function phpRedirect ($redirectUrl) {
        $redirect = "window.location.href = '" . $redirectUrl . "'";
        echo '<script type="text/javascript">' . $redirect . '</script>';
    }


    /*  FILE-FUNCTIES  */

    function detpad ($bestand, $submap) {
        $subpad = "";
        $defpad = getcwd();
        if (isset($submap)) { $subpad = $submap . "/"; }
        $pad = $defpad . "/" . $subpad;

        return $pad;
    }

    function leesbestand ($bestand, $submap="") {
        $pad = detpad($bestand, $submap);

        $res[0] = file($pad . $bestand);
        $res[1] = count($res[0]);
        return $res;
    }

    function schrijfbestand ($tp, $bestandsnaam, $inhoud, $submap="") {
        $pad = detpad($bestand, $submap);

        $bestand = fopen($pad . $bestandsnaam, $tp);
        fwrite($bestand, $inhoud . "\n");
        fclose($bestand);
    }

    function verwijderbestand ($bestand, $submap="") {
        $pad = detpad($bestand, $submap);

        unlink ($pad . $bestand);
    }


    /*  [CUSTOMIZED] STRING-FUNCTIES  */

    function schrijfstring ($str) {
        $strout = $str;
        $bsep = stripos($str, "||");
        if ($bsep) {
            $strout = substr($str, 0, $bsep);
            $str = substr($str, $bsep + 2);

            $cnt = 0;
            do {
                $cnt++;
                $bsep = stripos ($str, "||");
                if ($bsep) {
                    $strout = $strout . '\n' . substr ($str, 0, $bsep);
                    $str = substr ($str, $bsep + 2);
                }
            } while ($bsep && $cnt < 20);
            $strout = $strout . '\n' . $str;
        }
        return $strout;
    }


    /*  INLOG / REGISTRATIE FUNCTIES  */

    function blanktr($n = 1) {
        for ($i = 1; $i <= $n; $i++) {
            echo "<tr><td class='blank'>xxx</td><td class='blank'>xxx</td></tr>";
        }
    }

    function checkgelijkeww($ww1, $ww2) {
        $bww = true;
        if ($ww1 != $ww2) {
            $bww = false;
        }
        return $bww;
    }

    function registreer ($formtp, $label, $veldid, $req, $inptype, $waarde, $placeholder = "") {
        $class = $formtp . "form"; $lbclass = $class . "label";
        echo "<tr><td class='$lbclass'>";
        echo "$label:";
//        if (strtolower(substr($waarde, 0, 10)) == "wachtwoord") {
//            $label = $waarde;
//            $waarde = "";
//        } else {
//            $label = strtolower($label);
//        }
//        if ($req == "req") {
//            echo "<super>*</super>";
//            $required = "required";
//        } else {
//            $required = "";
//        }

        if ($req == "req") { echo "<super> *</super>"; }
        $required = ($req == "req") ? "required" : "";
        $placeholder = ($placeholder == "") ? "" : " placeholder = '$placeholder'";
        echo "</td><td>";
        echo "<input $required type='$inptype' class='$class' id='$veldid' name='$veldid' value='$waarde' $placeholder>";
        echo "</td></tr>";
    }
