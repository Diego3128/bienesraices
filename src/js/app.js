document.addEventListener('DOMContentLoaded', function () {
    eventListeners();
});



function burguerMenu() {
    const navigation = document.querySelector('.bar .navigation');

    navigation.classList.toggle('show')
}
function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', burguerMenu);
}