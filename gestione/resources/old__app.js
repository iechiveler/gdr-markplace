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

function displayrazza(event) {
    var scelcate = document.getElementById('scelcate');
    var displayraces = document.getElementById('races');
    let fetchLink = './resources/raceCall.php';
    var category = event.target.value;

    if (scelcate.onchange != "disabled") {
        scelcate.onchange = displayraces.removeAttribute("disabled");
    } 

    fetch(fetchLink, { 
        method: 'post',
        headers: { "Content-Type": "application/json; charset=utf-8" },
        body: category 
    })
        .then(res => res.text()) // parse response as JSON (can be res.text() for plain response)
        .then(response => {
            document.querySelector('.race-select').addEventListener("change", displayrazza);
            document.querySelector('.race-select').innerHTML = '<option selected>Scegli la razza animale ...</option>';
            document.querySelector('.race-select').innerHTML += response;
        })
        .catch(err => {
            console.log("u")
            alert("sorry, there are no results for your search")
        });
}