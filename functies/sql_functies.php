
<?php

    function delete_advertentie($ix) {
        $conn = dbconnect("sqli");
        $sql = "DELETE FROM advertenties WHERE ad_id = $ix;";
        $conn->query($sql);
        dbdisconnect("sqli", $conn);
    }

    function fetch_advertenties($filterstring) {
        $conn = dbconnect("sqli");
        $sql = "SELECT * FROM advertenties a
            INNER JOIN gebruikers g
            ON a.verkoper_id = g.gebr_id
            INNER JOIN rubrieken r
            ON a.rubriek_id = r.rubr_id
            WHERE ad_status = 'open'
            $filterstring
            ORDER BY ad_id DESC;";
//        echo "sql = $sql";
//        die();
        $result = $conn->query($sql);
        dbdisconnect("sqli", $conn);

        return $result;
    }

    function fetch_biedingen($ad_id) {
        $conn = dbconnect("sqli");
        $sql = "SELECT b.bod_id, b.bod, g.gebruikersnaam FROM biedingen b
            INNER JOIN gebruikers g
            ON b.koper_id = g.gebr_id
            WHERE advertentie_id = $ad_id
            ORDER BY bod_geplaatst DESC;";
        $result = $conn->query($sql);
        dbdisconnect("sqli", $conn);

        return $result;
    }

    function get_max_bod($id) {
        $conn = dbconnect("sqli");
        $sql = "SELECT bod FROM biedingen
                ORDER BY bod DESC;";
        $result = $conn->query($sql);
        if ($result && $row = $result->fetch_assoc()) {
            $max_bod = $row['bod'];
        }
        dbdisconnect("sqli", $conn);

        return $max_bod;
    }

    function get_nieuw_advertentie_id ($advertentie_naam, $tijd) {
        $conn = dbconnect("sqli");
        $sql = "SELECT ad_id FROM advertenties
                WHERE ad_naam = '$advertentie_naam' AND ad_geplaatst = '$tijd';";
        $result = $conn->query($sql);
        if($row = $result->fetch_assoc()) { $ad_id = $row['ad_id']; }
        $conn = dbconnect ("sqli");

        return $ad_id;
    }

    function get_nieuw_gebruikerid ($gebruikersnaam) {
        $conn = dbconnect("sqli");
        $sql = "SELECT gebr_id FROM gebruikers
                WHERE gebruikersnaam = '$gebruikersnaam';";
        $result = $conn->query($sql);
        if($row = $result->fetch_assoc()) { $gebruikerid = $row['gebruikerid']; }
        $conn = dbconnect ("sqli");

        return $gebruikerid;
    }

    function insert_bod($id, $koper, $bedrag) {
        $tijd = date("Y-m-d H:i:s", time());
        $conn = dbconnect("sqli");
        $sql = "INSERT INTO biedingen (advertentie_id, koper_id, bod, bod_geplaatst)
                VALUES ('$id', '$koper', '$bedrag', '$tijd');";
        $conn->query($sql);
        dbdisconnect("sqli", $conn);
    }

    function insert_gebruikers($kolommen, $waarden) {
        $conn = dbconnect("sqli");
        $sql = "INSERT INTO gebruikers ($kolommen) VALUES ($waarden);";
        $conn->query($sql);
        dbdisconnect("sqli", $conn);
    }

    function plaats_advertentie($tijd) {
        $conn = dbconnect ("sqli");
        $sql = "INSERT INTO advertenties (
                            ad_naam,
                            ad_omschrijving,
                            rubriek_id,
                            artikel_prijs,
                            prijs_vanaf,
                            verkoper_id,
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

    function select_ad_naam($ix) {
        $conn = dbconnect("sqli");
        $sql = "SELECT ad_naam FROM advertenties WHERE ad_id = $ix;";
        $result = $conn->query($sql);
        if ($result && $row = $result->fetch_assoc()) {
            $ad_naam = $row['ad_naam'];
        }
        dbdisconnect("sqli", $conn);

        return $ad_naam;
    }

    function select_gebruikerid($gebr) {
        $gebr_id = "";
        $conn = dbconnect ("sqli");
        $sql = "SELECT gebr_id FROM gebruikers WHERE gebruikersnaam = '$gebr';";
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
        $sql = "SELECT gebruikersnaam FROM gebruikers WHERE gebruikersnaam = '$gebr';";
        $result = $conn->query($sql);
        if ($result && $row = $result->fetch_assoc()) {
            $gebr_naam = $row['gebruikersnaam'];
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
