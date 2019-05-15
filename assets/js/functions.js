function goBack() {
  window.history.go(-1);
}
function switchView(source) {
  document.getElementById('contentframe').src = "./plugins/"+source.id+".php";
}
function collapsePane(pane) {
  if(document.getElementById(pane).style.height == "85px") {
    document.getElementById(pane).style.height = "auto";
    document.getElementById(pane+"_chevron").style.transform = "rotate(-180deg)";
  } else {
    document.getElementById(pane).style.height = "85px";
    document.getElementById(pane+"_chevron").style.transform = "rotate(0deg)";
  }
}
function createAlert(type,heading,content) {
  
}
