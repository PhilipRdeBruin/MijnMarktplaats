
<?php

    switch ($site) {
    case 'index':
        if ($gebruikersnaam == "") {
            $nnav = 1;
            $nav[0][0] = 'ainlog'; $nav[1][0] = 'inlog.php'; $nav[2][0] = 'Inloggen';
        } elseif ($profiel > 0) {
            $nnav = 3;
            $nav[0][0] = 'ahome'; $nav[1][0] = 'index.php'; $nav[2][0] = 'Hoofdpagina';
            $nav[0][1] = 'auitlog'; $nav[1][1] = 'uitloggen.php'; $nav[2][1] = 'Uitloggen';
            $nav[0][2] = 'aplaatsen'; $nav[1][2] = 'plaatsen.php';
            $nav[2][2] = 'Advertentie<span class="grey">_</span>plaatsen';
        } else {
            $nnav = 3;
            $nav[0][0] = 'auitlog'; $nav[1][0] = 'uitloggen.php'; $nav[2][0] = 'Uitloggen';
            $nav[0][1] = 'aplaatsen'; $nav[1][1] = 'plaatsen.php';
            $nav[2][1] = 'Advertentie<span class="grey">_</span>plaatsen';
            $nav[0][2] = 'aprofiel'; $nav[1][2] = 'profiel.php';
            $nav[2][2] = 'Mijn<span class="grey">_</span>profiel';
        }
        break;
    case 'inlog':
        $nnav = 1;
        $nav[0][0] = 'ahome'; $nav[1][0] = 'index.php'; $nav[2][0] = 'Hoofdpagina';
        break;
    case 'plaatsen':
        $nnav = 3;
        $nav[0][0] = 'ahome'; $nav[1][0] = 'index.php'; $nav[2][0] = 'Hoofdpagina';
        $nav[0][1] = 'auitlog'; $nav[1][1] = 'uitloggen.php'; $nav[2][1] = 'Uitloggen';
        $nav[0][2] = 'aprofiel'; $nav[1][2] = 'profiel.php';
        $nav[2][2] = 'Mijn<span class="grey">_</span>profiel';
        break;
    case 'profiel':
        $nnav = 3;
        $nav[0][0] = 'ahome'; $nav[1][0] = 'index.php'; $nav[2][0] = 'Hoofdpagina';
        $nav[0][1] = 'auitlog'; $nav[1][1] = 'uitloggen.php'; $nav[2][1] = 'Uitloggen';
        $nav[0][2] = 'aplaatsen'; $nav[1][2] = 'plaatsen.php';
        $nav[2][2] = 'Bericht<span class="grey">_</span>plaatsen';
    }
?>


<nav>
    <div id="standaardknoppen">
        <ul>
        <?php
            for ($i = 0; $i < $nnav; $i++) {
                echo '<li><a id="' . $nav[0][$i] . '" href="' . $nav[1][$i] . '">' . $nav[2][$i] . '</a></li>';
                echo '<li class="grey">xxx</li><li class="grey">xxx</li>';
            }
        ?>
        </ul>
    </div>
</nav>
