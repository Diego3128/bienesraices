document.addEventListener('DOMContentLoaded', function () {
    eventListeners();
});


function darkMode() {
    // toggle class 'dark-mode' to the body element
    document.body.classList.toggle('dark-mode');
}

function burguerMenu() {
    const navigation = document.querySelector('.bar .navigation');
    const burguerMenuElement = document.querySelector('.burguer-icon');

    navigation.classList.toggle('show')
    burguerMenuElement.classList.toggle('rotate');
}
function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    const darkModeIcon = document.querySelector('.dark-mode-btn');


    mobileMenu.addEventListener('click', burguerMenu);
    darkModeIcon.addEventListener('click', darkMode);
}