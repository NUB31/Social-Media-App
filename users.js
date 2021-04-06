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
}, 1000);

var clicked = false;

function openmsgbox(){
    var personclicked = document.getElementById("salam");
    personclicked.style.display = "none";
    clicked = true;
}

 {
    setInterval(()=>{
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
    }, 1000);
}