// Codice per rendere visibile o meno la checkbox per la dedica
function displayarea() {
    var deditxt = document.getElementById('deditext'); 
    var cheks = document.getElementById('dedicaon'); 
    if (cheks.checked == true) {
        deditxt.style.display = "block";
    } else {
        deditxt.style.display = "none";
    }
}

function displayrazza() {
    var scelcate = document.getElementById('scelcate');
    var displayraces = document.getElementById('races');

    if (scelcate.onchange != "disabled") {
        scelcate.onchange = displayraces.removeAttribute("disabled");
    } 
}