
<?php

    function insert_gebruikers($kolommen, $waarden) {
        $conn = dbconnect("sqli");
        $sql = "INSERT INTO gebruikers ($kolommen) VALUES ($waarden);";
        $conn->query($sql);
        dbdisconnect("sqli", $conn);
    }

    function plaats_advertentie() {
        $tijd = date("Y-m-d H:i:s", time());
        $conn = dbconnect ("sqli");
        $sql = "INSERT INTO advertenties (
                            ad_naam,
                            ad_omschrijving,
                            ad_rubr_id,
                            artikel_prijs,
                            prijs_vanaf,
                            ad_verkoper_id,
                            ad_geplaatst,
                            ad_laatste_act,
                            ad_status)
                VALUES     ('" . $_SESSION['ad_naam'] . "',
                            '" . $_SESSION['advertentie'] . "',
                            '" . $_SESSION['rubriekid'] . "',
                            '" . $_SESSION['art_prijs'] . "',
                            '" . $_SESSION['prijs_vanaf'] . "',
                            '" . $_SESSION['gebruikerid'] . "',
                            '" . $tijd . "',
                            '" . $tijd . "',
                            'open'
                );";

        $conn->query($sql);
        dbdisconnect ("sqli", $conn);
    }

    function select_gebruikerid($gebr) {
        $conn = dbconnect ("sqli");
        $sql = "SELECT gebr_id FROM gebruikers WHERE gebr_naam = '$gebr';";
        $result = $conn->query($sql);
        if ($result && $row = $result->fetch_assoc()) {
            $gebr_id = $row['gebr_id'];
        }
        dbdisconnect("sqli", $conn);

        return $gebr_id;
    }

    function select_gebruikers($gebr) {
        $gebr_naam = "";
        $conn = dbconnect("sqli");
        $sql = "SELECT gebr_naam FROM gebruikers WHERE gebr_naam = '$gebr';";
        $result = $conn->query($sql);
        if ($result && $row = $result->fetch_assoc()) {
            $gebr_naam = $row['gebr_naam'];
        }
        dbdisconnect("sqli", $conn);

        return $gebr_naam;
    }

    function select_rubriek_id($rubr) {
        $conn = dbconnect ("sqli");
        $sql = "SELECT rubr_id FROM rubrieken WHERE rubriek_naam = '$rubr';";
        $result = $conn->query($sql);
        if ($result && $row = $result->fetch_assoc()) {
            $rubr_id = $row['rubr_id'];
        }
        dbdisconnect("sqli", $conn);

        return $rubr_id;
    }

    function update_laatste_login ($gebr) {
        update_laatste_loginuit ("login", $gebr);
    }

    function update_laatste_loguit ($gebr) {
        update_laatste_loginuit ("loguit", $gebr);
    }

    function update_laatste_loginuit ($type, $gebr) {
        $xtijd = ($type == "login") ? time() + 1000000 : time();
        $tijd = date("Y-m-d H:i:s", $xtijd);
        $conn = dbconnect("sqli");
        $sql = "UPDATE gebruikers SET laatste_logindatum = '$tijd' WHERE gebruikersnaam = '$gebr';";
        $conn->query($sql);
        dbdisconnect ("sqli", $conn);
    }

?>
