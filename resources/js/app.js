import "./bootstrap";
import "bootstrap";
console.log("hello tests test")
window.toggleSideBar = () => {
    console.log("hide this this")
    if (window.screen.width < 400){
        document.getElementById("sideBar").style.display = "none"
    }
    localStorage.setItem("showsidebar" , "true")
 }
function hide() {
    console.log("hide this this")
    document.getElementById("sideBar").style.display = "none"
    localStorage.setItem("showsidebar" , "true")
}
function show() {
    console.log("show me")
    document.getElementById("sideBar").style.display = "block"
    localStorage.setItem("showsidebar" , "false")
}
window.hideSideBar = () => {
     console.log("hide me")
     document.getElementById("sideBar").style.display = "block"
    localStorage.setItem("showsidebar" , "false")
}
if (window.screen.width < 400){
    document.getElementById("sideBar").style.display = "none"
}
