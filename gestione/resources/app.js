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

//Codice per assegnare razza al generatore di certificati
function scelCategory(event) {

    var scelcate = document.getElementById('scelcate');
    var displayraces = document.getElementById('races');
    let fetchLink = './resources/raceCall.php';
    var category = event.target.value;

    if (scelcate.onchange != "disabled") {
        scelcate.onchange = displayraces.removeAttribute("disabled");
    };

    fetch(fetchLink, {
        method: 'post',
        headers: { "Content-Type": "application/json; charset=utf-8" },
        body: category
    })
        .then(res => res.text())
        .then(response => {
            document.querySelector('.race-select').innerHTML = '<option selected>Scegli la razza animale ...</option>';
            document.querySelector('.race-select').innerHTML += response;
        });

};

// Add event listener for certificate searchs
function searchAnim() {
    addEventListener("change", (event) => {
        let fetchLink = "./resources/search-animal.php";
        const nameSrc = event.target.value;

        fetch(fetchLink, {
            method: 'post',
            headers: { "Content-Type": "application/json; charset=utf-8" },
            body: nameSrc
        })
            .then(res => res.text())
            .then(response => {
                document.querySelector('.resp').innerHTML = response;
            });

    });
}

// Select for Oggetti category
function scelOggCategory(event) {

    let fetchLink = './resources/object-call.php';
    var category = event.target.value;

    fetch(fetchLink, {
        method: 'post',
        headers: { "Content-Type": "application/json; charset=utf-8" },
        body: category
    })
        .then(res => res.text())
        .then(response => {
            document.querySelector('.object-select').innerHTML = '<option selected>Scegli oggetto ...</option>';
            document.querySelector('.object-select').innerHTML += response;

        });

};