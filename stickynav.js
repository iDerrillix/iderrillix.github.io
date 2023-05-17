
window.addEventListener("scroll", function() {
    var hamburger = document.querySelector(".toggle-btn");
    hamburger.classList.toggle("nav-item-scrolled" , window.scrollY > 0);
    console.log(hamburger.classList);
    var header = document.querySelector('header');
    header.classList.toggle("scrolled", window.scrollY > 0);
    var navItemAnchor = document.querySelectorAll('header .nav-links ul li a');
    for(let i = 0; i < navItemAnchor.length; i++){
        navItemAnchor[i].classList.toggle("nav-item-scrolled", window.scrollY > 0);
    }
});
