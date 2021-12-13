import "./bootstrap";
 window.toggleSideBar = () => {
    let body = document.querySelector('body');
    if(body.classList.contains('show-side-bar')){
        body.classList.remove('show-side-bar');
    }else{
        body.classList.add('show-side-bar')
    }
 }