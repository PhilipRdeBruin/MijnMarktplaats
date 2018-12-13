
function bieden(gebr, ix) {
    bieding = document.getElementById('bieding').value;
    window.location.href = "setup.php?plaats_bod=" + ix + "&koper=" + gebr + "&bod=" + bieding;
}

function verwijder_ad(ix) {
    window.location.href = "setup.php?verwijder_ad=" + ix;
}

function write_profiel_to_title(nm) {
    titel = document.getElementById('titel');
    titel.innerHTML = "Profiel van " + nm;
}
