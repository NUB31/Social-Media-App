setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "users.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                document.getElementById("friends").innerHTML = "<h3>friends</h3>" + data;
            }
        }
    }
    xhr.send();
}, 1000);