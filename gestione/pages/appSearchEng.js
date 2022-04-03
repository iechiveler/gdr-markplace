const button = document.querySelectorAll(".lebutton");

button.forEach(btn => {
    btn.addEventListener('click', function (eventi) {
        rowbtn = eventi.target;
        row = eventi.target.parentNode.parentNode;
        val = row.querySelectorAll("#view");

        val.forEach(vals => {
            vals.removeAttribute("disabled");
        });

    });

});