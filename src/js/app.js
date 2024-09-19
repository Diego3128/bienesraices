document.addEventListener('DOMContentLoaded', function () {
    eventListeners();
});



function burguerMenu() {
    const navigation = document.querySelector('.bar .navigation');
    const burguerMenuElement = document.querySelector('.burguer-icon');

    navigation.classList.toggle('show')
    burguerMenuElement.classList.toggle('rotate');
}
function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', burguerMenu);
}