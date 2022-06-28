const openNav = () => {
    document.querySelector('.mobile-nav-sidebar').style.width = "250px";
}

const closeNav = () => {
    document.querySelector('.mobile-nav-sidebar').style.width = "0px";
}

const headerOnScroll = () => {
    if (window.pageYOffset > 5) {
        document.querySelector('header').classList.add('header-on-scroll');
        document.querySelector('.logo-image').style.display = "none";
        document.querySelector('.logo-image-colored').style.display = "block";
    } else {
        document.querySelector('header').classList.remove('header-on-scroll');
        document.querySelector('.logo-image').style.display = "block";
        document.querySelector('.logo-image-colored').style.display = "none";
    }
}

window.onscroll = () => {
    headerOnScroll();
}