
function bieden(gebr, ix) {
    elem_id = "bieding" + ix;
    bieding = document.getElementById(elem_id);
    window.location.href = "setup.php?plaats_bod=" + ix + "&koper=" + gebr + "&bod=" + bieding.value;
}

function plaats_foto(ix, fotostring) {
    str_pad = "advertenties/fotos/";
    gal_id = "fotogalerij" + ix;
    galerij = document.getElementById(gal_id);
    foto_arr = fotostring.split(";");

    construct_string = "<p id='foto_header'><u><i>Foto's</i></u></p>";
    for (i = 0; i < foto_arr.length; i++) {
        construct_string = construct_string + "<img src=" + str_pad + foto_arr[i] + " id='ad_foto'>"
    }
    galerij.innerHTML = construct_string;
}

//function plaats_foto_ins() {
//    alert ("Hallo");
//    fotodiv = document.getElementById("fotos");
//    fotonw = document.getElementById("hidden_uploadbestand");
//    strx = "<img src ='" + fotonw.innerHTML + "' class='fotonw'>";
//    fotostr = fotodiv.innerHTML + strx;
//    alert ("fotostr = " + fotostr);
//    fotodiv.innerHTML = fotostr;
//}

function verwijder_ad(ix) {
    window.location.href = "setup.php?verwijder_ad=" + ix;
}

function write_profiel_to_title(nm) {
    titel = document.getElementById('titel');
    titel.innerHTML = "Profiel van " + nm;
}


/*  JQuery-functies   */

$(function() {
	$("#prijs_vanaf2").mouseover(function() {
        tabelrij = document.getElementById("trnieuwerubriek");
        tabelrij.style.visibility = 'visible';
	});
});

$(function() {
	$("#file_to_upload").change(function() {
        uploadbestand = document.getElementById('file_to_upload');
        if (uploadbestand.value == "Geen bestand geselecteerd.") {
            uploadbestand.style.color = "#eee";
        } else {
            uploadbestand.style.color = "#228";
        }
	});
});

$(function() {
	$("#prijs_vanaf").mouseover(function() {
        chkinfo = document.getElementById('chkinfo');
        chkinfo.innerHTML = "indien aangevinkt: bieden mogelijk...";
        chkinfo.style.color = "red";
	});
});

$(function() {
	$("#prijs2_vanaf").mouseover(function() {
        chkinfo = document.getElementById('chkinfo');
        chkinfo.innerHTML = "indien aangevinkt: biedingen onder vraagprijs toegestaan...";
        chkinfo.style.color = "red";
	});
});

$(function() {
	$("#prijs_vanaf, #prijs2_vanaf").mouseout(function() {
        chkinfo = document.getElementById('chkinfo');
        chkinfo.style.color = "#eee";
	});
});
