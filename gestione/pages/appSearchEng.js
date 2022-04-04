const button = document.querySelectorAll(".lebutton");

function hideBut(btn) {
    btn.setAttribute("hidden", "");
};

function newBut(btn) {
    const newBtn = document.createElement("button");
    newBtn.innerHTML = "Aggiorna";
    newBtn.name = "addValues";
    newBtn.type = "submit";
    newBtn.className = "btn btn-success"
    btn.parentElement.append(newBtn);
};

let fetchLink = "./updateEnt.php";

button.forEach(btn => {

    btn.addEventListener('click', function (eventi) {
        const row = eventi.target.parentNode.parentNode;
        const val = row.querySelectorAll("#view");

        val.forEach(vals => {
            vals.removeAttribute("disabled");
            
        });

        hideBut(btn);
        newBut(btn);    

    });

});