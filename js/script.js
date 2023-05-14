
const navButton = document.getElementById('navButton')
const nav = document.getElementById('navSideBar')


window.onresize = function() {
    winVal=window.innerWidth;
    if (winVal>=788.98) {
        nav.style.transform = 'translateX(0%)'
    }
    else{
        nav.style.transform = 'translateX(100%)'
    }

}

navButton.addEventListener('click', function(){

    if(nav.style.transform === 'translateX(100%)' || nav.style.transform === ""){
        nav.style.transform = 'translateX(0%)'
    }
    else if (nav.style.transform === 'translateX(0%)'){
        nav.style.transform = 'translateX(100%)'
    }
})