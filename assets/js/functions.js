var paneheight;

function goBack() {
  window.history.go(-1);
}
function switchView(source) {
  document.getElementById('contentframe').src = "./plugins/"+source.id+".php";
}
function collapsePane(pane) {
  if(document.getElementById(pane).style.height == "89px") {
    document.getElementById(pane).style.height = "auto";
    document.getElementById(pane+"_chevron").style.transform = "rotate(-180deg)";
  } else {
    document.getElementById(pane).style.height = "89px";
    document.getElementById(pane+"_chevron").style.transform = "rotate(0deg)";
  }
}
function createAlert(type,heading,content) {

}
function showLoader() {
  document.getElementById('loader').style.display = "block";
}
function hideLoader() {
  document.getElementById('loader').style.display = "none";
}
function isFrameLoading() {
  showLoader();
  var ifr=document.getElementById('contentframe');
    ifr.onload=function(){
      hideLoader();
    };
}
// change Root Styling: document.documentElement.style.setProperty('--your-variable', '#YOURCOLOR');
