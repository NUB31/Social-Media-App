var edit = 0;
function editP() {
    if (edit == 0) {
        document.getElementById("pp_form").style.display = "flex";
        document.getElementById("username").style.display = "none";
        document.getElementById("edit-button").innerHTML = "go back";
        edit = 1;
    }else {
        document.getElementById("pp_form").style.display = "none";
        document.getElementById("username").style.display = "flex";
        document.getElementById("edit-button").innerHTML = "edit profile";
        edit = 0;
    }
}

if (document.getElementById("pp_form")) {
    document.getElementById("edit-button").style = "display: flex";
} else {
    document.getElementById("edit-button").style = "display: none";
}

