var edit = 0;

var searchbar = document.getElementById("")

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

const searchBar = document.getElementById("searchbarinput");
const contentarea = document.getElementById("hidden-search");
const contentareawrapper = document.getElementById("hidden-search-wrapper");

searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchbarinput.classList.add("border-n-n");
    searchbarinput.classList.add("border-n-n");
    contentareawrapper.classList.add("border-u-u");
  }else{
    searchbarinput.classList.remove("border-n-n");
    contentareawrapper.classList.remove("border-u-u");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          contentarea.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

