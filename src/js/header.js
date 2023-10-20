window.onscroll = function() {
    var menu = document.querySelector(".menu");
    if (window.pageYOffset > 0) {
        menu.classList.add("menu-scroll");
    } else {
        menu.classList.remove("menu-scroll");
    }
};