var messagebox = document.getElementById("msgbox-wrapper");
var messagebox_inside = document.getElementById("msgbox");
var chat_ico = document.getElementById("messageico");
var userid;
var clicked = false;

let xhr = new XMLHttpRequest();
xhr.open("GET", "users.php", true);
xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;
            document.getElementById("friends").innerHTML = "<h3>Your friends</h3>" + data;
        }
    }
}
xhr.send();

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "users.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                document.getElementById("friends").innerHTML = "<h3>Your friends</h3>" + data;
            }
        }
    }
    xhr.send();
}, 10000);

function openmsgbox(){    
var x = document.getElementsByClassName("message_reciever");
for (var i = 0; i < x.length; i++) {
    x[i].style.display = "none";
    clicked = true;
}
    message();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "loaduser.php", true);
    xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let person = xhr.response;
            messagebox_inside.innerHTML = person;
            scrollToBottom();
        }
    }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("userid=" + userid);
    setInterval(() => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "loaduser.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let person = xhr.response;
                messagebox_inside.innerHTML = person;
                scrollToBottom();
            }
        }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("userid=" + userid);
    }, 1000);
}


function message() {
    messagebox.style.display = "block";
    chat_ico.style.display = "none";
    if (clicked == false) {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "messages.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let messagefriends = xhr.response;
                    document.getElementById("msgbox").innerHTML = messagefriends;
                }
            }
        }
        xhr.send();
    }
    setInterval(()=>{
        if (clicked == false) {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "messages.php", true);
            xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let messagefriends = xhr.response;
                        document.getElementById("msgbox").innerHTML = messagefriends;
                    }
                }
            }
            xhr.send();
        }
    }, 10000);
}

function scrollToBottom(){
    var chatBox = document.getElementById("message-column-id");
    chatBox.scrollTop = chatBox.scrollHeight;
}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}