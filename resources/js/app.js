import "./bootstrap";
import "bootstrap";
console.log("hello tests test")
const show = localStorage.getItem("showsidebar") !== null ? localStorage.getItem("showsidebar") : localStorage.setItem("showsidebar" , "true")
window.toggleSideBar = () => {
     $("#sideBar").style.display = "block"
     localStorage.setItem("showsidebar" , "true")
 }
 if (show === "true"){
     $("#sideBar").style.display = "block"
 }else {
     $("#sideBar").style.display = "none"
 }
window.hideSideBar = () => {
     console.log("hide me")
    $("#sideBar").style.display = "none"
    localStorage.setItem("showsidebar" , "false")

}
