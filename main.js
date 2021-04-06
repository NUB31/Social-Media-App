var textfield1 = document.getElementById("bg-text-input");
var textfield2 = document.getElementById("text-text-input");
var textfield3 = document.getElementById("hover-text-input");
var textfield4 = document.getElementById("box-text-input");
var color1 = document.getElementById("bg-input");
var color2 = document.getElementById("text-input");
var color3 = document.getElementById("hover-input");
var color4 = document.getElementById("box-input");

function updateColor() {
    if (!textfield1.value.includes("#")) {
        textfield1.value = "#" + textfield1.value;
    }
    textfield1.value = color1.value;
    textfield2.value = color2.value;
    textfield3.value = color3.value;
    textfield4.value = color4.value;
    document.body.style.backgroundColor = color1.value;
    document.body.style.color = color2.value;
    document.getElementById("setting-wrapper").style.backgroundColor = color4.value;
}

function updateText() {
    if (!textfield1.value.includes("#")) {
        textfield1.value = "#" + textfield1.value;
    }
    color1.value = textfield1.value;
    color2.value = textfield2.value;
    color3.value = textfield3.value;
    color4.value = textfield4.value;
    document.body.style.backgroundColor = color1.value;
    document.body.style.color = color2.value;
    document.getElementById("setting-wrapper").style.backgroundColor = color4.value;
}

function resetCol() {
    color1.value = "#ffffff";
    color2.value = "#000000";
    color3.value = "#ff0000";
    color4.value = "#DCDCDC";
    textfield1.value = color1.value;
    textfield2.value = color2.value;
    textfield3.value = color3.value;
    textfield4.value = color4.value;
    document.body.style.backgroundColor = color1.value;
    document.body.style.color = color2.value;
    document.getElementById("setting-wrapper").style.backgroundColor = color4.value;
}