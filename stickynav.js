
window.addEventListener("scroll", function() {
    var header = document.querySelector('header');
    header.classList.toggle("scrolled", window.scrollY > 0);
    var navItemAnchor = document.getElementsByTagName('a');
    for(let i = 0; i < navItemAnchor.length; i++){
        navItemAnchor[i].classList.toggle("nav-item-scrolled", window.scrollY > 0);
    }
    
    
});
